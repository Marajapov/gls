<?php
namespace Model\User;

trait ModelRelationships
{
    public function subcategories(){
        return $this->belongsToMany(\Model\Subcategory\ModelName::class, 'user_subcategory_ties', 'user_id', 'subcategory_id');
    }
}
