<?php

namespace App\Repositories;

use App\Models\Product;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use App\Models\Product as Model;

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseRepository
{
    public function __construct()
    {

    }

    public function model()
    {
        return Product::class;
    }
}
