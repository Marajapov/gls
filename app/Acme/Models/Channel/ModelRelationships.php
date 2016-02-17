<?php
namespace Model\Channel;

trait ModelRelationships
{
    public function users()
    {
        return $this->hasMany(\Model\User\ModelName::class, 'channel_id');
    }

    public function posts()
    {
        // $perPage = 10;
        return $this->hasMany(\Model\Post\ModelName::class, 'channel_id')->orderBy('id', 'desc')->published();
    }

    public function latestposts()
    {
        return $this->hasMany(\Model\Post\ModelName::class, 'channel_id')->orderBy('id', 'desc')->published()->take(5)->skip(0);
    }

    public function topposts()
    {
        return $this->hasMany(\Model\Post\ModelName::class, 'channel_id')->orderBy('viewed', 'desc')->orderBy('id', 'desc')->published();
    }
}
