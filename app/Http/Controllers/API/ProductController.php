<?php

declare(strict_types=1);
namespace App\Http\Controllers\API;

use App\Http\Requests\ProductRequest;
use App\Product;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        $products = Product::paginate(3);

        return response($products->items());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
          $product =  Product::create([
                'title' => $request->getTitle(),
                'price' => $request->getPrice()
            ]);
            return response($product);
        } catch (Exception $exception) {
            return response(['message' => 'Product was not created'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//        $product = Product::find($id);
        try {
            $product = Product::query()->findOrFail($id); // geriau ši funkcija, nes jei neranda, išmeta exception
            return response($product);
        } catch (ModelNotFoundException $exception) {
            return response(['message' => 'Product by id not found'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::query()->findOrFail($id);
        $product->update([
            'title' => $request->getTitle(),
            'price' => $request->getPrice(),
        ]);
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
