<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiHeader extends Model
{
    use HasFactory;


    protected $table = 'transaksi_header';

    protected $primaryKey = 'id_transaksi_header';

    protected $fillable = [
        'id_customer',
        'tanggal_transaksi',
        'total_transaksi',
        'status_transaksi',
        'deskripsi',
    ];

    public $timestamps = false;

    public function customer()
    {
        return $this->hasOne(Customer::class,'id_customer','id_customer');
    }

    public function detail()
    {
        return $this->hasMany(TransaksiDetail::class,'id_transaksi_header','id_transaksi_header');
    }
}
