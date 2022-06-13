<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etapas extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'etapas';

    protected $guarded = [];
    public function caixaEntrada(){
        return $this->belongsTo(Post::class, 'id_etapa', 'id');
    }
}