<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Attributes\Our_workAttributes;
use App\Models\Traits\ModelAttributes;

class Our_work extends Model
{
    //
    use  ModelAttributes, Our_workAttributes;
    protected  $table = "our_works";

    protected $fillable = [
        'id',
        'title_ar',
        'title_en',
        'content_ar',
        'content_en',
        'img',
        'created_at',
        'updated_at',
            ];

    public function getAllOurWorks(){
        return $this->all();
    }
}
