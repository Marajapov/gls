<?php
namespace Model\OrderSubcategoryTie;

trait ModelRelationships
{
    public function subcategory(){
        return $this->belongsTo(\Model\Subcategory\ModelName::class, 'subcategory_id');
    }
    public function category(){
        return $this->belongsTo(\Model\Category\ModelName::class, 'category_id');
    }
    public function order(){
        return $this->belongsTo(\Model\Order\ModelName::class, 'order_id');
    }
}
