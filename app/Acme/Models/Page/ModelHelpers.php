<?php
namespace Model\Page;

trait ModelHelpers
{
    public function incrementViewed($step = 1)
    {
        $this->viewed += $step;
        $this->save();
    }

    public function isPublished()
    {
        return $this->published == true;
    }

}
