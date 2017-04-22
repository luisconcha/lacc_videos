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
        $this->repository = $repository;
    }

    /**
     * Método momentaneo para salvar o thumb, depois será removido
     */
    public function store( Request $request )
    {
        $request[ 'thumb' ] = 'thumb.jpg';

        return parent::store( $request );
    }

    /**
     * Método momentaneo para salvar o thumb, depois será removido
     */
    public function update($id, Request $request )
    {
        $request[ 'thumb' ] = 'thumb.jpg';

        return parent::update($id, $request );
    }

}
