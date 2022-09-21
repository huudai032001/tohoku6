<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class HierarchyModelSelect extends Component
{
    public $modelClass;
    public $options;
    public $selectedValue;
    public $exclude;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($modelClass, $exclude = null, $selectedValue = null)
    {
        $this->modelClass = $modelClass; 
        $this->options = [];        
        $this->selectedValue = $selectedValue;   
        $this->exclude = $exclude;
        $this->getItems();
    }

    public function getItems($parent = null, $pad = '')
    {
        if ($parent) {
            $items = $parent->children()->orderBy('id', 'asc')->get();
        } else {
            $items = $this->modelClass::with('children')->whereNull('parent_id')->orderBy('id', 'asc')->get();
        }
        
        foreach ($items as $item) {          
            if ($this->exclude && $this->exclude == $item->id) continue;
            $this->options[] = [
                'id' => $item->id,
                'name' => $pad . $item->name
            ];
            if ($item->children->isNotEmpty()) {
                $this->getItems($item, $pad . '------ ');
            }
        }
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        
        return view('components.form.hierarchy-model-select');
    }
}
