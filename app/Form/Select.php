<?php
namespace App\Form;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class Select extends FormGroup
{
    public $options;
    public $empty_option;
    public $empty_option_label;

    public function __construct ($options)
    {
        parent::__construct($options);
        $this->options = $options['options'] ?? [];
        $this->empty_option = $options['empty_option'] ?? false;
        $this->empty_option_label = $options['empty_option_label'] ?? '';

        $session = request()->session();        
        $this->value = $session->hasOldInput() ? old($this->name) : $this->data;
    }

    public function showData()
    {
        return $this->data;
    }

    public function editMode()
    {
        $html = sprintf('<div class="form-inline"><select class="form-control" name="%s">', $this->name);
        if($this->empty_option) {
            $html .= '<option value="">' . $this->empty_option_label . '</option>';
        }
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
                '<option value="%s" %s>%s</option>', 
                $option_value, 
                $option_value == $this->value ? 'selected' : '',
                $option_label
            );
        }
        $html .= sprintf('</select></div>');
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