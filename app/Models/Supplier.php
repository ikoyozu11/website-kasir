<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'supplier';

    protected $primaryKey = 'id_supplier';

    protected $fillable = [
        'nama_supplier',
        'alamat_supplier',
        'email_supplier',
        'telp_supplier',
        'status_supplier',
    ];

    public $timestamps = false;

    public function barang()
    {
        return $this->belongsTo(Barang::class,'id_supplier','id_supplier');
    }

    public function po()
    {
        return $this->belongsTo(Purchasing_Order_Header::class,'id_supplier','id_supplier');
    }

    public function listBarang()
    {
        return $this->hasMany(Barang::class,'id_supplier','id_supplier');
    }
}
