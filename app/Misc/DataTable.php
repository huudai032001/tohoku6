<?php
namespace App\Misc;

class DataTable
{
    protected $columns = [];
    

    public function __construct($arr = [])
    {
        if(!empty($arr)) {
            foreach ($arr as $arr_item) {
                $this->addColumn($arr_item[0], $arr_item[1], $arr_item[2]);
            }
        }
    }

    public function addColumn($column, $heading, $callback)
    {
        $this->columns[$column] = [
            'heading' => $heading,
            'callback' => $callback
        ];
    }

    public function getColumns()
    {
        return $this->columns;
    }

    public function getHeading($column)
    {
        if (!empty($this->columns[$column])) {
            return $this->columns[$column]['heading'];
        }
    }

    public function getItemData($column, $item)
    {
        if (!empty($this->columns[$column])) {
            return call_user_func($this->columns[$column]['callback'], $item);
        }
    }
   

    public function addSimpleColumn($column, $heading) 
    {
        $this->addColumn($column, $heading, function ($item) use ($column)
        {
            return $item->$column;
        });
    }

    public function addLabelColumn($column, $heading, $callback, $htmlClasses = [])
    {
        $this->addColumn($column, $heading, function($item) use ($callback, $htmlClasses)
        {
            $htmlClasses = array_merge([
                'active' => 'badge badge-primary',
                'inactive' => 'badge badge-secondary'
            ], $htmlClasses);

            $callbackData = call_user_func($callback, $item);
            $value = $callbackData[0];
            $label = $callbackData[1];

            if (empty($htmlClasses[$value])) {
                return $label;
            } else {
                return '<span class="'.$htmlClasses[$value].'">'.$label.'</span>';
            }            
        });
    }

    public function addImageColumn($column = 'image', $heading = '', $callback = null)
    {
        $this->addColumn($column, $heading ?: __('common.image'), function ($item) use ($callback)
        {
            if ($callback) {
                $image = call_user_func($callback, $item);                
            } elseif ($image->image_id) {
                $image = $item->image;
            }
            
            if (!empty($image)) {
                return sprintf('<div class="data-table-image"><img src="%s"></div>', $image->getUrl('thumbnail'));
            }
        });
    }    

    public function addCategoryColumn($column = 'category', $heading = '', $callback = null)
    {
        $this->addColumn($column, $heading ?: __('common.category'), function ($item) use ($callback)
        {
            if ($callback) {
                $category = call_user_func($callback, $item);                
            } elseif($item->category_id) {
                $category = $item->category;
            }

            if (!empty($category)) {
                return $category->name;
            }
        });
    }

    public function addTagColumn($column = 'tag', $heading = '', $callback = null)
    {
        $this->addColumn($column, $heading ?: __('common.tag'), function ($data) use ($callback)
        {
            if ($callback) {
                $tags = call_user_func($callback, $item);                
            } else {
                $tags = $item->tags()->get();
            }
            
            if ($tags->isNotEmpty()) {
                return implode(', ', $tags->pluck('name')->toArray());
            }
        });
    }    

    public function addParentColumn($column = 'parent', $heading = '', $callback = null)
    {
        $this->addColumn($column, $heading ?: __('common.parent'), function ($item)
        {
            if ($data->parent_id) {
                return $data->parent->name;
            }
        });
    }

    
}