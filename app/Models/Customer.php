<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  
    protected $fillable = [
        'dni','firstname','lastname','names','cellphone','message','project_id'
    ];
    use HasFactory;
    public function project(){
        return $this->belongsTo(Project::class,"project_id");
    }
}
