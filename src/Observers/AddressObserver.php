<?php

namespace IdentifyDigital\AddressBook\Observers;

use IdentifyDigital\AddressBook\Models\Address;
use Jabranr\PostcodesIO\PostcodesIO;

class AddressObserver
{
    /**
     * Handle the address "created" event.
     *
     * @param  Address  $address
     * @return void
     */
    public function creating(Address $address)
    {
        if(empty($address->lat) && empty($address->long)) {
            $result = $this->lookupPostcodeLatLon($address->post_code);

            if(isset($result->result)) {
                $address->long = $result->result->longitude;
                $address->lat = $result->result->latitude;
            }
        }
    }

    private function lookupPostcodeLatLon($postcode = "")
    {
        $postcodeFinder = new PostcodesIO();

        return $postcodeFinder->find($postcode);
    }

}
