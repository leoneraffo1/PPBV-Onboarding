<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $fillable = [
        "title",
        "description",
        "image",
        "order",
        "course_fk",
    ];

    public function course()
    {
        $this->belongsTo(Course::class, "course_fk");
    }

    public function archive()
    {
        return $this->belongsToMany(Archive::class, 'archive_has_cards', 'card_fk', 'archive_fk');
    }
}
