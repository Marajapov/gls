<?php
namespace Model\PhotoChild;

trait ModelRelationships
{
    public function tags()
    {
        return $this->morphToMany(\Model\Tag\Tag::class, 'taggable');
    }

    public function parent()
    {
        return $this->belongsTo(\Model\PhotoParent\ModelName::class, 'parentId');
    }
}