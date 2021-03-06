<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'plans', function( Blueprint $table ) {
            $table->increments( 'id' );
            $table->string( 'name', 255 )->unique();
            $table->text( 'description', 1000 );
            $table->float( 'value' );
            $table->smallInteger( 'duration' )->comment( 'Monthly and Yearly' );
            $table->integer('paypal_web_profile_id' )->unsigned();
            $table->foreign('paypal_web_profile_id' )->references('id')->on('paypal_web_profiles');
            $table->timestamps();
            $table->softDeletes();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'plans' );
    }
}
