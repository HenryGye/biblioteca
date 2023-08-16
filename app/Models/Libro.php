<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Categoria;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libro';
    protected $fillable = ['categoria_id','autor','nombre','precio','fecha_lanzamiento','rentado'];

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}
