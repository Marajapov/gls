<?php
namespace Model\Subcategory;

trait ModelRelationships
{
	public function category()
    {
        return $this->belongsTo(\Model\Category\ModelName::class, 'category_id');
    }
    public function users(){
        return $this->belongsToMany(\Model\User\ModelName::class, 'user_subcategory_ties','subcategory_id', 'user_id');
    }
    public function orders(){
        return $this->belongsToMany(\Model\Order\ModelName::class, 'order_subcategory_ties','subcategory_id', 'order_id');
    }
}
