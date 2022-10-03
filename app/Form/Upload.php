<?php
namespace App\Form;

use Illuminate\Http\Request;

class Upload extends FormGroup
{
    public $fileType;
    public $multiple;
    public $max;

    public function __construct ($options = [])
    {
        parent::__construct($options);        
        $this->fileType = $options['file_type'] ?? null;
        $session = request()->session();
        $this->value = $session->hasOldInput() ? old($this->name) : $this->data;
        $this->multiple = $options['multiple'] ?? false;
        $this->max = $options['max'] ?? null;
    }
   
    public function editMode()
    {
        $inputName = $this->multiple ? $this->name.'[]' : $this->name;
        $itemsData = [];

        if (!$this->multiple && is_array($this->value) && !empty($this->value)) {
            $this->value = $this->value[0];
        }

        if ($this->value) {
            $items = \App\Models\Upload::whereIn('id', \Arr::wrap($this->value))->get();
            foreach ($items as $item) {
                $itemsData[] = $item->getJsData();
            }
        }
        // $preloadHtml = '<div class="mb-2"><i class="icon-spinner2 spinner mr-2"></i> Loading images ...</div>';
        // foreach ($items as $item) {
        //     $preloadHtml .= sprintf('<input type="hidden" name="%s" value="%s">', 
        //         $inputName,
        //         $item->id
        //     );
        // }
        
        return sprintf('
        <form-control-upload input-name="%s" file-type="%s" :multiple="%s" max="%s" :initial-items=\'%s\' @add-upload="openUploadSelect">
        </form-control-upload>
        ', 
            $inputName,
            $this->fileType, 
            $this->multiple ? 'true' : 'false',
            $this->max,
            json_encode($itemsData, JSON_UNESCAPED_SLASHES)            
        );
    }

    public function confirmMode()
    {
        return $this->showImages('confirm');
    }

    public function viewMode()
    {
        return $this->showImages('view');
    }
    
    protected function showImages($mode = 'view') {       

        $items = \App\Models\Upload::whereIn('id', \Arr::wrap($this->value))->get();

        $itemsHtml = '';
        foreach($items as $item) {
            if ($mode = 'confirm') {
                $hiddenInput = sprintf('<input type="hidden" name="%s" value="%s">', 
                    $this->name, 
                    $item->id
                );
            } else {
                $hiddenInput = '';
            }
            
            $itemsHtml .= sprintf(
                '<div class="file-item">
                    <div class="card file-item-panel">
                        <div class="card-img-actions m-1">
                            <div
                                class="file-item-image-holder embed-responsive embed-responsive-1by1 d-flex align-items-center justify-content-center">
                                <img class="file-item-image card-img embed-responsive-item"
                                    src="%s">
                            </div>
                        </div>                        
                    </div>
                    %s
                </div>'
                ,
                $item->getUrl(),
                $hiddenInput
            );
        }

        $html = sprintf('
            <div class="form-control-upload" data-multiple="false">
                <div class="items-wrap">
                    %s
                </div>            
            </div>',
            $itemsHtml
        );
        return $html;
    }
}