<?php
namespace Model\Comment;

trait ModelRelationships
{
    public function post()
    {
        return $this->belongsTo(\Model\Post\ModelName::class, 'resourceId');
    }

    public function media()
    {
        return $this->belongsTo(\Model\Media\ModelName::class, 'resourceId');
    }
}
