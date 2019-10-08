<?php

namespace IdentifyDigital\AddressBook\Traits;

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
		// See if an address id field is defined in the attached model
		// if it is, use that address
		if (isset($this->address_id))
			return $this->belongsTo(Address::class,'address_id');
		
		
		// Check if there are any addresses, if there is, then 
		// return the first addresses.
		return $this->addresses()->first();
		
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
