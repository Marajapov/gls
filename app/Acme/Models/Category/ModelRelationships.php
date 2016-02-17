<?php
namespace Model\Category;

trait ModelRelationships
{
    public function posts()
    {
        return $this->hasMany(\Model\Post\ModelName::class, 'category_id');
    }
}
