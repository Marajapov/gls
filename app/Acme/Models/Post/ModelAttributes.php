<?php
namespace Model\Post;

trait ModelAttributes
{
    public function getTagListAttributeKg()
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

    public function getTagListAttributeRu()
    {
        if(isset($this->id)){
            $postId = $this->id; // Post ID
            $result = \Model\Tag\Tag::where('lang','=','ru')->get();
            $tagsRu = $this->tags->lists('id')->toArray();

            $array = [];

            foreach($result as $row)
            {
                foreach ($tagsRu as $tagRu)
                {
                    if($tagRu == $row->id)
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
