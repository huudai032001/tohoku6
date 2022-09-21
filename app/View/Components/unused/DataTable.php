<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DataTable extends Component
{
    public $cData = [
        'table_class' => '',
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
        return view('components.data-table');
    }
}
