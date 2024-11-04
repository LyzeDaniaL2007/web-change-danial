<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RequestController extends Controller
{
    public function store (Request $request): RedirectResponse
    {
       $name = $request->input('name', 'Indro Adi');
       return redirect('/name')->with('name', $name);
    }



// public function store (Request $request) {
//	$data = Http::get('https://jsonplacholder.typicode.com/users');
//	$jsonData = $data->json();

//	dump($jsonData);
// }

}