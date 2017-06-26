<?php

namespace LACC\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CategoryRepository
 * @package namespace LACC\Repositories;
 */
interface PlanRepository extends RepositoryInterface
{
    public function getListDurationInSelect();
}
