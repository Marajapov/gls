<?php
namespace Model\User;

trait ModelRelationships
{
    public function channel()
    {
        return $this->belongsTo(\Model\Channel\ModelName::class, 'channel_id');
    }
}
