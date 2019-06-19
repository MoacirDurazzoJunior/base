<?php

namespace App\Models\Sistema;

use App\Traits\Uuids;
use App\Traits\Trackable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modulo extends Model
{
    use SoftDeletes;
    use Trackable;
    use Uuids;

    protected $table = 'modulos';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'icone', 'tema', 'cor', 'prefixo'
    ];

    /**
     * Relacionamentos do Model
     */
    public function submodulos()
    {
        return $this->hasMany('App\Models\Sistema\SubModulo');
    }
}