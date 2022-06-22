<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acesso extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'acesso';

    protected $guarded = [];
    public function users(){
        return $this->belongsTo(User::class, 'id_acesso', 'id');
    }
}