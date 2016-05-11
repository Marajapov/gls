<?php
namespace Model\Shared;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    use ModelHelpers, ModelRelationships;

    protected $table = 'shared';

    protected $guarded = ['id'];

    public function getId()
    {
        return $this->id;
    }
}
