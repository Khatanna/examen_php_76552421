<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['name', 'email', 'celular'];
    public function prestamos() {
        return $this->hasMany(Prestamos::class);
    }
}
