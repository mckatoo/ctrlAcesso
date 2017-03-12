<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
	protected $table = 'campus';
    protected $dates = ['created_at', 'updated_at'];
}
