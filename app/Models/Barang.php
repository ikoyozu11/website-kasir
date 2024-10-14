<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'barang';

    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'id_kategori',
        'id_supplier',
        'nama_barang',
        'status',
    ];

    public $timestamps = false;

    public function kategori()
    {
        return $this->hasOne(Kategori::class,'id_kategori','id_kategori');
    }

    public function supplier()
    {
        return $this->hasOne(Supplier::class,'id_supplier','id_supplier');
    }

    public function stok()
    {
        return $this->belongsTo(Stok::class,'id_barang','id_barang');
    }
    
    public function po()
    {
        return $this->belongsTo(Purchasing_Order_Detail::class,'id_barang','id_barang');
    }

    public function listSupplier()
    {
        return $this->belongsTo(Supplier::class,'id_supplier','id_supplier');
    }
}
