<?php
namespace Model\Category;

trait ModelRelationships
{
    public function orders(){
        return $this->belongsToMany(\Model\Order\ModelName::class, 'order_subcategory_ties','category_id', 'order_id');
    }

    public function subcategories(){
        return $this->hasMany(\Model\Subcategory\ModelName::class, 'category_id');
    }
}
