<?php
namespace Model\UserSubcategoryTie;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    use ModelHelpers, ModelScopes, ModelRelationships;

    protected $table = 'user_subcategory_ties';

    protected $guarded = ['id'];

    public function getId()
    {
        return $this->id;
    }
}
