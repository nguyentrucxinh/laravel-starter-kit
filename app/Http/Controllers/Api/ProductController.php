<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\ProductServiceInterface;
use App\Validation\ProductValidationInterface;
use Log;
use App\Http\Resources\ProductResource;
use App\Utils\ResponseFormat;

class ProductController extends Controller
{
    protected $productService;
    protected $productValid;

    public function __construct(ProductServiceInterface $productService, ProductValidationInterface $productValid)
    {
        $this->productService = $productService;
        $this->productValid = $productValid;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $response = ResponseFormat::createBuilder()
        //     ->success(true)
        //     ->payload('payload')
        //     // ->error('code', 'message')
        //     ->build();

        $products = $this->productService->readAll();
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = 'test logging';
        Log::emergency($message);
        Log::alert($message);
        Log::critical($message);
        Log::error($message);
        Log::warning($message);
        Log::notice($message);
        Log::info($message);
        Log::debug($message);

        Log::info('User failed to login.', ['id' => 1]);

        $this->productValid->createOne($request->all());
        return $this->productService->createOne($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ProductResource($this->productService->readOne($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
