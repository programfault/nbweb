<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class NbPost extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'nb_posts';
    
}
