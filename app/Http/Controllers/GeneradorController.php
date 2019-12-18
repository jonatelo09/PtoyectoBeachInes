<?php

namespace App\Http\Controllers;

class GeneradorController extends Controller {
	public function imprimir() {
		//$today = Carbon::now()->format('d/m/Y');
		$pdf = \PDF::loadView('admin.imprimir.imprimir');
		return $pdf->download('imprimir.pdf');
	}
}
