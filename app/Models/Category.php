<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable= ['name','image'];

    public function food()
    {
        return $this->hasOne(Food::class,'category_id','id');
    }

}
