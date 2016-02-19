<?php
namespace Model\Menu;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    use ModelHelpers, ModelRelationships, ModelScopes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menus';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $guarded = ['id'];
    // protected $fillable = [];

    public function id()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getNameRu()
    {
        return $this->nameRu;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getUrl()
    {
        return $this->url;
    }
    public function getParentId()
    {
        return $this->parent_id;
    }

}
