@if (method_exists($dataItem, 'link') && ($link = $dataItem->link()))
    <a href="{{ $link }}" class="btn btn-link btn-float text-body" target="_blank">
        <i class="icon-link2 text-primary"></i> <span>@trans('common.link')</span>
    </a>
@endif

@if ($controller->viewAble($dataItem))
    <a href="{{ route($routeBase . 'item-action', 
    ['id' => $dataItem->id, 'action' => 'view']) }}" class="btn btn-link btn-float text-body">
        <i class="icon-eye text-primary"></i> <span>@trans('common.view')</span>
    </a>
@endif

@if ($controller->editAble($dataItem))
    <a href="{{ route($routeBase . 'item-action', 
    ['id' => $dataItem->id, 'action' => 'edit']) }}" class="btn btn-link btn-float text-body">
        <i class="icon-pencil7 text-primary"></i> <span>@trans('common.edit')</span>
    </a>   
@endif 

@if (!empty($moreItemActions = $controller->moreItemActions($dataItem)))
    @foreach ($moreItemActions as $key => $arr)
    <a href="{{ route($routeBase . 'item-action', 
    ['id' => $dataItem->id, 'action' => $key]) }}" class="btn btn-link btn-float text-body">
        <i class="{{ $arr['icon'] ?? 'icon-pencil7' }} text-primary"></i> <span>{{ $arr['label'] }}</span>
    </a>
    @endforeach 
@endif    
