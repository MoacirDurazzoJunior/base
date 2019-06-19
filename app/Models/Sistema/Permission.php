<?php 
namespace App\Models\Sistema;

use App\Traits\Trackable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Webpatser\Uuid\Uuid;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    use SoftDeletes;
    use Trackable;

    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'display_name', 'description'
    ];

    /**
     * Cria Uuid ao criar um registro
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Uuid::generate()->string;
        });
    }

    /**
     * Altera o valor do campo detalhes, sempre que este for acessado pela aplicação
     */
    public function getDetalhesAttribute()
    {
        return "{$this->name} > {$this->display_name} > {$this->description}";
    }
}