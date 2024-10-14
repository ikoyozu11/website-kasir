<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';

    protected $primaryKey = 'id_customer';

    protected $fillable = [
        'nama_customer',
        'alamat_customer',
        'email_customer',
        'telp_customer',
        'status_customer',
    ];

    public $timestamps = false;
}
