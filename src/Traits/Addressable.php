<?php

namespace IdentifyDigital\AddressBook;

use IdentifyDigital\AddressBook\Models\Address;

trait Addressable
{
	
	/**
	 * Get the primary address linked to this addressable
	 *
	 * @return Address 	[ The primary address of this addressable ]
	 */
	public function address()
	{
		
	}
	
	/**
	 * Get all the addresses associated with this addressable
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function addresses()
	{
		return $this->hasMany(Address::class, 'address_relation', 'relation_id')
					->where('entity_class', self::class);
	}
	
}