<?php
/**
 * File: CategoryController.php
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
use LACC\Models\Category;
use LACC\Repositories\CategoryRepository;

class CategoryController extends StandarController
{
    /** @var Category */
    protected $model = 'category';

    /** @var  CategoryRepository */
    protected $repository;

    protected $route = 'admin.categories';

    protected $view = 'admin.category';

    protected $totalPage = 5;

    public function __construct( CategoryRepository $repository, Category $category )
    {
        $this->model = $category;
        $this->repository = $repository;
    }
}