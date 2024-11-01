<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchiveHasCard extends Model
{
    use HasFactory;

    protected $table = "archive_has_cards";

    protected $fillable = [
        'card_fk',
        'archive_fk',
    ];

    public $timestamps = false;
}
