<?php
namespace Model\Page;

trait ModelRelationships
{
   public function channel()
    {
        return $this->belongsTo(\Model\Channel\ModelName::class, 'channel_id');
    }
}
