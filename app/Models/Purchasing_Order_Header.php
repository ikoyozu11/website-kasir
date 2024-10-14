<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Purchasing_Order_Header extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'purchasing_order_header';

    protected $primaryKey = 'id_purchasing_order_header';

    protected $fillable = [
        'id_supplier',
        'tanggal_order',
        'total_order',
        'status_order',
    ];

    public $timestamps = false;

    public function supplier()
    {
        return $this->hasOne(Supplier::class,'id_supplier','id_supplier');
    }

    public function detail()
    {
        return $this->hasMany(Purchasing_Order_Detail::class,'id_purchasing_order_header','id_purchasing_order_header');
    }

}
