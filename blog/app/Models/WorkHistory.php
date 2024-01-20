<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkHistory extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'company', 'start_date', 'end_date', 'user_id'];
}
