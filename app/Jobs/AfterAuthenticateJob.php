<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\DB;
use OhMyBrew\ShopifyApp\Models\Shop;

class AfterAuthenticateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * The shop.
     *
     * @var \OhMyBrew\ShopifyApp\Models\Shop
     */
    protected $shop;

    /**
     * Create a new job instance.
     *
     * @param \OhMyBrew\ShopifyApp\Models\Shop $shop       The shop object
     * @return void
     */
    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->shop->shopify_domain && !$this->shop->shopify_email){
            $this->insertEmailToShopTable();
        }
        //$this->sendMailInstallApp();
        
    }
    
    public function sendMailInstallApp()
    {
        $api = $this->shop->api();
        $_shop = $api->rest('GET','/admin/shop.json')->body->shop;
        //dd($_shop);
        //sent mail
        $to = 'ducnv.mage@gmail.com';
        $subject = 'Product Reviews app - New installation by '.$_shop->myshopify_domain;
        $message = '<html><body>
        <p>Id: '.$_shop->id.'</p>
        <p>Name: '.$_shop->name.'</p>
        <p>Shopify domain: '.$_shop->myshopify_domain.'</p>
        <p>Email: '.$_shop->email.'</p>
        <p>Created at: '.$_shop->created_at.'</p>
        <p>Updated at: '.$_shop->updated_at.'</p>
        <p>Country name: '.$_shop->country_name.'</p>
        <p>Plan display name: '.$_shop->plan_display_name.'</p>
        <p>Plan name: '.$_shop->plan_name.'</p>
        <p>Domain: '.$_shop->domain.'</p>
        </body>'; 
        $headers = 'From: sale@ndnapps.com' . "\r\n" . 'Reply-To: sale@ndnapps.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion(); 
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        mail($to, $subject, $message, $headers, '-fsale@ndnapps.com');
        //sent mail end
    }
    
    public function insertEmailToShopTable(){
        $api = $this->shop->api();
        $_shop = $api->rest('GET','/admin/shop.json')->body->shop;
        //$shop = ShopifyApp::shop();
        $this->shop->shopify_email = $_shop->email;
        $this->shop->save();
    }

}
