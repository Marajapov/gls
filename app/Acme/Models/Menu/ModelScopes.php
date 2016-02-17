<?php
namespace Model\Menu;

trait ModelScopes {

    public function scopeCode($query, $code = null)
    {
        return $query->where('code', '=', $code);
    }

    public function scopeParent($query)
    {
        return $query->where('parent_id', '=', null);
    }

}
