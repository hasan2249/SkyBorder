<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Our_work extends Model
{
    //
    protected  $table = "our_works";

    public function getAllOurWorks(){
        return $this->all();
    }
}
