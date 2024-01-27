<?php 
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class LangServiceProvider extends ServiceProvider {
	
	public function register()
	{
		config([
			'laravellocalization.supportedLocales' => \Config::get('app.languages'),

			'laravellocalization.useAcceptLanguageHeader' => true,

			'laravellocalization.hideDefaultLocaleInURL' => true
		]);
	}

}