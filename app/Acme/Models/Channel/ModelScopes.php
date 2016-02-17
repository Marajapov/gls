<?php
namespace Model\Channel;

trait ModelScopes {

    public function scopePublished($query)
    {
        return $query->where('published', '=', true);
    }

    public function scopeLanguagekg($query)
    {
        dd("123");
        return $query->where('language','=','languagekg');
    }

    public function scopeGeneral($query)
    {
        return $query->where('name', '=', 'general')->first();
    }

    public function scopeName($query, $name = "general")
    {
        return $query->where('name', '=', $name)->first();
    }

}
