<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
	use HasDateTimeFormatter;

    public function domain(){
        return $this->belongsTo(Domain::class,'domain_id');
    }
}
