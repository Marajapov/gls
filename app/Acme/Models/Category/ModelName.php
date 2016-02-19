<?php
namespace Model\Category;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    use ModelHelpers, ModelScopes, ModelRelationships;

    protected $table = 'categories';

    protected $guarded = ['id'];

    public function id()
    {
        return $this->id;
    }

    public function getTitle()
    {
        $lc = app()->getlocale();
        if($lc == 'kg'){
            return $this->title;
        }else{
            return $this->titleRu;
        }
    }

}
