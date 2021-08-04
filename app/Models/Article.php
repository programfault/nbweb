<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasDateTimeFormatter;
    use SoftDeletes;

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function status(){
        return $this->belongsTo(Status::class);
    }
}
