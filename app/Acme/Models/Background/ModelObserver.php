<?php
namespace Model\Background;

class ModelObserver
{

    public function creating($model)
    {
        $model->owner_id = auth()->check()? auth()->user()->id() : null;
    }

    public function created($model)
    {
    }

    public function updating($model)
    {

    }

    public function updated($model)
    {

    }

    public function saving($model)
    {

    }

    public function saved($model)
    {

    }

    public function deleting($model)
    {

    }

    public function deleted($model)
    {

    }

}
