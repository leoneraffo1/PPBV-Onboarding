<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ["name"];

    public function users()
    {
        return $this->belongsToMany(User::class, 'course_has_users', 'course_fk', 'user_fk');
    }
}
