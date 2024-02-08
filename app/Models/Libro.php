<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libros';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['titulo', 'autor_id', 'description', 'lote'];
    public  function autor() {
        return $this->belongsTo(Autor::class);
    }

    public function prestamos() {
        return $this->hasMany(Prestamos::class);
    }
}
