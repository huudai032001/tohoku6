<?php
namespace App\Form;

use Illuminate\Http\Request;

class Currency extends FormGroup
{

    public $inline = false;

    public function __construct ($options = [])
    {
        parent::__construct($options); 
        $this->inline = $options['inline'] ?? '';
        $session = request()->session();
        $this->value = $session->hasOldInput() ? old($this->name) : $this->data;
    }
   
    public function editMode()
    {
        return sprintf(
        '<div class="input-group  %s">
            <span class="input-group-prepend">
                <span class="input-group-text">¥</span>
            </span>
            <input type="number" class="form-control form-control-number" name="%s" value="%s">
        </div>'
        , 
            $this->inline ? 'd-inline-flex w-auto' : '',
            $this->name, 
            $this->value
        );
    }

    public function confirmMode()
    {
        $hidden = sprintf('<input type="hidden" name="%s" value="%s">', 
            $this->name, 
            $this->value
        );
        $show = \Helper::currency($this->value);
        return $hidden . $show;
    }

    public function viewMode()
    {
        return \Helper::currency($this->value);
    }
    
}