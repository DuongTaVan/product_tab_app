@extends('shopify-app::layouts.default')

@section('styles')
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            
        }
        
        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }
        .position-ref {
            position: relative;
        }
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }
        .content {
            text-align: center;
        }
        .app-title {
            font-size: 40px;
            color: #000;
            font-weight: bold;
            margin-bottom: 5px !important;
        }
        

    </style>
@endsection

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="app-title m-b-md">
                Charge was declined
            </div>

            <b>You have declined the charge. Click <a href="https://{{ ShopifyApp::shop()->shopify_domain }}/admin/apps" target="_parent">here</a> to be taken back to your Apps Admin section, or <a href="https://apps.shopify.com/" target="_blank">here</a> to find another app</b>
        </div>
    </div>
@endsection