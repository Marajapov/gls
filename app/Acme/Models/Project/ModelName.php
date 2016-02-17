<?php
namespace Model\Project;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    use ModelHelpers, ModelScopes, ModelRelationships;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';
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

    public function getParentId()
    {
        return $this->parentId;
    }
    
    public function getTitle()
    {
        return $this->name;
    }

    public function getTitleRu()
    {
        return $this->nameRu;
    }
    
    public function getNameOne()
    {
        $lc = app()->getlocale();
        if($lc == 'kg'){
            return $this->name;
        }else{
            return $this->nameRu;
        }
    }

    public function getDescription()
    {
        $lc = app()->getlocale();
        if($lc == 'kg'){
            return $this->description;
        }else{
            return $this->descriptionRu;
        }
    }

    public function getFile()
    {
        return $this->thumbnail;
    }
}
