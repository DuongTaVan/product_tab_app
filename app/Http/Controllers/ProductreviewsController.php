<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\http\Requests;
use Validator;
use Response;
use ShopifyApp;
use Excel;
use File;
use App\Helper\CustomBladeCompiler;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rule;
use App\Helper\Trans;
use Illuminate\Http\UploadedFile;
class ProductreviewsController extends Controller
{
    //webhook/shop-redact
    public function shopRedact(){
        return http_response_code(200);
        exit;
    }
    public function customersRedact(){
        return http_response_code(200);
        exit;
    }
    public function customersDataRequest(){
        return http_response_code(200);
        exit;
    }
    //payment declined
    public function declined(){
        $shop = ShopifyApp::shop();
        if(!$shop){
            return redirect()->route('login');
        }
        //$shopifyDomain = $shop->shopify_domain;
        return view('backend.v2.declined');
    }
    //User guide
    public function userguide(Request $request)
    {
        return view('backend.v2.userguide');
    }


    //backend

    public function index(Request $request){
        $shop = ShopifyApp::shop();
        if(!$shop){
            return redirect()->route('login');
        }
        $domain =  $shop->shopify_domain;
        $data = '';
        return view('backend.v2.productreviews.index', compact('data'));
    }

    public function settings(Request $request){

        $shop = ShopifyApp::shop();
        if(!$shop){
            return redirect()->route('login');
        }
        $domain =  $shop->shopify_domain;

        

    }
    public function saveSettings(Request $request){
        $shop = ShopifyApp::shop();
        if(!$shop){
            return redirect()->route('login');
        }
        

    }

    
}

