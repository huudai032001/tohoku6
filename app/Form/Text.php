<?php
namespace App\Form;

use Illuminate\Http\Request;

class Text extends FormGroup
{
    public $type;
    public $inline = false;

    public function __construct ($options = [])
    {
        parent::__construct($options);        
        $this->type = $options['type'] ?? 'text';
        $this->inline = $options['inline'] ?? '';
        $session = request()->session();
        $this->value = $session->hasOldInput() ? old($this->name) : $this->data;
    }
   
    public function editMode()
    {
        return sprintf('<input type="%s" class="form-control %s" name="%s" value="%s">', 
            $this->type,
            $this->inline ? 'form-control-inline' : '',
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
        $show = $this->value;
        return $hidden . $show;
    }

    public function viewMode()
    {
        return $this->value;
    }
    
}