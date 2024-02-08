<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autores';

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $fillable = ['name'];
    public function libros() {
        return $this->hasMany(Libro::class);
    }
}
