<?php
namespace App\Form;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class Model extends FormGroup
{
    public $modelClass;
    public $hierachy;
    public $limit;
    public $depth;
    public $exclude;
    public $class;

    public function __construct ($options)
    {
        parent::__construct($options);
        $this->modelClass = $options['model'] ?? false;
        $this->empty_option = $options['empty_option'] ?? true;
        $this->empty_option_label = $options['empty_option_label'] ?? '';
        $this->hierachy = $options['hierachy'] ?? $this->modelClass::isHierachy();
        $this->limit = $options['limit'] ?? 100;
        $this->depth = $options['depth'] ?? null;
        $this->exclude = $options['exclude'] ?? null;
        $this->class = $options['class'] ?? '';
        $session = request()->session();        
        $this->value = $session->hasOldInput() ? old($this->name) : $this->data;
    }

    public function showData()
    {
        return $this->data;
    }

    public function editMode()
    {
        $html = sprintf('<div class="form-inline"><select class="form-control %s" name="%s">', 
        $this->class,
        $this->name);
        if($this->empty_option) {
            $html .= '<option value="">' . $this->empty_option_label . '</option>';
        }
        $query = $this->modelClass::query();
        if ($this->hierachy) {
            $query->whereNull('parent_id');
        }
        if ($this->exclude) {
            $query->whereNotIn('id', \Arr::wrap($this->exclude));
        }
        if ($this->limit) {
            $query->take($this->limit);
        }
        $items = $query->get();
        
        if ($items) {
            $html .= $this->getOptionTags($items, 1);
        }
        $html .= sprintf('</select></div>');
        return $html;
    }

    public function getOptionTags($items, $level)
    {
        if ($this->depth && $level > $this->depth) return;

        $html = ''; 
        foreach ($items as $item) {
            $html .= sprintf(
                '<option value="%s" %s>%s</option>', 
                $item->id, 
                $item->id == $this->value ? 'selected' : '',
                str_repeat('----', $level - 1) . ' ' . $item->getName()
            );

            $item->load(['children' => function ($query)
            {
                if ($this->exclude) {                
                    $query->whereNotIn('id', \Arr::wrap($this->exclude));
                }                
            }]);  
            
            
            if ($this->hierachy && ($item->children->count() > 0)) {
                $html .= $this->getOptionTags($item->children, $level + 1);
            }
        }
        return $html;
    }

    public function confirmMode()
    {
        $hidden = sprintf('<input type="hidden" name="%s" value="%s">', 
            $this->name, 
            $this->value
        );
        $show = $this->getSelectedItemName();        
        return $hidden . $show;
    }

    public function viewMode()
    {        
        return $this->getSelectedItemName();
    }

    protected function getSelectedItemName() 
    {
        $item = $this->modelClass::find($this->value);
        if ($item) {
            return $item->getName();
        }
    }
}