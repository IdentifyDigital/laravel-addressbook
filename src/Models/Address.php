<?php

namespace IdentifyDigital\AddressBook\Models\Address;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
	
	/**
	 * Allow softdeleting entries through the SoftDeletes trait.
	 *
	 * @trait SoftDeletes
	 */
	use SoftDeletes;
	
	/**
	 * List all fields of an address that can be mass assigned through this
	 * model.
	 *
	 * @var array $fillable
	 */
	protected $fillable = [
		'building_name',
		'building_number',
		'line_1',
		'line_2',
		'line_3',
		'line_4',
		'town_or_city',
		'district',
		'county',
		'country',
		'post_code',
		'long',
		'lat'
	];
	
}