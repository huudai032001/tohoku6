<?php
namespace App\Form;

use Illuminate\Http\Request;

class Textarea extends FormGroup
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
        return sprintf('<textarea class="form-control" rows="6" name="%s">%s</textarea>', 
            $this->name, 
            $this->value
        );
    }

    public function confirmMode()
    {
        $hidden = sprintf('<textarea style="display:none" name="%s">%s</textarea>', 
            $this->name, 
            $this->value
        );
        $show = $this->value;
        return $hidden . '<div class="text-content-preview-container">' . nl2br($show) . '</div>';
    }

    public function viewMode()
    {
        return '<div class="text-content-preview-container">' . nl2br($this->value) . '</div>';
    }
    
}