<?php
namespace App\Providers;

use Illuminate\Contracts\Translation\Loader;
class Translator extends \Illuminate\Translation\Translator
{
	/**
	 * Create a new translator instance.
	 *
	 * @param  \Illuminate\Contracts\Translation\Loader $loader
	 * @param  string $locale
	 * @return void
	 */
	
	public function __construct(Loader $loader, $locale)
	{
		parent::__construct($loader, $locale);
	}
	
}