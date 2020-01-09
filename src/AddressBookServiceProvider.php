<?php

namespace IdentifyDigital\AddressBook;

use IdentifyDigital\AddressBook\Models\Address;
use IdentifyDigital\AddressBook\Observers\AddressObserver;
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

		Address::observe(AddressObserver::class);
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
