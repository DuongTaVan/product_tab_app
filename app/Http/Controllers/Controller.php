<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getPaginate($api_header)
    {
        if (!empty($api_header['Link'])) {
            $link_header = $api_header['Link'];
            $response['has_prev'] = false;
            $response['has_next'] = false;
            $response['next'] = '';
            $response['prev'] = '';
            // if($params['start'] == 20  ) dd($api_header);
            if (is_array($link_header)) {
                $_links = is_array(explode(',', $link_header[0])) ? explode(',', $link_header[0]) : [0 => $link_header[0]];
                //dd($_links);

                foreach ($_links as $_link) {
                    if (strpos($_link, 'next') != false) {
                        $response['has_next'] = true;
                        $response['next'] = $this->getPageinfo($_link) != false ? $this->getPageinfo($_link) : '';
                    }
                    if (strpos($_link, 'previous') != false) {
                        $response['has_prev'] = true;
                        $response['prev'] = $this->getPageinfo($_link) != false ? $this->getPageinfo($_link) : '';
                    }
                }
                return $response;
            }
        }
    }

    public function getPageinfo($link)
    {
        try {
            $url = trim(trim(explode(';', $link)[0], '>'), '<');
            //dd($url);
            $parts = parse_url($url);
            //dd($parts);
            parse_str($parts['query'], $query);
            //dd($query);
            return $query['page_info'];
        } catch (\Exception $e) {
            return false;
        }
    }
}
