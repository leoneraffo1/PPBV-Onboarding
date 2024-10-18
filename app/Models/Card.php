<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public $timestamps = false;
    protected $table = 'card';
    protected $fillable = ['titulo','descricao','anexo','midia'];
    protected $primaryKey = 'id_card';
}
