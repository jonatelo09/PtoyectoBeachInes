<?php

namespace App\Http\Controllers;

use App\Mail\NewOrder;
use App\Resolvers\PaymentPlatformResolver;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;

class PaymentController extends Controller {

	protected $paymentPlatformResolver;
	public function __construct(PaymentPlatformResolver $paymentPlatformResolver) {
		$this->middleware('auth');

		$this->paymentPlatformResolver = $paymentPlatformResolver;
	}
	public function pay(Request $request) {
		$rules = [
			'value' => ['required', 'numeric', 'min:5'],
			'currency' => ['required', 'exists:currencies,iso'],
			'payment_platform' => ['required', 'exists:payment_platforms,id'],
		];
		//dd($request->all());

		$request->validate($rules);

		$paymentPlatform = $this->paymentPlatformResolver
			->resolveService($request->payment_platform);
		session()->put('paymentPlatformId', $request->payment_platform);

		return $paymentPlatform->handlePayment($request);

	}

	public function aprobada() {

		if (session()->has('paymentPlatformId')) {
			$paymentPlatform = $this->paymentPlatformResolver
				->resolveService(session()->get('paymentPlatformId'));
			$client = auth()->user();
			$cart = $client->cart;
			$cart->status = 'Aprobada';
			$cart->oreder_date = Carbon::now();
			$cart->save();

			$admins = User::where('admin', true)->get();
			Mail::to($admins)->send(new NewOrder($client, $cart));

			return $paymentPlatform->handleAprobada();
		}

		return redirect()
			->route('reservas')
			->withErrors('No podemos recuperar su plataforma de pago. por favor, inténtalo de nuevo');
	}

	public function update() {
		$client = auth()->user();
		$cart = $client->cart;
		$cart->status = 'Pendiente';
		$cart->oreder_date = Carbon::now();
		$cart->save();

		$admins = User::where('admin', true)->get();
		Mail::to($admins)->send(new NewOrder($client, $cart));

		$notification = 'Tu pedido se ha registrado correctamente';
		return back()->with(compact('notification'));
	}

	public function cancelado() {
		return redirect()
			->route('reservas')
			->withErrors('Tu pago ha sido cancelado');
	}
}
