<?PHP

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressAndRelationsTables extends Migration
{
	
	/**
	 * The name of the address table that will be created.
	 *
	 * @var String $address_table_name
	 */
	protected $address_table_name = 'addresses';
	
	/**
	 * The name of the relations table that will be created
	 * to link up addresses to various Addressable items
	 *
	 * @var String $relation_table_name
	 */
	protected $relation_table_name = 'address_relations';
	
	/**
	 * Executed when the migration is run and is responsible
	 * for making changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
		// Create the table to actually store the addresses
		Schema::create($this->address_table_name, function(Blueprint $table) {
			
			// Table Meta Data
			$table->increments('id');
			$table->timestamps(); 	// created_at, updated_at
			$table->softDeletes(); 	// deleted_at
			
			// Building Information
			// ADDRESS ( ..., building_name, building_number, line_1, line_2, line_3, line_4, ... )
			$table->text('building_name')
				  ->nullable()
				  ->comment('The name that this building is referred to');
				  
			$table->text('building_number') // <-- take into account 123A type numbers
				  ->nullable()
				  ->comment('The number that this building might be assigned');
				  
			$table->text('line_1')
				  ->comment('The first line of the address of this place. Must at least contain this in some form.');
				  
			$table->text('line_2')
				  ->comment('The first second of the address of this place.')
				  ->nullable();
			
			$table->text('line_3')
				  ->comment('The third line of the address of this place.')
				  ->nullable();
			
			$table->text('line_4')
				  ->comment('The forth line of the address of this place.')
				  ->nullable();
			
			// Location Information
			// ADDRESS ( ..., town_or_city, district, county, country, post_code, ... )
			
			$table->text('town_or_city')
				  ->comment('The town or city this address is part of.');
				  
			$table->text('district')
				  ->comment('The district that this address is located in (usually an area within a county)')
				  ->nullable();
				  
			$table->text('county')
				  ->comment('The county/state that this address is part of. Must be included');
				  
			$table->text('country')
				  ->comment('The country that this address is located in. Must be included');
			
			$table->text('post_code')
				  ->comment('The postal/zip code of the address. Must be included');
			
			// Geotagging and pinpoints
			// ADDRESS ( ..., longitude, latitude, ... )
			
			$table->decimal('long')
				  ->comment('The longitude of this address.')
				  ->nullable();
				  
			$table->decimal('lat')
				  ->comment('The latitude of this address.')
				  ->nullable();
			
		});
		
		// Build the table that will connect addresses to various addressables in Laravel
		Schema::create($this->relation_table_name, function(Blueprint $table) {
			
			// Table Meta Data
			$table->increments('id');
			$table->timestamps();
			
			// Link the Address
			$table->unsignedInteger('address_id')
				  ->comment('ID of a row from the address table');
				  
			// Link up to Addressables
			$table->text('entity_class')
				  ->comment('The type of object the Addressable is');
			$table->text('entity_id')
				  ->comment('The ID of the entity that this address is attached to');
			
		});
		
	}
	
	
	/**
	 * Executed when the migration is rolled back. Will destroy the table outright
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists($this->relation_table_name);
		Schema::dropIfExists($this->address_table_name);
	}
}