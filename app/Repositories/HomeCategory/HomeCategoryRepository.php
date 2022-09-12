<?php

namespace App\Repositories\HomeCategory;

use App\Models\HomeCategory;
use App\Repositories\BaseRepository;

class HomeCategoryRepository extends BaseRepository implements HomeCategoryRepositoryInterface
{
    public function getModel()
    {
        return HomeCategory::class;
    }

    public function getNoOfProducts()
    {
        $category = $this->model->find(1);

        return $category->no_of_products;
    }
}
