<?php

namespace LACC\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LACC\Http\Controllers\StandarController;
use LACC\Models\Serie;
use LACC\Repositories\SerieRepository;

class SeriesController extends StandarController
{
    /** @var Serie */
    protected $model = 'serie';

    /** @var  SerieRepository */
    protected $repository;

    protected $route = 'admin.series';

    protected $view = 'admin.series';

    protected $totalPage = 10;

    public function __construct( SerieRepository $repository, Serie $serie )
    {
        $this->model = $serie;

        /** @var SerieRepository repository */
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store( Request $request )
    {
        //Se por acaso der erro ao enviar o file, pega o valor default
        $request[ 'thumb' ] = env( 'SERIE_NO_THUMB' );

        return parent::store( $request );
    }

    /**
     * @param $id
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update( $id, Request $request )
    {
       // $request[ 'thumb' ] = env( 'SERIE_NO_THUMB' );

        return parent::update( $id, $request );
    }

    public function thumbAssets( Serie $serie )
    {
        return response()->download( $serie->thumb_path );
    }

    public function thumbSmallAssets( Serie $serie )
    {
        return response()->download( $serie->thumb_small_path );
    }
}
