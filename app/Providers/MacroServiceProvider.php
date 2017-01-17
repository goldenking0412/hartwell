<?php namespace App\Providers;

use Illuminate\Html\HtmlServiceProvider;

class MacroServiceProvider extends HtmlServiceProvider
{
 /**
	* Register the application services.
	*
	* @return void
	*/
	public function register()
	{
		parent::register();
		require base_path() . '/bootstrap/macros.php';
	}
}
