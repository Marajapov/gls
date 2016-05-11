<?php
namespace Model\UserOrderTie;

trait ModelRelationships
{
    /*public function subcategory(){
        return $this->belongsTo(\Model\Subcategory\ModelName::class, 'subcategory_id');
    }
    public function category(){
        return $this->belongsTo(\Model\Category\ModelName::class, 'category_id');
    }*/
    public function users(){
        return $this->belongsTo(\Model\User\ModelName::class, 'user_id');
    }
}
