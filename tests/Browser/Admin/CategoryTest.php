<?php

namespace Tests\Browser\Admin;

use LACC\Models\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function testCreate()
    {
        $user = User::where( 'email', '=','admin@user.com' )->first();
        
        $this->browse( function( Browser $browser ) use ( $user ) {
            $browser->loginAs( $user )
                    ->visit( route( 'admin.categories.index' ) )
                    ->assertSee( 'List of categories' )
                    ->clickLink( 'New category' )
                    ->assertSee( 'New Category' )
                    ->type( 'name', 'Category Dusk' )
                    ->type( 'color', '#900' )
                    ->click( 'button[type=submit]' )
                    ->assertSee( 'List of categories' )
                    ->assertSee( 'Category Dusk' );
        } );
    }
}
