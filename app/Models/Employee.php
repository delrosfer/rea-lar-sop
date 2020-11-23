<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Employee extends Model
{
    protected $fillable = [
    	'first_name',
    	'last_name',
    	'email',
    	'phone',
    	'address',
    	'avatar',
    	'user_id',
    ];

    public function getAvatarUrl()
    {
    	return Storage::url($this->avatar);
    }
}
