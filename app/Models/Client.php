<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{

    use HasFactory,SoftDeletes ;
    public $incrementing = true;  
    protected $keyType = 'int';
    protected $primaryKey = 'ref';
    protected $fillable = ['nom', 'created_by', 'updated_by'];
    public function cimentTypes()
    {
        return $this->belongsToMany(CimentType::class, 'prix_ciment_client', 'ref_client', 'ref_cimenttype')
                    ->withPivot('prix')   
                    ->withTimestamps();
    }
    
}
