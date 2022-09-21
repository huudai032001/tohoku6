<?php
namespace App\Form;

use Illuminate\Http\Request;


abstract class FormGroup
{
    public $name; 
    public $data;    
    public $label;
    public $required;
    public $form;

    public function __construct ($options = [])
    {
        $this->name = $options['name'] ?? '';
        $this->label = $options['label'] ?? '';
        $this->data = $options['data'] ?? '';
        $this->required = $options['required'] ?? false;
    }
    

    public function editMode()
    {
        
    }

    public function confirmMode()
    {

    }

    public function viewMode()
    {

    }    

    public function errorMsg($errors)
    {          
        $html = '';
        if($errors){
            foreach ($errors->get($this->name) as $error) {
                $html .= sprintf('<div class="form-group-error-msg text-danger">%s</div>', $error);
            }
        }   
        return $html;
    }

}