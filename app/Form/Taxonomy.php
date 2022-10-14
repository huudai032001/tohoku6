<?php
namespace App\Form;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class Taxonomy extends FormGroup
{
    public $modelClass;
    public $hierachy;
    public $limit;
    public $depth;
    public $exclude;
    public $selectedTerms;
    public $inputName;

    public function __construct ($options)
    {
        parent::__construct($options);
        $this->modelClass = $options['model'] ?? false;
        $this->hierachy = $this->modelClass::isHierachy();
        $this->limit = $options['limit'] ?? 100;
        $this->depth = $options['depth'] ?? null;
        $this->exclude = $options['exclude'] ?? null;    
        $this->inputName = $this->name . '[]';
        
        $session = request()->session();
        $this->selectedTerms = $session->hasOldInput() ? old($this->name) : $this->data;

        if(is_array($this->selectedTerms)) {
            $this->selectedTerms =  $this->modelClass::find($this->selectedTerms);
        }        
    }

    public function editMode()
    {   
        $json =  $this->selectedTerms ? $this->selectedTerms->map(function ($item)
        {
            return [
                'id' => $item->id,
                'name' => $item->getName()
            ];
        })->toJson() : '';
        
        $html = sprintf('<form-control-taxonomy input-name="%s" hierachy="%s" model-class="%s" :initial-selected-terms=\'%s\'></form-control-taxonomy>', 
            $this->inputName,
            $this->hierachy ? 'true' : 'false',
            $this->modelClass,
            $json
        );

        return $html;
    }
    
   
    public function confirmMode()
    {
        $hidden = '';
        foreach ($this->selectedTerms as $term) {
            $hidden .= sprintf('<input type="hidden" name="%s" value="%s">', 
                $this->inputName, 
                $term->id
            );
        }
        
        $show = $this->showSelectedTermsName();        
        return $hidden . $show;
    }

    public function viewMode()
    {        
        return $this->showSelectedTermsName();
    }

    protected function showSelectedTermsName() 
    {
        if ($this->selectedTerms) {
            return $this->selectedTerms->getRightMostChildren()->pluck('name')->join(', ');
        }
        // if ($item) {
        //     return $item->getName();
        // }
    }
}