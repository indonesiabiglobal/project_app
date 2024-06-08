<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TdOrderLpk extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "tdorderlpk";
    // protected $fillable = [
    //     'po_no',
    //     'product_id',
    //     'order_qty',
    // ];
}