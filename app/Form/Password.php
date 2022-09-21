<?php
namespace App\Form;

use Illuminate\Http\Request;
use App\Form\FormGroup;

use Illuminate\Support\Facades\Hash;

class Password extends FormGroup
{

    public function __construct ($options)
    {
        parent::__construct($options);

        $session = request()->session();
        $this->value = $session->hasOldInput() ? old($this->name) : '';
    }

    public function showData()
    {
        return '****************';
    }

    public function editMode()
    {
        return sprintf('<input type="password" class="form-control" name="%s" value="%s" autocomplete="off">', 
            $this->name, $this->value);
    }

    public function confirmMode()
    {
        return sprintf('<input type="hidden" name="%s" value="%s" autocomplete="off">', 
            $this->name, $this->value);
    }

    public function viewMode()
    {
        return '****************';
    }
}