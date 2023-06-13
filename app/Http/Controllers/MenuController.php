<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Models\Cart;

class MenuController extends Controller
{
    //
    public function index()
    {
        $menus = Menu::all();
        return view('order', compact('menus'));
        //
    }
    public function store(Request $request)
    {
        $input = $request->input('menu_id');

        $cart = new Cart();
        $cart->menu_id = $input;
        $cart->quantity = $input;
        // Temporarily disable timestamps
        $cart->timestamps = false;

        $cart->save();

        return redirect('order')->with('status', 'Menu Added');

    }
}

