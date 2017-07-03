<?php
/**
 * File: PlansController.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 19/06/17
 * Time: 20:41
 * Project: lacc_videos
 * Copyright: 2017
 */

namespace LACC\Http\Controllers\Api;

use LACC\Repositories\PlanRepository;
use LACC\Http\Controllers\Controller;

class PlansController extends Controller
{
    /** @var  PlanRepository */
    private $repository;

    function __construct( PlanRepository $repository )
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->all();
    }
}