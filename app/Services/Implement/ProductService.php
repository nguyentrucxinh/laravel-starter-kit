<?php

namespace App\Services\Implement;

use App\Services\ProductServiceInterface;
use App\Repositories\ProductRepositoryInterface;
use DB;

class ProductService implements ProductServiceInterface
{
    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function readAll()
    {
        return $this->productRepo->findAll();
    }

    public function readOne($id)
    {
        // TODO: Validation

        return $this->productRepo->findOne($id);
    }

    public function createOne($data)
    {
        // TODO: Validation

        DB::transaction(function () use ($data) {
            $this->productRepo->createOne($data);
        });
        return null;
    }

    public function updateOne($data)
    {
        // TODO: Validation

        DB::transaction(function () {
            return $this->productRepo->updateOne($id, $data);
        });
        return null;
    }

    public function deleteOne($id)
    {
        // TODO: Validation

        DB::transaction(function () {
            $this->productRepo->deleteOne($id);
        });
        return null;
    }
}
