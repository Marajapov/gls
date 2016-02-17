<?php
namespace Model\Anons;

trait ModelRelationships
{
    public function channel()
    {
        return $this->belongsTo(\Model\Channel\ModelName::class, 'channel');
    }
}