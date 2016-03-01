<?php
namespace Model\Order;

trait ModelRelationships
{
    public function subcategories(){
        return $this->belongsToMany(\Model\Subcategory\ModelName::class, 'order_subcategory_ties', 'order_id', 'subcategory_id');
    }
    public function categories(){
        return $this->belongsToMany(\Model\Category\ModelName::class, 'order_subcategory_ties', 'order_id', 'category_id');
    }
}
