<?php

namespace App\Jobs;
use OhMyBrew\ShopifyApp\Models\Shop;
use Illuminate\Support\Facades\DB;

class AppUninstalledJob extends \OhMyBrew\ShopifyApp\Jobs\AppUninstalledJob
{
	public function handle()
    {
    	if (!$this->shop) {
            return false;
        }

        $this->cleanShop();
        $this->softDeleteShop();
        $this->cancelCharge();
        $this->sendMailUninstallApp();

    	return true;
    }
    
    public function sendMailUninstallApp(){
    	//sent mail use PHP MAIL
        $to = 'ducnv.mage@gmail.com';
        $subject = 'Product Reviews app - Uninstallation by '.$this->shopDomain;
        $message = '<html><body>Hmm, this shop has uninstalled the app!!!</body>'; 
        $headers = 'From: sale@ndnapps.com' . "\r\n" . 'Reply-To: sale@ndnapps.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion(); 
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        mail($to, $subject, $message, $headers, '-fsale@ndnapps.com');
        //sent mail end
    }
}
