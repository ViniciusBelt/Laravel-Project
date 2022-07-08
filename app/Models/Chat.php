<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'chat';

    protected $guarded = [];

    public function user(){
        return $this->hasOne(User::class, 'user_1', 'id', User::class, 'user_2', 'id'); 
    }
}