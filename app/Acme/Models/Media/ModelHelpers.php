<?php
namespace Model\Media;

trait ModelHelpers
{

    public function incrementViewed($step = 1)
    {
        $this->viewed += $step;
        $this->save();
    }

    public function isImage()
    {
        return $this->type == 'image';

    }

}
