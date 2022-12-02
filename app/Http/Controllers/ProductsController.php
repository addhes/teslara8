<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductsController extends Controller
{
    public function index()
    {
        $res = Http::get('http://107.172.204.17/jubelio/api/all/products/stock');
        dd($res);
        return view('admin.product.index', compact('res'));
    }

    public function create()
    {
        
    }

    public function store()
    {
        
    }

    public function edit()
    {
        
    }

    public function update()
    {
        
    }

    public function destroy()
    {
        
    }
}
