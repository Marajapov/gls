<?php
namespace Model\Project;

trait ModelScopes {

    public function scopePublished($query)
    {
        return $query->having('published', '=', true);
    }
}