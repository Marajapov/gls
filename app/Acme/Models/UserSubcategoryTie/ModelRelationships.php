<?php
namespace Model\UserSubcategoryTie;

trait ModelRelationships
{
    public function subcategories(){
        return $this->belongsTo(\Model\Subcategory\ModelName::class, 'subcategory_id');
    }
    public function users(){
        return $this->belongsTo(\Model\User\ModelName::class, 'user_id');
    }
}
