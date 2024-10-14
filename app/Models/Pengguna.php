<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Pengguna extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'pengguna'; 

    protected $primaryKey = 'id_pengguna'; 

    protected $fillable = [
        'nama_pengguna',
        'password_pengguna',
    ];

    public function getAuthPassword()
    {
        return $this->password_pengguna;
    }

    public $timestamps = false; 
}
