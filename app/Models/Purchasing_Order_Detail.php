<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchasing_Order_Detail extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'purchasing_order_detail';

    protected $primaryKey = 'id_purchasing_order_detail';

    protected $fillable = [
        'id_purchasing_order_header',
        'id_barang',
        'jumlah_barang',
        'harga_barang',
        'sub_total',
        'status_order_detail',
    ];

    public $timestamps = false;

    public function barang()
    {
        return $this->hasOne(Barang::class,'id_barang','id_barang');
    }

    public function header()
    {
        return $this->belongsTo(Purchasing_Order_Header::class,'id_purchasing_order_header','id_purchasing_order_header');
    }


    public function stok()
    {
        return $this->hasOne(Stok::class,'id_purchasing_order_detail','id_purchasing_order_detail');
    }
}
