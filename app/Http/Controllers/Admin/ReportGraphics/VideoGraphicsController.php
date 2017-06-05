<?php
/**
 * File: VideoGraphicsController.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 15/04/17
 * Time: 18:41
 * Project: lacc_videos
 * Copyright: 2017
 */

namespace LACC\Http\Controllers\Admin\ReportGraphics;

use LACC\Http\Controllers\StandarController;
use LACC\Models\Video;
use LACC\Repositories\VideoRepository;

class VideoGraphicsController extends StandarController
{
    /** @var Video */
    protected $model = 'video';

    /** @var  VideoRepository */
    protected $repository;

    protected $route = 'admin.charts.videos';

    protected $totalPage = 5;

    public function __construct( VideoRepository $repository, Video $video )
    {
        $this->model = $video;
        $this->repository = $repository;
    }

    public function index()
    {
        $videoList = $this->repository->findWhere( [ 'publish' => 1 ] );

        return response()->json( $videoList );
    }
}