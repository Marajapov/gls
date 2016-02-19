<?php
namespace Model\Menu;

use Illuminate\Http\Request;

class ModelRepository
{
    public function save(ModelName $menu)
    {
        $menu->save();
    }

    public function saveOrder($items, $parent = null, $counter = 1)
    {
        foreach ($items as $key => $item)
        {
            $menu = ModelName::find($item['id']);
            $menu->order     = $counter++;
            $menu->parent_id = $parent ?: null;
            $menu->save();

            if(array_key_exists('children', $item))
            {
                $this->saveOrder($item['children'], $item['id'], $counter);
            }
        }

        return true;
    }

    public function getItems()
    {
        return ModelName::orderBy('order', 'asc')->get();
    }

    public function getParents($type = '')
    {
        return ModelName::type($type)->where('parent_id', '=', null)->orderBy('order', 'asc')->get();
    }

    public function findById($id)
    {
        return ModelName::findOrFail($id);
    }
}
