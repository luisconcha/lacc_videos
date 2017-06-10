<?php
/**
 * File: CategoriesController.php
 * Created by: Luis Alberto Concha Curay.
 * Email: luisconchacuray@gmail.com
 * Language: PHP
 * Date: 10/06/17
 * Time: 18:20
 * Project: lacc_videos
 * Copyright: 2017
 */


namespace LACC\Http\Controllers\Api\Categories;

use LACC\Http\Controllers\StandarController;
use LACC\Models\Category;
use LACC\Repositories\CategoryRepository;

class CategoriesController extends StandarController
{
    /** @var Category */
    protected $model = 'category';

    /** @var  CategoryRepository */
    protected $repository;

    protected $route = 'admin.categories';

    protected $view = 'admin.category';

    protected $totalPage = 10;

    public function __construct( CategoryRepository $repository, Category $category )
    {
        $this->model = $category;
        $this->repository = $repository;
    }

    public function index()
    {
        $data = $this->repository->paginate( $this->totalPage );

        return response()->json( $data, 200 );
    }
}