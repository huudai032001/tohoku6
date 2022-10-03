<?php
namespace App\Form;

use Illuminate\Http\Request;

class NameSeiMei extends FormGroup
{
    public $type;
    protected $sei;
    protected $mei;
    protected $sei_kana;
    protected $mei_kana;

    public function __construct ($options = [])
    {
        parent::__construct($options);        
        $this->type = $options['type'] ?? 'text';

        $session = request()->session();
        $this->value = $session->hasOldInput() ? old($this->name) : $this->data;
        $this->sei = $this->value['sei'];
        $this->mei = $this->value['mei'];
        $this->sei_kana = $this->value['sei_kana'];
        $this->mei_kana = $this->value['mei_kana'];
    }
   
    public function editMode()
    {
        $group_sei = sprintf('<span>%s</span><input type="text" class="form-control" name="%s[sei]" value="%s">',
            __('user.sei'),
            $this->name, 
            $this->sei
        );
        $group_mei = sprintf('<span>%s</span><input type="text" class="form-control" name="%s[mei]" value="%s">',
            __('user.mei'),
            $this->name, 
            $this->mei
        );
        $group_sei_kana = sprintf('<span>%s</span><input type="text" class="form-control" name="%s[sei_kana]" value="%s">',
            __('user.sei_kana'),
            $this->name, 
            $this->sei_kana
        );
        $group_mei_kana = sprintf('<span>%s</span><input type="text" class="form-control" name="%s[mei_kana]" value="%s">',
            __('user.mei_kana'),
            $this->name, 
            $this->mei_kana
        );
        
        return sprintf('
            <div class="row">
                <div class="col-6 col-sm-3 mb-2">%s</div>
                <div class="col-6 col-sm-3 mb-2">%s</div>
                <div class="col-6 col-sm-3 mb-2">%s</div>
                <div class="col-6 col-sm-3 mb-2">%s</div>
            </div>', 
            $group_sei,
            $group_mei, 
            $group_sei_kana,
            $group_mei_kana
        );
    }

    public function confirmMode()
    {
        $group_sei = sprintf('<input type="hidden" class="form-control" name="%s[sei]" value="%s">',
            $this->name, 
            $this->sei
        );
        $group_mei = sprintf('<input type="hidden" class="form-control" name="%s[mei]" value="%s">',
            $this->name, 
            $this->mei
        );
        $group_sei_kana = sprintf('<input type="hidden" class="form-control" name="%s[sei_kana]" value="%s">',
            $this->name, 
            $this->sei_kana
        );
        $group_mei_kana = sprintf('<input type="hidden" class="form-control" name="%s[mei_kana]" value="%s">',
            $this->name, 
            $this->mei_kana
        );

        $hidden = $group_sei . $group_mei . $group_sei_kana . $group_mei_kana;
        $show = $this->sei . ' ' . $this->mei;
        if ($this->sei_kana || $this->mei_kana) {
            $show .= '(' . $this->sei_kana . $this->mei_kana .')';
        }
        return $hidden . $show;
    }

    public function viewMode()
    {
        $show = $this->sei . ' ' . $this->mei;
        if ($this->sei_kana || $this->mei_kana) {
            $show .= '<span class="ml-2">(' . $this->sei_kana . $this->mei_kana .')</span>';
        }
        return $show;
    }
    
}