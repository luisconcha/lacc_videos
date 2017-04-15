<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'categories', function ( Blueprint $table ) {
            $table->increments( 'id' );
            $table->string( 'name', 150 )->unique();
            $table->string('color',7)->unique()->comment('Category color int hexadecimal format');
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop( 'categories' );
    }

}
