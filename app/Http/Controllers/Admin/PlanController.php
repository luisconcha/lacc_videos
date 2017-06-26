<?php
/**
 * File: PlanController.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 15/04/17
 * Time: 18:41
 * Project: lacc_videos
 * Copyright: 2017
 */

namespace LACC\Http\Controllers\Admin;

use LACC\Http\Controllers\StandarController;
use LACC\Models\Plans;
use LACC\Repositories\PlanRepository;

class PlanController extends StandarController
{
    /** @var Plans */
    protected $model = 'plans';

    /** @var  PlanRepository */
    protected $repository;

    protected $route = 'admin.plans';

    protected $view = 'admin.plans';

    protected $totalPage = 10;

    public function __construct( PlanRepository $repository, Plans $plans )
    {
        $this->model = $plans;
        $this->repository = $repository;
    }

    public function create()
    {
        $data = '';
        $durations = $this->repository->getListDurationInSelect();

        return view( "{$this->view}.add", compact( 'data', 'durations' ) );
    }

    public function edit( $id )
    {
        $data = $this->repository->find( $id );
        $durations = $this->repository->getListDurationInSelect();

        return view( "{$this->view}.edit", compact( 'data', 'durations' ) );
    }
}