<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskTodo extends Model
{
    use HasFactory;

    public function added()
	{
        return  $this->belongsTo(User::class, 'auth', 'id');
        
    }
}