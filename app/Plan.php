<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Attributes\PlanAttributes;
use App\Models\Traits\ModelAttributes;

class Plan extends Model
{
    //
    use  ModelAttributes, PlanAttributes;
    protected  $table = "plans";

    protected $fillable = [
        'id',
        'title_ar',
        'title_en',
        'content_ar',
        'content_en',
        'price',
        'img',
        'service_id',
        'created_at',
        'updated_at',
            ];

    public function service()
    {
        return $this->belongsTo('App\Service');
    }

    public function getAllPlans()
    {
        return $this->all();
    }
}
