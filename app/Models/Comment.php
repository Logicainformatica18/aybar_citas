<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table ="comentarios";
    public $timestamps = false; // Desactiva created_at y updated_at
    public function cite(){
        return $this->belongsTo("App\Models\Cite", 'id_cita', 'id_cita');
    }
}
