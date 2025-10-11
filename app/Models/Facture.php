<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Facture extends Model
{
    use HasFactory; 
    use SoftDeletes;
    protected $primaryKey = 'ref';

    protected $table = 'facture';   
    protected $fillable = [
        'n_ordre',
        'username',
        'ref_client',
        'ref_prix_ciment',
        'prix_ciment_cl',
        'montant',
        'mode_regle',
        'prixtotal',
        'reste',
        'quant_kg',
        'quant_tonne',
        'quant_sacs',
        'date',
        'observation',
        'created_by',
    ];
 
    public function cimentType()
    {
        return $this->belongsTo(CimentType::class, 'ref_prix_ciment', 'ref');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'ref_client');
    }
    
}
