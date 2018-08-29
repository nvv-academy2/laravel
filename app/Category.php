<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @package App
 * @property string $name
 * @property int $weight
 */
class Category extends Model
{
    public $table = 'categories';
    public $hidden = ['created_at', 'updated_at'];
    public $fillable = [
        'name',
        'weight'
    ];
}
