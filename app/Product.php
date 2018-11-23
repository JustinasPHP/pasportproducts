<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App
 */
class Product extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'price'
    ];

    /**
     * @var array
     */
    protected $cast= [
        'title' => 'string',
        'price' => 'float'
    ];
}
