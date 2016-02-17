<?php
namespace Model\Post;

trait ModelScopes {

    public function scopePublished($query)
    {
        return $query->where('published', '=', true);
    }

    public function scopeLanguagekg($query)
    {
        return $query->having('title', '<>', '');
    }

    public function scopeLanguageru($query)
    {
        return $query->having('titleRu', '<>', '');
    }

    public function scopeLanguageKgOrRu($query)
    {
        $lc = app()->getlocale();
        if($lc == 'kg'){
            return $query->having('title', '<>', '');
        }else{
            return $query->having('titleRu', '<>', '');    
        }        
    }

    public function scopeType($query, $type = "post")
    {
        $type = in_array($type, ['post', 'post'])? $type : "post";

        return $query->where('type', '=', $type);
    }

    public function scopeGeneral($query, \Model\Channel\ModelName $channel = null)
    {
        return $query->where('general', '=', true)->orWhere('channel_id', '=', $channel->id());
    }


    // Filter posts functions KG
    public function scopeDatefromkg($query,$df) // for filter in /posts/general
    {
        $dateFrom = date('Y-m-d',strtotime($df));
        return $query->where('title','<>','')
                        ->where('created_at', '>=', $dateFrom);
    }
    
    public function scopeDatetokg($query,$dt) 
    {
        $dateTo = date('Y-m-d',strtotime($dt.'+ 1 days'));
        return $query->where('title','<>','')
                        ->where('created_at', '<=', $dateTo);
    }

    // Filter posts functions RU
    public function scopeDatefromru($query,$df) // for filter in /posts/general
    {
        $dateFrom = date('Y-m-d',strtotime($df));
        return $query->where('titleRu','<>','')
                        ->where('created_at', '>=', $dateFrom);
    }
    
    public function scopeDatetoru($query,$dt) 
    {
        $dateTo = date('Y-m-d',strtotime($dt.'+ 1 days'));
        return $query->where('titleRu','<>','')
                        ->where('created_at', '<=', $dateTo);
    }

}
