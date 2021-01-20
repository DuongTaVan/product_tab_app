<?php
namespace App\Providers;
use File;
use Cache;
use Illuminate\Translation\FileLoader;
use ShopifyApp;
use App\SettingsStores;
use App\http\Requests;
class TranslationLoader extends FileLoader
{
    /**
     * Load the messages for the given locale.
     *
     * @param string $locale
     * @param string $group
     * @param string $namespace
     *
     * @return array
     */
    
    public function load($locale, $group, $namespace = null)
    {

        if ($group === '*' && $namespace === '*') {
            //var_dump($this->loadJsonPaths($locale));
            
            $shop = ShopifyApp::shop();

            if($shop){
               // var_dump('1111');
                $domain =  $shop->shopify_domain;
                $settings = SettingsStores::where('shopify_domain',$domain)->first();
                if(!empty($settings )){
                    if(!empty($filename = $settings->lang)){
                        try {
                            $path = public_path().'/lang/'.$domain.'/'.$filename;
                            return $this->getArraylang($path);
                        } catch (\Exception $e) {
                            $path = public_path().'/download/lang_default.csv';
                           return $this->getArraylang($path);
                        }
                        
                    }else{
                         $path = public_path().'/download/lang_default.csv';
                         return $this->getArraylang($path);
                    }
                }
                

            }
           


            return $this->loadJsonPaths($locale);
        }
         
        if (is_null($namespace) || $namespace === '*') {
         
            if($group = 'storelocator'){
               if( $domain =request()->shopify_domain){
                        $arr = array();
                        $settings = SettingsStores::where('shopify_domain',$domain)->first();
                        if(!empty($settings )){
                            if(!empty($filename = $settings->lang)){
                                
                                try {
                                   $path = public_path().'/lang/'.$domain.'/'.$filename;
                                   return $this->getArraylang($path);
                                } catch (\Exception $e) {
                                    $path = public_path().'/download/lang_default.csv';
                                   return $this->getArraylang($path);
                                }
                            }else{
                                 $path = public_path().'/download/lang_default.csv';
                                 return $this->getArraylang($path);
                            }
                        }
                        

                }
            }
            return $this->loadPath($this->path, $locale, $group);
        }
        //var_dump('===1===');
        return $this->loadNamespaced($locale, $group, $namespace);
    }

    public function readCSV($destinationPath)
    {
       
        
        $all_data = array();
        if(is_file($destinationPath)){
            $file = fopen($destinationPath, "r");
            while ( ($data = fgetcsv($file, 1000, ",")) !==FALSE )
                {
                    
                    if(!empty($data[0]) && $data[1])
                    {
                        $all_data[$data[0]] =  $data[1];
                    }

                     
                }
            fclose($file);
        }
       
      
        return $all_data;
    }
    public function getArraylang($destinationPath){
        $new = $this->readCSV($destinationPath);
        //ftp://dev_nhan%2540ndnapps.com@ftp.ndnapps.com/storelocator/public/download/lang_default.csv
        $default = $this->readCSV(public_path().'/download/lang_default.csv');
        return array_merge($default,$new);
    }

}