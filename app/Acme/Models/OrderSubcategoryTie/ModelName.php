<?php
namespace Model\OrderSubcategoryTie;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    use ModelHelpers, ModelScopes, ModelRelationships;

    protected $table = 'order_subcategory_ties';

    protected $guarded = ['id'];

    public function getId()
    {
        return $this->id;
    }
}
