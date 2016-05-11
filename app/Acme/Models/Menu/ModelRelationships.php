<?php
namespace Model\Menu;

trait ModelRelationships
{
    public function submenus()
    {
        return $this->hasMany(ModelName::class, 'parent_id')->orderBy('order', 'asc');
    }

    public function parent()
    {
        return $this->belongsTo(ModelName::class, 'parent_id');
    }
}
