<?php
namespace Model\Order;
use \Model\Subcategory\ModelName as Subcategory;
use \Model\Category\ModelName as Category;
trait ModelRelationships
{
    public function subcategories(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id');
    }
    public function categories(){
        return $this->belongsToMany(Category::class, 'order_subcategory_ties', 'order_id', 'category_id');
    }
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

}
