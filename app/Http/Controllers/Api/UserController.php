<?php
/**
 * File: UserController.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 19/06/17
 * Time: 20:41
 * Project: lacc_videos
 * Copyright: 2017
 */

namespace LACC\Http\Controllers\Api;

use LACC\Models\User;
use LACC\Http\Request\AddCpfRequest;
use LACC\Http\Request\UserSettingRequest;
use LACC\Repositories\UserRepository;

class UserController
{
    /** @var  UserRepository */
    private $repository;

    function __construct( UserRepository $repository )
    {
        $this->repository = $repository;
    }

    public function updateSettings( UserSettingRequest $request )
    {
        $data = $request->only( 'password' );
        $data[ 'password' ] = User::generatePassword( $data[ 'password' ] );
        $this->repository->update( $data, $request->user( 'api' )->id );

        return $request->user( 'api' );
    }

    public function addCpf( AddCpfRequest $request )
    {
        $user = $this->repository->update( [
            'cpf' => $request->input( 'cpf' )
        ], $request->user( 'api' )->id );

        return $user;
    }

}