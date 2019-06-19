<?php

namespace App\Models\Sistema;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class LogRegistro extends Model
{
    use Uuids;

    protected $table = 'log_registros';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tabela',
        'operacao',
        'dado_anterior',
        'dado_posterior',
        'chave',
        'usuario'
    ];
}