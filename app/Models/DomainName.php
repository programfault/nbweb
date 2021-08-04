<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class DomainName extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'domain_names';
    
}
