<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stok extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'stok';

    protected $primaryKey = 'id_stok';

    protected $fillable = [
        'id_barang',
        'id_purchasing_order_detail',
        'harga_barang_jual',
        'status',
    ];

    public $timestamps = false;

    public function barang()
    {
        return $this->hasOne(Barang::class,'id_barang','id_barang');
    }

    public function temp_transaksi()
    {
        return $this->belongsTo(TempTransaksiDetail::class,'id_stok','id_stok');
    }

    public function transaksi()
    {
        return $this->belongsTo(TransaksiDetail::class,'id_stok','id_stok');
    }

    public function po()
    {
        return $this->hasOne(Purchasing_Order_Detail::class,'id_purchasing_order_detail','id_purchasing_order_detail');
    }
}
