<?php

namespace App\Http\Controllers;

use App\Models\Navbar;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use OhMyBrew\ShopifyApp\Facades\ShopifyApp;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return redirect()->route('login');
        }
        $query_count['limit'] = 10;
        $api = $shop->api()->rest('GET', '/admin/api/2021-01/products.json?limit=10');

        $count = $shop->api()->rest('GET', '/admin/api/2021-01/products/count.json')->body->count;

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
        //dd($products->response->getHeaders());
        return view('product.index', compact('products', 'response'));
    }

    public function ajax_modal(Request $request)
    {
        if ($request->ajax()) {
            $html = view('component.modal_product')->render();
            return response([
                'html' => $html
            ]);
        }
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['tags'] = "";
        //dd($data);
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return redirect()->route('login');
        }
        $shop->api()->rest('POST', '/admin/api/2021-01/products.json', array('product' => $data));
        return redirect()->route('product.index')->with('message', 'add-success !');
    }

    public function edit(Request $request, $id)
    {
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return redirect()->route('login');
        }
        if ($request->ajax()) {
            $product = $shop->api()->rest('GET ', '/admin/api/2021-01/products/' . $id . '.json')->body->product;
            //dd($product);
            $html = view('component.modal_product_edit', compact('product'))->render();
            return response([
                'html' => $html
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['tags'] = "";
        //dd($data);
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return redirect()->route('login');
        }
        $shop->api()->rest('PUT ', '/admin/api/2021-01/products/' . $id . '.json', array('product' => $data));
        return redirect()->route('product.index')->with('message', 'edit-success !');
    }

    public function delete(Request $request, $id)
    {
        $data = $request->except('_token');
        $data['tags'] = "";
        //dd($data);
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return redirect()->route('login');
        }
        $shop->api()->rest('DELETE  ', '/admin/api/2021-01/products/' . $id . '.json');
        return redirect()->route('product.index')->with('message', 'delete-success !');
    }

    public function frontend_product_ajax(Request $request)
    {
        //dd($request->id);
        $product_id = $request->id;
        $setting = Setting::findOrFail(1);
        if ($setting->status == 1) {
            $navbars = Navbar::where('status', 0)->take($setting->max_column)->orderby('n_order', 'asc')->get();
            //dd($navbars);
            if ($setting->type == 0)
                $html = View::make('page.nav', compact('navbars', 'setting', 'product_id'))->render();
            else
                $html = View::make('page.accordion', compact('navbars', 'setting', 'product_id'))->render();
            return response([
                'html' => $html
            ]);
        }

    }

    public function paginate_product_ajax(Request $request)
    {
        $page_info = $request->page_info;
        $btn = $request->btn;
        $cursor = $request->cursor;
        $search = $request->search;
        $rog = $request->rog;
        //dd($rog);
        $shop = ShopifyApp::shop();
        if (!$shop) {
            return redirect()->route('login');
        }
        $api = $shop->api()->rest('GET', '/admin/api/2021-01/products.json?page_info=' . $page_info . '&limit=10');
        if ($rog == 'dth9999') {
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
            ');
            $api_header = $api->response->getHeaders();
            //dd($api_header);
            $response = $this->getPaginate($api_header);
            //dd($response);
            $products = $products->body->products;
            //dd($products);
            $html = view('product.include.table_product', compact('products', 'response'))->render();
            if (isset($response)) {
                return response([
                    'html' => $html,
                    'res' => $response
                ]);
            } else
                return response([
                    'html' => $html,
                ]);

        }
        if ($search != null) {
            $page_info = ',query: "title:*' . $search . '*"';
            $tt = 'first: 10';
        }
        if ($btn == 'next') {
            $page_info = $request->page_info;
            $page_info = 'after: "' . $page_info . '"';
            if ($search != null) {
                $page_info = $page_info . ',query: "title:*' . $search . '*"';
            }

            $tt = 'first: 10';
        }
        if ($btn == 'prev') {
            $page_info = $request->page_info;
            $page_info = 'before: "' . $page_info . '"';
            if ($search != null) {
                $page_info = $page_info . ',query: "title:*' . $search . '*"';
            }
            $tt = 'last: 10';
        }
        //dd($page_info);
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

        if ($search != null) {
            $response['has_prev'] = false;
            $response['has_next'] = false;
            $response['next'] = '';
            $response['prev'] = '';
            if ($products->pageInfo->hasNextPage == true) {
                $response['has_next'] = true;
                foreach ($products->edges as $product) {
                    $response['next'] = $product->cursor;
                }
            }
            if ($products->pageInfo->hasPreviousPage == true) {
                $response['has_prev'] = true;
                //foreach ($products->edges as $product) {
                $response['prev'] = $products->edges[0]->cursor;
                //}
            }
        } else {
            //dd($products);
            $api_header = $api->response->getHeaders();
            //dd($api_header);
            $response = $this->getPaginate($api_header);
            //dd($response);
        }
        $html = view('product.include.table_product', compact('products', 'response', 'search'))->render();
        return response([
            'html' => $html,
            'res' => $response
        ]);
    }

}
