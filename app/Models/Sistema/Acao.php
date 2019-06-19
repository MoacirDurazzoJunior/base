<?php

namespace App\Models\Sistema;

use App\Traits\Uuids;
use App\Traits\Trackable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Acao extends Model
{
    use SoftDeletes;
    use Trackable;
    use Uuids;

    protected $table = 'acoes';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sub_modulo_id', 'nome', 'rota', 'icone', 'descricao'
    ];

    /**
     * Relacionamentos do Model
     */
    public function submodulo()
    {
        return $this->belongsTo('App\Models\Sistema\SubModulo', 'sub_modulo_id');
    }
}
