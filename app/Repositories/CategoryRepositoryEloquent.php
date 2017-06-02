<?php

namespace LACC\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use LACC\Repositories\CategoryRepository;
use LACC\Models\Category;

/**
 * Class CategoryRepositoryEloquent
 * @package namespace LACC\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria( app( RequestCriteria::class ) );
    }

    public function getListCategoriesInSelect()
    {
        $categories = [ '' => '--select an category--' ];
        $categories += $this->model->pluck( 'name', 'id' )->all();

        return $categories;
    }

}
