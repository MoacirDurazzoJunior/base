<?php

namespace App\Models\Sistema;

use App\Traits\Trackable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Webpatser\Uuid\Uuid;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use EntrustUserTrait { restore as private restoreEntrustUserTrait; }
    use Notifiable;
    use Trackable;
    use SoftDeletes { restore as private restoreSoftDeletes; }

    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'login', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * fix collision on restore methods in SoftDelete trait and Entrust trait
     */
    public function restore()
    {
        $this->restoreEntrustUserTrait();
        $this->restoreSoftDeletes();
    }

    /**
     * Cria Uuid ao criar um registro
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::generate()->string;
        });
    }

}