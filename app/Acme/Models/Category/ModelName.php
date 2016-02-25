<?php
namespace Model\Category;

use Illuminate\Database\Eloquent\Model;

class ModelName extends Model
{
    use ModelHelpers, ModelScopes, ModelRelationships;

    protected $table = 'categories';

    protected $guarded = ['id'];

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getPublished()
    {
        if($this->published == 1)
            return 'Опубликован';
        else
            return 'Не опубликован';
    }

    public function getDate()
    {
        $fullDate = $this->created_at;
        $date = date('d/m/Y', strtotime($fullDate));
        return $date;
    }
}
