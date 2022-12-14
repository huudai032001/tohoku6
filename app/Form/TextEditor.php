<?php
namespace App\Form;

use Illuminate\Http\Request;

class TextEditor extends FormGroup
{
    public $type;

    public function __construct ($options = [])
    {
        parent::__construct($options);        
        $this->type = $options['type'] ?? 'text';

        $session = request()->session();
        $this->value = $session->hasOldInput() ? old($this->name) : $this->data;
    }
   
    public function editMode()
    {
        return sprintf('<text-editor @add-upload="openUploadSelect"><textarea name="%s">%s</textarea></text-editor>', 
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
        return $hidden . '<div class="text-content-preview-container">' . $show . '</div>';
    }

    public function viewMode()
    {
        return '<div class="text-content-preview-container">' . $this->value . '</div>';
    }
    
}