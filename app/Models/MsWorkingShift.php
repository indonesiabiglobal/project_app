<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MsWorkingShift extends Model
{
    use HasFactory;
    protected $table = "msworkingshift";
    protected $fillable = [];

    // protected $fillable = [
    //     'title',
    //     'content',
    // ];
}