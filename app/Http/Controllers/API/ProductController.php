<?php

declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Facades\PriceConvert;
use App\Http\Requests\ProductRequest;
use App\Product;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Float_;

/**
 * Class ProductController
 * @package App\Http\Controllers\API
 */
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
        {
        /** @var User $user */
        $user = Auth::user();

        /** @var Float $discount */
        $discount = (float)$user->roles()->max('discount');

        /** @var LengthAwarePaginator $products */
        $products = Product::paginate(3);

        foreach ($products->items() as $product) {
            $currency = 'EUR';
//            $product->price = PriceConvert::discountedPrice($product->price, $discount);
            $product->price = $this->getCeiled($product->price * PriceConvert::convertToCurrency($currency));
            $product->price .= ', ' . $currency;
        }

        return response($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            $product = Product::create([
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
     * @param  int $id
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
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        try {
            $product = Product::query()->findOrFail($id);
            $product->update([
                'title' => $request->getTitle(),
                'price' => $request->getPrice(),
            ]);
        } catch (ModelNotFoundException $exception) {
            return response(['message' => 'Product was not found'], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

    }


    /**
     * @param $id
     * @throws Exception
     */
    public function destroy($id)
    {
        try {
            Product::query()->findOrFail($id)->delete();
        } catch (ModelNotFoundException $exception) {

        }

    }
    private function getCeiled($amount)
    {
        return ceil(2 * $amount)/2;
    }
}
