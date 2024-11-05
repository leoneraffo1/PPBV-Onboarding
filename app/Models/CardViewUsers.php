<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardViewUsers extends Model
{
    use HasFactory;

    protected $table = "card_view_users";

    public $timestamps = false;

    protected $fillable = ["card_fk", "user_fk"];
}
