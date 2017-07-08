<?php

namespace LACC\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PaypalWebProfileRepository
 * @package LACC\Repositories
 */
interface PaypalWebProfileRepository extends RepositoryInterface
{
    public function getWebProfileInSelect();
}
