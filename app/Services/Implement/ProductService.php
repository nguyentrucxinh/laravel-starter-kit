<?php

namespace App\Services\Implement;

use App\Services\ProductServiceInterface;
use App\Repositories\ProductRepositoryInterface;
use DB;
use League\Flysystem\Exception;

class ProductService implements ProductServiceInterface
{
    protected $productRepo, $modelName = 'product';

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    function readAll() {
        return [
            $this->modelName . 's' => $this->productRepo->findAll()
        ];
    }

    function readOne($id) {
        // TODO: Validation

        return [
            $this->modelName => $this->productRepo->findOne()
        ];
    }

    function createOne($data) {
        // TODO: Validation

        DB::transaction(function () use ($data) {
            $this->productRepo->createOne($data);
        });
        return null;
    }

    function updateOne($data) {
        // TODO: Validation

        DB::transaction(function () {
            return $this->productRepo->updateOne($id, $data);
        });
        return null;
    }

    function deleteOne($id) {
        // TODO: Validation

        DB::transaction(function () {
            $this->productRepo->deleteOne($id);
        });
        return null;
    }

}
