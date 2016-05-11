<?php
namespace Model\Subcategory;

trait ModelScopes {

    public function scopePublished($query)
    {
        return $query->where('published', '=', true);
    }

}
