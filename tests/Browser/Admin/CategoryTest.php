<?php

namespace Tests\Browser\Admin;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryTest extends DuskTestCase
{
    use DatabaseMigrations;
    

    public function testLogin()
    {
        $this->browse( function( Browser $browser ) {
            $browser
                ->visit( '/admin/login' )
                ->type( 'email', 'admin@user.com' )
                ->type( 'password', 'secret' )
                ->press( 'Login' )
                ->assertPathIs( '/admin/dashboard' )
                ->assertSee( 'Control panel' );
        } );
    }

    public function testCreate()
    {
        $this->browse( function( Browser $browser ) {
            $browser
                ->visit( route( 'admin.categories.index' ) )
                ->assertSee( 'List of categories' )
                ->clickLink( 'New category' )
                ->assertSee( 'New Category' )
                ->type( 'name', 'Category Dusk' )
//                ->type( 'color', '#900' )
                ->press( 'Save' )
                ->assertSee( 'List of categories' )
                ->assertSee( 'Category Dusk' );
        } );
        
    }

    public function testUpdate()
    {
        $this->browse( function( Browser $browser ) {
            $browser
                ->assertSee( 'List of categories' )
                ->visit(
                    $browser->attribute( '#update-1', 'href' )
                )
                ->type( 'name', 'Categoria alterada' )
                ->press( 'Edit' )
                ->assertSee( 'List of categories' )
                ->assertSee( 'Categoria alterada' );
        } );
    }

    public function testShow()
    {
        $this->browse( function( Browser $browser ) {
            $browser
                ->assertSee( 'List of categories' )
                ->visit(
                    $browser->attribute( '#delete-5', 'href' )
                )
                ->assertSee( 'View category' )
                ->clickLink( 'Category list' );
        } );
    }
    public function testDelete()
    {
        $this->browse( function( Browser $browser ) {
            $browser
                ->assertSee( 'List of categories' )
                ->visit(
                    $browser->attribute( '#delete-5', 'href' )
                )
                ->assertSee( 'View category' )
                ->press( 'Delete category' );
        } );
    }
}
