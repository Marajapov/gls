<?php
namespace Model\Order;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class ModelName extends Model
{
    use ModelHelpers, ModelRelationships;

    protected $table = 'orders';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $guarded = ['id'];
    // protected $fillable = [];

    /**
     * Searchable rules.
     *
     * @var array
     */

    public static function boot()
    {
        parent::boot();

    }

    public function id()
    {
        return $this->id;
    }
}
