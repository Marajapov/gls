<?php
namespace Model\Tag;

trait ModelRelationships
{
    public function category()
    {
        return $this->belongsTo(\Model\Category\ModelName::class, 'category_id');
    }

    public function channel()
    {
        return $this->belongsTo(\Model\Channel\ModelName::class, 'channel_id');
    }

    /**
     * Get all of the posts that are assigned this tag.
     */
    public function posts()
    {
        return $this->morphedByMany(\Model\Post\ModelName::class, 'taggable');
    }

    public function medias()
    {
        return $this->morphedByMany(\Model\MEdia\ModelName::class, 'taggable');
    }

    public function photoChilds()
    {
        return $this->morphedByMany(\Model\Post\ModelName::class, 'taggable');
    }

}
