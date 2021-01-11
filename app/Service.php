<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Models\Traits\Attributes\ServiceAttributes;
use App\Models\Traits\ModelAttributes;
// use App\Models\Traits\Relationships\PageRelationships;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    //
    // use SoftDeletes,
    use  ModelAttributes, ServiceAttributes;
    
    protected  $table = "services";

    public function plans()
    {
        return $this->hasMany('App\Plan');
    }

    protected $fillable = [
            'title_ar',
            'title_en',
            'content_ar',
            'content_en',
            'price',
            'img',
            'created_at',
            'updated_at',
                ];

    public function getAllServices(){
        return $this->all();
    }

}
