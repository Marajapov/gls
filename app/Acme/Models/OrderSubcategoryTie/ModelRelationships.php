<?php
namespace Model\OrderSubcategoryTie;

trait ModelRelationships
{
    public function subcategories(){
        return $this->belongsTo(\Model\Subcategory\ModelName::class, 'subcategory_id');
    }
    public function orders(){
        return $this->belongsTo(\Model\Order\ModelName::class, 'order_id');
    }
}
