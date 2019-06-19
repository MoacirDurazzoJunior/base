<?php

namespace App\Models\Sistema;

use App\Traits\Uuids;
use App\Traits\Trackable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubModulo extends Model
{
    use SoftDeletes;
    use Trackable;
    use Uuids;

    protected $table = 'sub_modulos';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'modulo_id', 'nome', 'icone', 'rota', 'prefixo'
    ];

    /**
     * Relacionamentos do Model
     */
    public function modulo()
    {
        return $this->belongsTo('App\Models\Sistema\Modulo');
    }

    public function acoes()
    {
        return $this->hasMany('App\Models\Sistema\Acao', 'sub_modulo_id');
    }

    /**
     * Altera o valor do campo nome_pai, sempre que este for acessado pela aplicação
     */
    public function getNomePaiAttribute()
    {
        return "{$this->modulo->nome} > {$this->nome}";
    }
}
