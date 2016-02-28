<?php
namespace Model\Order;

trait ModelRelationships
{
    public function subcategories(){
        return $this->belongsToMany(\Model\Subcategory\ModelName::class, 'order_subcategory_ties', 'order_id', 'subcategory_id');
    }
}
