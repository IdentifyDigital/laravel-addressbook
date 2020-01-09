<?PHP

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AmendLongLatColumnsOnAddressesTables extends Migration
{
	/**
	 * Executed when the migration is run and is responsible
	 * for making changes to the database.
	 *
	 * @return void
	 */
	public function up()
	{
	    Schema::table('addresses', function (Blueprint $table) {
	        $table->string('long')->nullable()->change();
	        $table->string('lat')->nullable()->change();
        });
	}
}
