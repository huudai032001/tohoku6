<?php
namespace App\Form;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class Radio extends FormGroup
{
    public $options;
    public $inline = false;

    public function __construct ($options)
    {
        parent::__construct($options);
        $this->options = $options['options'] ?? [];
        $this->inline = $options['inline'] ?? '';

        $session = request()->session();        
        $this->value = $session->hasOldInput() ? old($this->name) : $this->data;
    }

    public function showData()
    {
        return $this->data;
    }

    public function editMode()
    {
        $html = '';
        $isAssoc = Arr::isAssoc($this->options);
        foreach($this->options as $key => $value) {
            if ($isAssoc) {
                $option_value = $key;
                $option_label = $value;
            } else {
                $option_value = $value;
                $option_label = $value;
            }
            
            $html .= sprintf(
                '<label class="custom-control custom-checkbox mb-2 mr-4 %s">
                    <input  type="radio" name="%s" value="%s" %s class="custom-control-input">
                    <span class="custom-control-label">%s</span>
                </label>', 
                $this->inline ? 'd-inline-block' : '',
                $this->name,
                $option_value, 
                $option_value == $this->value ? 'checked' : '',
                $option_label
            );
        }
        return $html;
    }

    public function confirmMode()
    {
        $hidden = sprintf('<input type="hidden" name="%s" value="%s">', 
            $this->name, 
            $this->value
        );
        $show = $this->getOptionLabel($this->value);        
        return $hidden . $show;
    }

    public function viewMode()
    {        
        return $this->getOptionLabel($this->value);
    }

    protected function getOptionLabel($value) 
    {
        $isAssoc = Arr::isAssoc($this->options);
        if ($isAssoc) {
            return $this->options[$value] ?? '';
        } else {
            return $value;    
        }        
    }
}