<?php
namespace App\Http\Middleware;

use Illuminate\Foundation\Application;
use Illuminate\Contracts\Encryption\Encrypter;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
	
    protected $app;

    /**
     * The encrypter implementation.
     *
     * @var \Illuminate\Contracts\Encryption\Encrypter
     */
    protected $encrypter;
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [];
    
    public function __construct(Application $app, Encrypter $encrypter)
    {
        $this->app = $app;
        $this->encrypter = $encrypter;
        $this->except = [
        	
            //'https://www.ndnapps.com/ndnapps/productreviews/webhook/shop-redact',
            //'https://www.ndnapps.com/ndnapps/productreviews/webhook/customers-redact',
            //'https://www.ndnapps.com/ndnapps/productreviews/webhook/customers-data-request',
        ];
    }
}
