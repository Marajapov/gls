<?php
namespace Model\UserOrderTie;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    use ModelHelpers, ModelScopes, ModelRelationships;

    protected $table = 'user_order_tie';

    protected $guarded = ['id'];

    public function getId()
    {
        return $this->id;
    }
}
