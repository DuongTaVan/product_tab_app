<?php

namespace App\Http\Controllers;

use App\Models\Navbar;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;

class NavbarController extends Controller
{
    public function index()
    {
        $navbars = Navbar::all();
        return view('navbar.index', compact('navbars' ));
    }

    public function ajax_modal(Request $request)
    {
        if ($request->ajax()) {
            $shop = ShopifyApp::shop();
            if (!$shop) {
                return redirect()->route('login');
            }
            $products = $shop->api()->rest('GET', '/admin/api/2021-01/products.json')->body->products;
            //dd($products);
            $html = view('component.modal_navbar', compact('products'))->render();
            return response([
                'html' => $html
            ]);
        }

    }

    public function store(Request $request)
    {
        //dd($request->all());
        $data = $request->except('_token', 'product_ids');
        $array = explode(',', $request->array[0]);
        $data['product_id'] = json_encode($array);
        //dd($data);
        Navbar::create($data);
        return redirect()->route('navbar.index')->with('message', 'add-success !');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token', 'product_ids');
        $array = explode(',', $request->array[0]);
        $data['product_id'] = json_encode($array);
        $navbar = Navbar::findOrFail($id);
        $navbar->update($data);
        return redirect()->route('navbar.index')->with('message', 'edit-success !');
    }
    public function show($id){
        $navbar = Navbar::find($id);
        $navbar->status =! $navbar->status;
        $navbar->save();
        return redirect()->back();
    }
    public function ajax_edit_modal(Request $request, $id)
    {
        if ($request->ajax()) {
            $navbar = Navbar::findOrFail($id);
            $shop = ShopifyApp::shop();
            if (!$shop) {
                return redirect()->route('login');
            }
            $products = $shop->api()->rest('GET', '/admin/api/2021-01/products.json')->body->products;
            //dd(json_decode($navbar->product_id));
            $html = view('component.modal_navbar_edit', compact('navbar', 'products'))->render();
            return response([
                'html' => $html
            ]);
        }
    }

    public function search_autocomplete(Request $request)
    {
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return redirect()->route('login');
        }
        $products = $shop->api()->rest('GET', '/admin/api/2021-01/products.json')->body->products;
        $search = $request->search;
//        if(!empty($search)){
//            $query_api =',query: "title:*'.str_replace("'", "\'", addslashes($search)).'*"';
//            // $query_count['query'] = $search;
//        }
        //dd($search);
        $apis = $shop->api()->graph('{
                  products(first: 10,query:"title:'.$search.'*") {
                    edges {
                      node {
                        id
                        title
                      }
                    }    
                  }
                }
            ')->body->products->edges;
        //dd($apis);
        $out_put = '<select class="locationMultiple form-control" multiple="multiple" name="product_ids[]">';
        foreach ($apis as $api){
            $id = explode("gid://shopify/Product/", $api->node->id);
            $id = array_pop($id);
            //dd($id);
            $out_put .= '<option class="form-group ajax_click" value="'.$id.'">'.$api->node->title.'</option>';
        }
        $out_put .= '</select>';
        //dd($out_put);
        echo $out_put;
    }

    public function delete($id)
    {
        $navbar = Navbar::findOrFail($id);
        $navbar->delete();
        return redirect()->back()->with('message', 'delete-success !');
    }

    public function addScriptNarbarToTheme()
    {
        $data = [];
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return false;
        }
        $setting = Setting::findOrFail(1);
        if ($setting->status == 1) {
            $navbars = Navbar::take($setting->max_column)->get();
            $data = View::make('page.navbar', compact('navbars', 'setting'))->render();
        }
        $fileScript = file_get_contents('js/ndnapps_navbar.js');
        $fileScript = 'var ndn_navbar_data= "' . base64_encode(json_encode($data)) . '";' . $fileScript;
        $theme = $shop->api()->rest('GET', '/admin/themes.json', ['fields' => 'id,name,role'])->body->themes;
        foreach ($theme as $_child) {
            if ($_child->role == "main") {
                $layout = $shop->api()->rest('GET', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => ['key' => 'layout/theme.liquid']])->body->asset->value;
                $add_script = ["key" => "assets/ndnapps-navbar.js", "value" => $fileScript];
                $put_script = $shop->api()->rest('PUT', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => $add_script]);
                $new_layout = $layout;

                if (!strpos($layout, 'ndnapps-navbar.js')) {
                    $new_layout = str_replace("</body>", "<script src='{{ 'ndnapps-navbar.js' | asset_url }}' defer='defer'></script>\n</body>", $layout);
                }

                $put2 = $shop->api()->rest('PUT', '/admin/themes/' . $_child->id . '/assets.json', ['asset' => ["key" => "layout/theme.liquid", 'value' => $new_layout]]);
            }
        }
        return redirect()->route('setting.index')->with('message', 'success');
    }
    public function create(){
        //dd($this->test());
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return redirect()->route('login');
        }
        $query_count['limit'] = 10;
        $api = $shop->api()->rest('GET', '/admin/api/2021-01/products.json?limit=10');

        $products = $shop->api()->graph('{
                  products(first: 10,sortKey: TITLE) {
                    edges {
                      cursor
                      node {
                        id
                        title
                        handle
                        featuredImage {
                          src
                        }
                      }
                    }
                    pageInfo {
                      hasNextPage
                      hasPreviousPage
                    }
                  }
                }
            ')->body->products;

        $api_header = $api->response->getHeaders();
        $response = $this->getPaginate($api_header);

        return view('navbar.create',compact('products', 'response'));
    }
    public function paginate_product_navbar_ajax(Request $request)
    {
        $page_info = $request->page_info;
        $btn = $request->btn;
        $cursor = $request->cursor;
        //dd($page_info);
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return redirect()->route('login');
        }
        $api = $shop->api()->rest('GET', '/admin/api/2021-01/products.json?page_info=' . $page_info . '&limit=10');

        if ($btn == 'next') {
            $page_info = ',after: "' . $page_info . '"';
            $tt = 'first: 10';
        }
        if ($btn == 'prev') {
            $page_info = ',before: "' . $page_info . '"';
            $tt = 'last: 10';
        }
        //$page_info = ',after: "' . $page_info . '"';

        $products = $shop->api()->graph('{
                  products(' . $tt . ',' . $page_info . ',sortKey: TITLE) {
                    edges {
                      cursor
                      node {
                        id
                        title
                        handle
                        featuredImage {
                          src
                        }
                      }
                    }
                    pageInfo {
                      hasNextPage
                      hasPreviousPage
                    }
                  }
                }
            ')->body->products;
        //dd($products);
        $api_header = $api->response->getHeaders();
        //dd($api_header);
        $response = $this->getPaginate($api_header);
        //dd($response);
        $html = view('navbar.include.index', compact('products', 'response'))->render();
        if($request->id){
            $id = $request->id;
            $navbar = Navbar::findOrFail($id);
            $html = view('navbar.include.index', compact('products', 'response', 'navbar'))->render();
        }
        return response([
            'html' => $html,
            'res' => $response
        ]);
    }
    public function edit($id){
        //dd($this->test());
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return redirect()->route('login');
        }
        $query_count['limit'] = 10;
        $api = $shop->api()->rest('GET', '/admin/api/2021-01/products.json?limit=10');

        $products = $shop->api()->graph('{
                  products(first: 10,sortKey: TITLE) {
                    edges {
                      cursor
                      node {
                        id
                        title
                        handle
                        featuredImage {
                          src
                        }
                      }
                    }
                    pageInfo {
                      hasNextPage
                      hasPreviousPage
                    }
                  }
                }
            ')->body->products;

        $api_header = $api->response->getHeaders();
        $response = $this->getPaginate($api_header);
        $navbar = Navbar::findOrFail($id);
        $nb_id = $id;
        return view('navbar.edit',compact('products', 'response', 'navbar', 'nb_id'));
    }
}
