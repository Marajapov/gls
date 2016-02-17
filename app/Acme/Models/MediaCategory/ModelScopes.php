<?php
namespace Model\MediaCategory;

trait ModelScopes {

    public function scopePublished($query)
    {
        return $query->where('published', '=', true);
    }

    public function scopeByCategory($query, $category)
    {
    	return $query->where('videoType', '=', $category);
    }

}