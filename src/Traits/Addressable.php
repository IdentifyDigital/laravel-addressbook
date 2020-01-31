<?php

namespace IdentifyDigital\AddressBook\Traits;

use IdentifyDigital\AddressBook\Models\Address;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Query\Builder;

trait Addressable
{

	/**
	 * Get the primary address linked to this addressable
	 *
	 * @return BelongsToMany|Builder|Address
	 */
	public function address()
	{
		//See if an address id field is defined in the attached model
		if(in_array('address_id', $this->fillable))
			return $this->belongsTo(Address::class,'address_id');

		//Else return a collection addresses owned by this Model.
		return $this->addresses()->orderBy('addresses.created_at')->take(1);
	}

	/**
	 * Get all the addresses associated with this addressable
	 *
	 * @return BelongsToMany
	 */
	public function addresses()
	{
		return $this->belongsToMany(Address::class, 'address_relations', 'entity_id','address_id')
            ->where('entity_class', self::class);
	}

}
