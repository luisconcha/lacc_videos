<?php

namespace Tests\Feature\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use LACC\Models\User;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function testIfUserDoesNotSeeUserList()
    {
        $this->get( route( 'admin.users.index' ) )
             ->assertRedirect( route( 'admin.login' ) )
             ->assertStatus( 302 );
    }

    public function testIfUserDoesSeeUserList()
    {
        Model::unguard();
        $user = factory( User::class )
            ->create( [ 'verified' => true ] );

        $this->actingAs( $user )
             ->get( route( 'admin.users.index' ) )
             ->assertSee( 'List of users' );

        $this->get( route( 'admin.users.index' ) )
             ->assertSee( 'List of users' );
    }

}
