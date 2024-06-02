<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TdOrder extends Model
{
    use HasFactory;
    protected $table = "tdorder";
    protected $fillable = [];

    // protected $fillable = [
    //     'title',
    //     'content',
    // ];
}