<?php
/**
 * File: SeriesTrashController.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 03/06/17
 * Time: 23:23
 * Project: lacc_categoriess
 * Copyright: 2017
 */


namespace LACC\Http\Controllers\Admin\Trash;

use Illuminate\Http\Request;
use LACC\Http\Controllers\StandarController;
use LACC\Models\Serie;
use LACC\Repositories\SerieRepository;

class SeriesTrashController extends StandarController
{
    /** @var Serie */
    protected $model = 'series';

    /** @var  SerieRepository */
    protected $repository;

    protected $route = 'admin.trashed.series';

    protected $view = 'admin.series.trash';

    protected $totalPage = 15;

    protected $request;

    function __construct( SerieRepository $serieRepository )
    {
        $this->repository = $serieRepository;
    }


    public function index()
    {
        $data = $this->repository->scopeQuery( function( $query ) {
            return $query->onlyTrashed();
        } )->paginate( $this->totalPage );


        return view( "{$this->view}", compact( 'data' ) );
    }

    public function update( $id, Request $request )
    {
        $data = $this->repository->scopeQuery( function( $query ) {
            return $query->onlyTrashed();
        } );
        $model = $data->find( $id );
        $model->restore();

        $message = "Congratulations, the {$model->title} record was inserted successfully!";

        createMessage( $request, 'message', 'success', $message );

        return redirect()->route( "{$this->route}.index" )->withInput();

    }
}