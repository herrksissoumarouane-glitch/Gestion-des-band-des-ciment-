<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CimentType extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ciment_type';
    protected $primaryKey = 'ref';
    public $timestamps = true;

    protected $fillable = [
        'nom',
        'created_by',
        'updated_by',
    ];

    public function prixCiments()
    {
        return $this->hasMany(PrixCimentClient::class, 'ref_cimenttype', 'ref');
    }
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'prix_ciment_client', 'ref_cimenttype', 'ref_client')
                    ->withPivot('prix')  // If needed
                    ->withTimestamps();
    }
}