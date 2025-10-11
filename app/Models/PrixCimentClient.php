<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class PrixCimentClient extends Model
{
    use HasFactory   ;
 
    protected $table = 'prix_ciment_client';
    protected $fillable = [
        'ref_client',
        'ref_cimenttype',
        'prix',
        'created_by',
        'updated_by',
    ];
    public function client()
    {
        return $this->belongsTo(Client::class, 'ref_client');
    }
    
    public function cimentType()
    {
        return $this->belongsTo(CimentType::class, 'ref_cimenttype');
    }
    
}