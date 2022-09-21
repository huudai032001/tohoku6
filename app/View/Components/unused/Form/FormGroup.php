<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class FormGroup extends Component
{
    // public $required = false;
    // public $label;
    // public $hasError = true;
    // public $errors = [];
    
    public $cData = [
        'type' => '',        
        'label' => '',
        'required' => false
    ];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $cData = [])
    {
        $this->cData = array_merge($this->cData, $cData);        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form.form-group');
    }
}
