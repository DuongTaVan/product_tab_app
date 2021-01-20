<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Navbar;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use App\http\Requests;
use Validator;
use Response;
use ShopifyApp;
use App\Storelocator;
use App\SettingsStores;
use Illuminate\Support\Facades\Mail;
use App\Helper\CustomBladeCompiler;
use Illuminate\Support\Facades\Lang;
use App\Helper\MapStyles;

// use App;

class AppProxyController extends Controller
{
    public function test()
    {
        return view('plan.index');
    }

    public function post_all()
    {
        $setting = Setting::findorFail(5);
        if ($setting->status == 1) {
            if($setting->order_by == 1){
                $posts = Post::with('category')->get();
            }
            else{
                $posts = Post::with('category')->orderBy('id','Desc')->get();
            }
            $now = Carbon::now();
            return response()->view('page.post', compact('posts', 'now'))
                ->withHeaders(['Content-Type' => 'application/liquid']);

        } else {
            return response()->view('page.post', compact('setting'))
                ->withHeaders(['Content-Type' => 'application/liquid']);
        }
    }

    public function post_detail($id)
    {
        $post = Post::with('category')->findOrFail($id);
        $now = Carbon::now();
        return response()->view('page.post_detail', compact('post', 'now'))
            ->withHeaders(['Content-Type' => 'application/liquid']);
    }

    public function post_slider()
    {
        $posts = Post::with('category')->get();
        $now = Carbon::now();
        return response()->view('page.post_slider', compact('posts', 'now'))
            ->withHeaders(['Content-Type' => 'application/liquid']);
    }
    public function category_all(){
        $categories = Category::all();
        return response()->view('page.category', compact('categories'))
            ->withHeaders(['Content-Type' => 'application/liquid']);
    }
    public function navbar(){
        $setting = Setting::findOrFail(1);
        if($setting->status == 1){
            $navbars = Navbar::take($setting->max_column)->get();
            return response()->view('page.navbar', compact('navbars','setting'))
                ->withHeaders(['Content-Type' => 'application/liquid']);
        }
    }
    public function nav(){
        $setting = Setting::findOrFail(1);
        if($setting->status == 1){
            $navbars = Navbar::take($setting->max_column)->get();
            return response()->view('page.accordion', compact('navbars','setting'))
                ->withHeaders(['Content-Type' => 'application/liquid']);
        }
    }
}
