<?php

namespace App\Models\Sistema;

use App\Traits\Uuids;
use App\Traits\Trackable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assinatura extends Model
{
    use SoftDeletes;
    use Trackable;
    use Uuids;

    protected $table = 'assinaturas';
    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'registro_id','referencia'
    ];

    public function assinatura_user()
    {
        return $this->belongsTo('App\Models\Sistema\User', 'cadastrado_por');
    }
}