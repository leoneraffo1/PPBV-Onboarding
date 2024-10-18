<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseHasUsers extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = ["course_fk", "user_fk"];
}
