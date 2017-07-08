<?php
/**
 * File: PaypalWebProfilesController.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 15/04/17
 * Time: 18:41
 * Project: lacc_videos
 * Copyright: 2017
 */

namespace LACC\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LACC\Http\Controllers\StandarController;
use LACC\Models\PaypalWebProfile;
use LACC\Repositories\PaypalWebProfileRepository;

class PaypalWebProfilesController extends StandarController
{
    /** @var PaypalWebProfile */
    protected $model = 'paypalWebProfile';

    /** @var  PaypalWebProfileRepository */
    protected $repository;

    protected $route = 'admin.web_profile';

    protected $view = 'admin.web-profile';

    protected $totalPage = 5;

    public function __construct( PaypalWebProfileRepository $repository, PaypalWebProfile $paypalWebProfile )
    {
        $this->model = $paypalWebProfile;
        $this->repository = $repository;
    }

    public function delete($id)
    {
        if($this->repository->delete($id))
            return response()->redirectToRoute($this->route.'.index');
    }
}