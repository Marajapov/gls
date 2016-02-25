<?php
namespace Model\UserSubcategoryTie;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    use ModelHelpers, ModelScopes, ModelRelationships;

    protected $table = 'user_subcategory_tie';

    protected $guarded = ['id'];

    public function getId()
    {
        return $this->id;
    }
}
