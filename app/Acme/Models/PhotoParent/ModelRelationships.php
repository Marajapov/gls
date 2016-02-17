<?php
namespace Model\PhotoParent;

trait ModelRelationships
{
    public function photoChildren()
    {
        return $this->hasMany(\Model\PhotoChild\ModelName::class, 'parentId');
    }
}
