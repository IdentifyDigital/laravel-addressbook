# identifydigital\laravel-addressbook

A laravel plugin that allows you to quickly add and work with addresses throughout your laravel application.

## Installation

Install the package through composer:
> composer require identifydigital/addressbook

Run Database Migrations:
> php artisan migrate

## Service Provider

> IdentifyDigital\AddressBook\AddressBookServiceProvider

## Models

### Address

> IdentifyDigital\AddressBook\Models\Address

Models the Address table.

## Traits

### Addressable

Provides models with the ability to be given a physical address in the real world.

```php
use IdentifyDigital\AddressBook\Traits\Addressable;

class MyModel extends Model {
   
   use Addressable;
   
   ...
   
}
```

method | description | return
--- | --- | ---
address() | Returns the primary address of this addressable | Address
addresses() | Get all the addresses associated with this addressable | Collection<Address>

## Database Tables

### Addresses (addresses)

column | type | description | nullable
--- | --- | --- | ---
id | unsigned int | Auto-incrementing ID | No
created_at | timestamp | Time the address was crated | No
updated_at | timestamp | Time the address was last touched | Yes
deleted_at | timestamp | Time the address was deleted from Laravel | Yes
building_name | text | The name that a building is referred to | Yes
building_number | int | Any number associated to the building | Yes
line_1 | text | The first line of the address | No
line_2 | text | The second line of the address | Yes
line_3 | text | The third line of the address | Yes
line_4 | text | The forth line of the address | Yes
town_or_city | text | The city/town the address is located | No
district | text | The administrative district this address is in | Yes
long | decimal | The longitude of this address | Yes
lat | decimal | The latitude of this address | Yes

### Address Relations (address_relation)

column | type | description | nullable
--- | --- | --- | ---
id | unsigned int | Auto-incrementing ID | No
address_id | unsigned int | The address this relationship is for | No
entity_class | text | The system entity that this address is hooked up to (E.G. \Auth\User) | No
entity_id | unsigned_ int | The ID of the entiry this is address is hooked up to | No
