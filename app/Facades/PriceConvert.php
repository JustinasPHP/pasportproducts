<?php

declare(strict_types=1);


namespace App\Facades;


use App\Helpers\PriceHelper;
use Illuminate\Support\Facades\Facade;


/**
 * Class PriceConvert
 * @method static float discountedPrice(float $price, float $discount = 0)
 * @method static float convertToCurrency(string $currency)
 * @package App\Facades
 */
class PriceConvert extends Facade
{

    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
//        return 'price.converter';
        return PriceHelper::class;
    }
}
