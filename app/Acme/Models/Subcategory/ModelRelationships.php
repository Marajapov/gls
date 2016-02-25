<?php
namespace Model\Subcategory;

trait ModelRelationships
{
	public function category()
    {
        return $this->belongsTo(\Model\Category\ModelName::class, 'category_id');
    }
}
