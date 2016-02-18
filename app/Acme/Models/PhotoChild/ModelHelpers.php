<?php
namespace Model\PhotoChild;

trait ModelHelpers
{
    public function isImage()
    {
        $exists = \Storage::disk('public')->exists($this->getFile());

        $type = $exists ? \Storage::disk('public')->mimeType($this->getFile()) : '';

        return in_array($type, ['image/png', 'image/jpg', 'image/jpeg', 'image/gif']);
    }

    public function getTagListAttribute()
    {
        if(isset($this->id)){
            $postId = $this->id; // Post ID
            $result = \Model\Tag\Tag::where('lang','=','kg')->get();
            $tagsKg = $this->tags->lists('id')->toArray();

            $array = [];

            foreach($result as $row)
            {
                foreach ($tagsKg as $tagKg)
                {
                    if($tagKg == $row->id)
                    {
                        $array[] = $row;
                    }
                }
            }

            return $array;

        }else{
            return [];
        }
    }


    public function getTagListName()
    {
        return isset($this->id) ? $this->tags->lists('name')->toArray() : [];
    }

}
