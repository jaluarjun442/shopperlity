<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    public $table = 'product';

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
  
}
