<?php

namespace LACC\Http\Controllers\Admin;

use LACC\Http\Controllers\StandarController;
use LACC\Models\Video;
use LACC\Repositories\VideoRepository;

class VideosUploadsController extends StandarController
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
        $data = '';

        return view( "{$this->view}.add-edit", compact( 'data' ) );
    }

    public function edit( $id )
    {
        $data = $this->repository->find( $id );

        return view( "{$this->view}.add-edit", compact( 'data' ) );
    }
}
