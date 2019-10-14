<?php

namespace IdentifyDigital\AddressBook\Models;

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
	
	/**
	 * Get this addressable as a string format. Squashes all
	 * the different parts of the address into a single
	 * string that can be rendered anywhere.
	 *
	 * @return String 	[ A text version of this addressable ]
	 */
	public function __toString ()
	{
		$parts = [];
		
		if ($this->building_name != '')
			$parts[] = $this->building_name;
		
		if ($this->building_number != '')
			$parts[] = $this->building_number;
			
		if ($this->line_1 != '')
			$parts[] = $this->line_1;
		
		if ($this->line_2 != '')
			$parts[] = $this->line_2;
			
		if ($this->line_3 != '')
			$parts[] = $this->line_3;
			
		if ($this->line_4 != '')
			$parts[] = $this->line_4;
			
		if ($this->town_or_city != '')
			$parts[] = $this->town_or_city;
			
		if ($this->district != '')
			$parts[] = $this->district;
			
		if ($this->county != '')
			$parts[] = $this->county;
		
		if ($this->country != '')
			$parts[] = $this->country;
			
		if ($this->post_code != '')
			$parts[] = $this->post_code;
		
		return implode(', ', $parts);
	}
	
}