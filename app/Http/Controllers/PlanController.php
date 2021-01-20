<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use ShopifyApp;

class PlanController extends Controller
{
	public function index()
	{
		$shop = ShopifyApp::shop();
        if(!$shop){
            return redirect()->route('login');
        }
		return view('plan.index');
	}

}