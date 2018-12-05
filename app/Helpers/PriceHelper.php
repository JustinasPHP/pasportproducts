<?php

declare(strict_types=1);


namespace App\Helpers;


/**
 * Class PriceHelper
 * @package App\Helpers
 */
class PriceHelper
{
    /**
     * @param float $price
     * @param float $discount
     * @return float
     */
    public function discountedPrice(float $price, float $discount = 0): float
    {
        return (float)number_format($price - (($price * $discount) / 100), 2);
    }

    public function convertToCurrency(string $currency)
    {
        if($currency === 'EUR') {
            return 1;
        }
        $json = file_get_contents('https://api.exchangeratesapi.io/latest');
        if(isset(json_decode($json, true)['rates'][$currency])) {
            return (float)json_decode($json, true)['rates'][$currency];
        } else {
            return 1;
        }
    }

}
