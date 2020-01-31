<?php

namespace IdentifyDigital\AddressBook\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Arr;
use Malhal\Geographical\Geographical;

class Address extends Model
{
    use Geographical, SoftDeletes;

    /**
     * @constant string
     */
    const LATITUDE  = 'lat';

    /**
     * @constant string
     */
    const LONGITUDE = 'long';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $fillable = [
		'building_name', 'building_number',
		'line_1', 'line_2', 'line_3', 'line_4',
		'town_or_city', 'district', 'county',
        'country', 'post_code',
        'long', 'lat'
	];

    /**
     * Returns the current Address in a string format with
     * all filled in address parts.
     *
     * @return string
     */
	public function __toString ()
	{
	    $collection = collect(Arr::only($this->attributes, [
	        'building_name', 'building_number',
            'line_1', 'line_2', 'line_3', 'line_4',
            'town_or_city', 'district', 'county',
            'country', 'post_code'
        ]));

	    return $collection->filter()->implode(", ");
	}

    /**
     * @return BelongsToMany
     */
	public function relation()
    {
        return $this->belongsToMany(Address::class, 'address_relations', 'entity_id','address_id')
            ->where('entity_class', self::class);
    }
}
