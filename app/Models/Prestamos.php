<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamos extends Model
{
    use HasFactory;

    protected $table = 'prestamos';
    protected $fillable = ['libro_id', 'cliente_id', 'fecha_prestamo', 'dias_prestamo', 'estado'];
    protected $guarded = ['id', 'updated_at', 'created_at'];
    public  function libro() {
        return $this->hasOne(Libro::class, 'id', 'libro_id');
    }

    public  function cliente() {
        return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }
}
