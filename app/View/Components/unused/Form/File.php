<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

use App\Models\Upload;
use Illuminate\Support\Arr;

class File extends Component
{
    
    public $items = [];
    public $multiple;
    public $name;
    public $ids;
    public $max;

    public $cData = [  
        'value' => '',   
        'name' => '',
        'multiple' => false,
        'max' => null
    ];
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($cData)
    {
        $this->cData = array_merge($this->cData, $cData);

        $this->multiple = $this->cData['multiple'];
        
        $this->name = $this->cData['name'];
        $this->ids = Arr::wrap($this->cData['value']);
        $this->max = $this->cData['max'];

        if ($this->multiple && $this->name) {
            $this->name .= '[]';
        }        

        if (count($this->ids) > 0) {
            if ($this->multiple) {
                if ($this->max) {
                    $this->ids = array_slice($this->ids, 0, $this->max);
                }
            } else {
                $this->ids = [$this->ids[0]];
                $this->max = 1;
            }
            $data = Upload::find($this->ids)->keyBy('id');
            foreach($this->ids as $id) {
                if(isset($data[$id])) {
                    $this->items[] = $data[$id];
                }
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
        return view('components.form.file');
    }
}
