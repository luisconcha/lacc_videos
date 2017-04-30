<?php

namespace LACC\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LACC\Http\Controllers\StandarController;
use LACC\Models\Video;
use LACC\Repositories\VideoRepository;

class VideosController extends StandarController
{
    /** @var Video */
    protected $model = 'video';

    /** @var  VideoRepository */
    protected $repository;

    protected $route = 'admin.videos';

    protected $view = 'admin.video';

    protected $totalPage = 15;

    public function __construct( VideoRepository $repository, Video $video )
    {
        $this->model = $video;
        $this->repository = $repository;
    }

    public function create()
    {
        return view( "{$this->view}.add-edit" );
    }

    public function store( Request $request )
    {
        $this->validate( $request, $this->model->rules() );
        $data = $request->all();

        if( $data = $this->repository->create( $data ) ) {
            $register = isset( $data[ 'name' ] ) ? "'" . $data[ 'name' ] . "'" : '';
            $message = "Congratulations, the {$register} record was inserted successfully!";
            createMessage( $request, 'message', 'success', $message );

            return view( "{$this->view}.add-edit", compact( 'data' ) );
        }
        createMessage( $request, 'error', 'danger', 'There was an error trying to save the record.' );

        return redirect()->route( "{$this->route}.create" )->withInput();
    }

    public function edit( $id )
    {
        $data = $this->repository->find( $id );

        return view( "{$this->view}.add-edit", compact( 'data' ) );
    }
    
    public function update( $id, Request $request )
    {
        $this->validate( $request, $this->model->rules() );
        $data = $this->repository->find( $id );
        $dataForm = $request->all();
        if( $data->update( $dataForm ) ) {
            $register = isset( $dataForm[ 'name' ] ) ? "'" . $dataForm[ 'name' ] . "'" : '';
            $message = "Congratulations, the {$register} record was changed successfully!";
            createMessage( $request, 'message', 'success', $message );

            return view( "{$this->view}.add-edit", compact( 'data' ) );
        } else {
            createMessage( $request, 'error', 'danger', 'Could not update the registry!' );

            return redirect()->route( "{$this->route}.edit", [ 'id' => $data->id ] )
                             ->withInput();
        }
    }


    public function createRelations( Video $video )
    {
        $data = $video;
        return view( "{$this->view}.relations", compact( 'data' ) );
    }

}
