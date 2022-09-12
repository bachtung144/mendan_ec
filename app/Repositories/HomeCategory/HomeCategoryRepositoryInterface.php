<?php

namespace App\Repositories\HomeCategory;
use App\Repositories\RepositoryInterface;

interface HomeCategoryRepositoryInterface extends RepositoryInterface
{
    public function getNoOfProducts();
}
