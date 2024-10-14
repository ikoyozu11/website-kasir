<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempTransaksiDetail extends Model
{
    use HasFactory;

    protected $table = 'temp_transaksi_detail';

    protected $primaryKey = 'id_transaksi_detail';

    protected $fillable = [
        'id_transaksi_header',
        'id_stok',
        'jumlah',
        'sub_total',
        'status_transaksi_detail',
    ];

    public $timestamps = false;

    public function stok()
    {
        return $this->hasOne(Stok::class,'id_stok','id_stok');
    }

    public function header()
    {
        return $this->hasOne(TempTransaksiHeader::class,'id_transaksi_header','id_transaksi_header');
    }
}
