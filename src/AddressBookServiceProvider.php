<?php

namespace IdentifyDigital\AddressBook;

use Illuminate\Support\ServiceProvider;

class AddressBookServiceProvider extends ServiceProvider 
{
	
	/**
	 * Bootstrap and initialize parts of the Address Book module
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->loadMigrationsFrom(__DIR__.'/Migrations');
	}
	
	/**
	 * Register Address Book services into a laravel application
	 *
	 * @return void
	 */
	public function register()
	{
		// Nothing to register
	}
	
}