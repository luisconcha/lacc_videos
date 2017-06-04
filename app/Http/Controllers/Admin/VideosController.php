<?php

namespace LACC\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LACC\Http\Controllers\StandarController;
use LACC\Models\Video;
use LACC\Repositories\CategoryRepository;
use LACC\Repositories\SerieRepository;
use LACC\Repositories\VideoRepository;

class VideosController extends StandarController
{
    /** @var Video */
    protected $model = 'video';

    /** @var  VideoRepository */
    protected $repository;

    /** @var  CategoryRepository */
    protected $categoryRepo;

    /** @var SerieRepository */
    protected $seriesRepo;

    protected $route = 'admin.videos';

    protected $view = 'admin.video';

    protected $totalPage = 15;

    protected $request;

    public function __construct(
        VideoRepository $repository,
        Video $video, Request $request,
        CategoryRepository $categoryRepository,
        SerieRepository $serieRepository )
    {
        $this->model = $video;
        $this->repository = $repository;
        $this->categoryRepo = $categoryRepository;
        $this->seriesRepo = $serieRepository;
        $this->request = $request;
    }

    public function create()
    {
        $data = '';
        $categories = $this->categoryRepo->getListCategoriesInSelect();
        $series = $this->seriesRepo->getListSeriesInSelect();

        return view( "{$this->view}.add-edit", compact( 'data', 'categories', 'series' ) );
    }

    public function store( Request $request )
    {
        $this->validate( $request, $this->model->rules() );
        $data = $request->all();

        $model = $this->repository->create( $data );

        if( $model ) {

            $message = "Congratulations, the {$model->title} record was inserted successfully!";

            createMessage( $request, 'message', 'success', $message );

            return redirect()->route( "{$this->route}.edit", [ 'id' => $model->id ] )
                             ->withInput();
        }
        createMessage( $request, 'error', 'danger', 'There was an error trying to save the record.' );

        return redirect()->route( "{$this->route}.create" )->withInput();
    }

    public function edit( $id )
    {
        $data = $this->repository->find( $id );
        $categories = $this->categoryRepo->getListCategoriesInSelect();
        $series = $this->seriesRepo->getListSeriesInSelect();

        return view( "{$this->view}.add-edit", compact( 'data', 'categories', 'series' ) );
    }


    public function createRelations( Video $video )
    {
        $data = $video;

        return view( "{$this->view}.relations", compact( 'data' ) );
    }

    public function createSeriesAndCategories( $idVideo )
    {
        $attributes = $this->request->all();

        $data = $this->repository->update( $attributes, $idVideo );
        $request = $this->request;

        if( $data ) {
            $register = isset( $dataForm[ 'title' ] ) ? "'" . $dataForm[ 'title' ] . "'" : '';
            $message = "Congratulations, the {$register} record was changed successfully!";
            createMessage( $request, 'message', 'success', $message );

            return redirect()->route( "{$this->route}.edit", [ 'id' => $data->id ] )
                             ->withInput();
        } else {
            createMessage( $request, 'error', 'danger', 'Could not update the registry!' );

            return redirect()->route( "{$this->route}.edit", [ 'id' => $data->id ] )
                             ->withInput();
        }
    }

    public function createVideoAndThumbnail( $idVideo )
    {
        $attributes = $this->request->all();
        $data       = $this->repository->update( $attributes, $idVideo );
        $request    = $this->request;

        if( $data ) {
            $register = isset( $dataForm[ 'title' ] ) ? "'" . $dataForm[ 'title' ] . "'" : '';
            $message = "Congratulations, the {$register} record was changed successfully!";
            createMessage( $request, 'message', 'success', $message );

            return redirect()->route( "{$this->route}.edit", [ 'id' => $data->id ] )
                             ->withInput();
        } else {
            createMessage( $request, 'error', 'danger', 'Could not update the registry!' );

            return redirect()->route( "{$this->route}.edit", [ 'id' => $data->id ] )
                             ->withInput();
        }

    }


    public function fileAsset( Video $video )
    {
        return response()->download( $video->file_path );
    }

    public function thumbSmallAssets( Video $video )
    {
        return response()->download( $video->thumb_small_path );
    }
}
