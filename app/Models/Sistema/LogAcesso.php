<?php

namespace App\Models\Sistema;

use App\Traits\Uuids;

use Illuminate\Database\Eloquent\Model;

class LogAcesso extends Model
{
    use Uuids;

    protected $table = 'log_acessos';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 'rota', 'usuario', 'permitido' ];
}