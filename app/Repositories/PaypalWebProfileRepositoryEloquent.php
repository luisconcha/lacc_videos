<?php

namespace LACC\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use LACC\Models\PaypalWebProfile;

/**
 * Class PaypalWebProfileRepositoryEloquent
 * @package LACC\Repositories
 */
class PaypalWebProfileRepositoryEloquent extends BaseRepository implements PaypalWebProfileRepository
{
    public function getWebProfileInSelect()
    {
       $webProfiles = [ '' => '--select an webprofiles--'];
       $webProfiles += $this->model->pluck( 'name', 'id' )->all();
       
       return $webProfiles;
    }

    public function create(array $attributes)
    {
        /**
         * Salva um valor temporario ao criar, ele será atualizado
         * no listener CreatedPaypalWebProfileListener
         */
        $attributes['code'] = 'processing';

        \DB::beginTransaction();
        try {
            $model = parent::create($attributes);
        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }

        \DB::commit();

        return $model;
    }

    public function update(array $attributes, $id)
    {
        /**
         * Verifica no listener UpdatedPaypalWebProfileListener
         */
        \DB::beginTransaction();
        try {
            $model = parent::update($attributes, $id);;
        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }

        \DB::commit();

        return $model;
    }

    public function delete($id)
    {
        /**
         * Verifica no listener UpdatedPaypalWebProfileListener
         */
        \DB::beginTransaction();
        try {
            $result = parent::delete($id);
        } catch (\Exception $exception) {
            \DB::rollBack();
            throw $exception;
        }

        \DB::commit();

        return $result;
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PaypalWebProfile::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
