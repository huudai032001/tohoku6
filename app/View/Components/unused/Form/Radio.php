<?php

namespace App\View\Components\Form;

use Illuminate\View\Component;

class Radio extends Component
{
    public $cData = [  
        'name' => '',   
        'label' => '',
        'required' => false,
        'options' => [],
        'value' => ''
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
        return view('components.form.radio');
    }
}
