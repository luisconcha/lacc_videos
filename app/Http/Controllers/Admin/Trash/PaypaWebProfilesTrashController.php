<?php
/**
 * File: PaypaWebProfilesTrashController.php
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
use LACC\Models\PaypalWebProfile;
use LACC\Models\Plans;
use LACC\Repositories\CategoryRepository;
use LACC\Repositories\PaypalWebProfileRepository;
use LACC\Repositories\PlanRepository;

class PaypaWebProfilesTrashController extends StandarController
{
    /** @var PaypalWebProfile */
    protected $model = 'paypalWebProfile';

    /** @var  PaypalWebProfileRepository */
    protected $repository;

    protected $route = 'admin.web_profile';

    protected $view = 'admin.web-profile..trash';

    protected $totalPage = 5;

    protected $request;

    function __construct( PaypalWebProfileRepository $repository )
    {
        $this->repository = $repository;
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