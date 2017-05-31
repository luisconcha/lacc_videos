<?php
/**
 * File: StandarController.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 15/04/17
 * Time: 13:04
 * Project: lacc_videos
 * Copyright: 2017
 */

namespace LACC\Http\Controllers;

use Illuminate\Http\Request;

class StandarController extends Controller
{
    protected $totalPage = 10;
    protected $upload = false;

    public function index()
    {
        $data = $this->repository->paginate( $this->totalPage );

        return view( "{$this->view}.index", compact( 'data' ) );
    }

    public function create()
    {
        return view( "{$this->view}.add" );
    }

    /**
     * @param Request $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store( Request $request )
    {
        $this->validate( $request, $this->model->rules() );
        $data = $request->all();

        $model = $this->repository->create( $data );

        if( $model ) {
            $register = isset( $data[ 'name' ] ) ? "'" . $data[ 'name' ] . "'" : '';
            $message = "Congratulations, the {$register} record was inserted successfully!";

            createMessage( $request, 'message', 'success', $message );
            $urlTo = $this->checksTheCurrentUrl( $request[ 'redirect_to' ], "{$this->route}.index" );

            return redirect()->to( $urlTo );
        }
        createMessage( $request, 'error', 'danger', 'There was an error trying to save the record.' );

        return redirect()->route( "{$this->route}.create" )->withInput();
    }

    public function show( $id )
    {
        $data = $this->repository->find( $id );

        return view( "{$this->view}.show", compact( 'data' ) );
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit( $id )
    {
        $data = $this->repository->find( $id );

        return view( "{$this->view}.edit", compact( 'data' ) );
    }

    /**
     * @param         $id
     * @param Request $request
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update( $id, Request $request )
    {
        $this->validate( $request, $this->model->rules() );
        $data = $this->repository->find( $id );
        $dataForm = $request->all();

        if( $data ) {
            $this->repository->update( $dataForm, $id );
            $register = isset( $dataForm[ 'name' ] ) ? "'" . $dataForm[ 'name' ] . "'" : '';
            $message = "Congratulations, the {$register} record was changed successfully!";
            createMessage( $request, 'message', 'success', $message );
            $urlTo = $this->checksTheCurrentUrl( $request[ 'redirect_to' ], "{$this->route}.index" );

            return redirect()->to( $urlTo );
        } else {
            createMessage( $request, 'error', 'danger', 'Could not update the registry!' );

            return redirect()->route( "{$this->route}.edit", [ 'id' => $data->id ] )
                             ->withInput();
        }
    }

    /**
     * @param         $id
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy( $id, Request $request )
    {
        $data = $this->repository->find( $id );
        $data->delete();
        createMessage( $request, 'message', 'success', "Record '$data->name'  deleted successfully!" );

        return redirect()->route( "{$this->route}.index" )->withInput();
    }

    /**
     * @param $currentUrl
     * @param $defaultRoute
     *
     * @return string
     */
    public function checksTheCurrentUrl( $currentUrl, $defaultRoute )
    {
        $urlTo = ( $currentUrl ) ? : route( $defaultRoute );

        return $urlTo;
    }

}