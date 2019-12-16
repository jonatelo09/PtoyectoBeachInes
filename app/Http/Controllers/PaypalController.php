<?php

namespace App\Http\Controllers;
use App\Currency;
use App\PaymentPlatform;

class PaypalController extends Controller {
	public function index() {
		$title_page = "Elige tu plataforma de pago";
		$title_hab = "Pagos";
		$currencies = Currency::all();
		$paymentPlatforms = PaymentPlatform::all();
		return view('paypal.index', compact('title_page', 'title_hab'))->with([
			'currencies' => $currencies,
			'paymentPlatforms' => $paymentPlatforms,
		]);
	}
}
