<?php

namespace Tests\Browser\Admin;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLoginFailedAndSuccess()
    {
        $this->browse( function( Browser $browser ) {
            $browser->visit( '/admin/login' )
                    ->type( 'email', 'admin1@user.com' )
                    ->type( 'password', '12yytstst' )
                    ->press( 'Login' )
                    ->assertSee( 'LACC-Videos' );

            $browser->visit( '/admin/login' )
                    ->type( 'email', 'admin@user.com' )
                    ->type( 'password', 'secret' )
                    ->press( 'Login' )
                    ->assertPathIs('/admin/dashboard')
                    ->assertSee( 'Control panel' );
            
        } );

    }
}
