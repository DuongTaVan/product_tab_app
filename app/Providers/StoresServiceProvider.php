<?php
namespace App\Providers;

class StoresServiceProvider extends \Illuminate\Translation\TranslationServiceProvider {
    
    public function register()
    {
        // $this->app->bind(\Illuminate\Translation\TranslationServiceProvider::class, function(){

        //     return new \App\Helper\Translator;
        // });
        $this->registerLoader();
        
        $this->app->singleton('translator', function ($app) {
            $loader = $app['translation.loader'];
            
            // When registering the translator component, we'll need to set the default
            // locale as well as the fallback locale. So, we'll grab the application
            // configuration so we can easily get both of these values from there.
            $locale = $app['config']['app.locale'];
            
            $trans = new Translator($loader, $locale);
            // \App\Helper\Translator($loader, $locale);
            
            $trans->setFallback($app['config']['app.fallback_locale']);
            
            return $trans;
        });
        $this->app->singleton('translation.loader', function ($app) {
            return new TranslationLoader($app['files'], $app['path.lang']);
        });
    }
}
