<?php
namespace Model\Page;

trait ModelScopes {

    public function scopePublished($query)
    {
        return $query->where('published', '=', true);
    }

    public function scopeGeneral($query, \Model\Channel\ModelName $channel = null)
    {
        return $query->where('general', '=', true)->orWhere('channel_id', '=', $channel->id());
    }

}
