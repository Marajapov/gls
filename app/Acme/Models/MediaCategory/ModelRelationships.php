<?php
namespace Model\MediaCategory;

trait ModelRelationships
{
    public function medias()
    {
    	return $this->hasMany(\Model\Media\ModelName::class, 'videoType');
    }
}
