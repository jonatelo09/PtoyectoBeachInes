<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;    
use App\Aspirant;
class AspirantController extends Controller
{
    public function index()
    {
    	$aspirantes = Aspirant::paginate(3);
    	return view('admin.aspirant.index')->with(compact('aspirantes'));
    }
    public function store(Request $request)
    {
    	$aspirant = new Aspirant();
    	$aspirant->nameFull =  $request->input('nameFull');
    	$aspirant->email = $request->input('email');
    	$aspirant->phone = $request->input('phone');
    	$aspirant->oficio = $request->input('oficio');
    	$aspirant->save();

    	return redirect('/');
    }

    public function destroy($id)
    {

    }
}
