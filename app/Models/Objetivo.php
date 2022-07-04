<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'objetivo';

    protected $guarded = [];
}