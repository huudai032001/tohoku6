<?php
namespace App\Form;

use Illuminate\Http\Request;
use Carbon\Carbon;

class Date extends Text
{

    public function __construct ($options = [])
    {
        parent::__construct($options);        
        $session = request()->session();
        $this->value = $session->hasOldInput() ? old($this->name) : $this->data;
        if($this->value && is_string($this->value)) {
            $this->value = new Carbon($this->value);
        }
    }

    public function editMode()
    {
        return sprintf('<input type="date" class="form-control form-control-inline" name="%s" value="%s">', 
            $this->name, 
            empty($this->value) ? '' : $this->value->format('Y-m-d')
        );
    }

    public function confirmMode()
    {
        $hidden = sprintf('<input type="hidden" name="%s" value="%s">', 
            $this->name, 
            empty($this->value) ? '' : $this->value->format('Y-m-d')
        );
        $show = $this->value;
        return $hidden . $show;
    }

    public function viewMode()
    {
        return  empty($this->value) ? '' : $this->value->format('Y-m-d');
    }
    
}