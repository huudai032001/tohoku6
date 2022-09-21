@extends('admin.data-management.base.layout')

@section('content')

<div class="mb-2">
    <form class="" action="" method="get">        
        
        <div class="row justify-content-between">
            <div class="col-12 col-md-8 mb-2 mb-md-0">
                <div class="row">
                    @if ($controller->searchAble())
                        <div class="col-md-auto">
                            @section('index-search')                        
                                <div>Search</div>
                                <input type="search" class="form-control" name="search" value="{{ request()->input('search') }}"
                                    placeholder="{{ __('Keyword') }}">
                            @show                            
                        </div>
                    @endif
                    @yield('index-filter')
                </div>
                
            </div>
            <div class="col-12 col-md-4 mb-2 mb-md-0">
                <div class="row align-items-center justify-content-end">                    
                    <div class="col-auto">                                           
                        @section('index-sort')                        
                            @include('admin.data-management.base.inc.index-sort', [
                                'options' => [
                                    'newest' => __('commom.newest'),
                                    'oldest' => __('common.oldest')
                                ]
                            ])
                        @show                        
                    </div>
                </div>
            </div>
        </div>
        
    </form>
</div>

<form id="data-management-bulk-action-form" action="{{ route($routeBase . 'bulk-action') }}" method="GET">
    
    @if (!$dataList->isEmpty())

        <div class="card">           
            <div class="table-responsive">
                <table class="data-table table table-striped">

                    <thead class="bg-secondary text-white">
                        <th data-column-name="id">
                            <label class="custom-checkbox mr-4" style="font-size: inherit;">
                                <input id="dataTableToggleSelectAllItems" type="checkbox" name="select_all"> <span class="checkmark"></span> <span>ID</span>
                            </label>                        
                        </th>
                        @foreach ($dataTable->getColumns() as $name => $column)
                            <th data-column-name="{{ $name }}">{{ $dataTable->getHeading($name) }}</th>
                        @endforeach
                        <th data-column-name="action">{{ __('common.action') }}</th>
                    </thead>

                    <tbody>
                        @foreach ($dataList as $dataItem)
                            <tr>
                                <td data-column-name="id">
                                    <label class="custom-checkbox">
                                        <input type="checkbox" name="ids[]" value="{{ $dataItem->id }}"><span class="checkmark"></span> <span>{{ $dataItem->id }}</span>
                                    </label>
                                </td>

                                @foreach ($dataTable->getColumns() as $name => $column)
                                    <td data-column-name="{{ $name }}">
                                        {!! $dataTable->getItemData($name, $dataItem) !!}
                                    </td>
                                @endforeach

                                <td data-column-name="action">                                
                                    <div class="list-icons flex-wrap">

                                        @if (method_exists($dataItem, 'link') && ($link = $dataItem->link()))
                                            <a href="{{ $link }}"
                                                class="list-icons-item text-primary" target="_blank">
                                                <i class="icon-link2"></i> 
                                                <span class="text">{{ __('Link') }}</span>
                                            </a>
                                        @endif

                                        @if ($controller->viewAble($dataItem))
                                            <a href="{{ route($routeBase . 'item-action', 
                                            ['id' => $dataItem->id, 'action' => 'view']) }}"
                                                class="list-icons-item text-primary">
                                                <i class="icon-eye"></i>
                                                <span class="text">@trans('common.view')</span>
                                            </a>
                                        @endif

                                        @if ($controller->editAble($dataItem))
                                            <a href="{{ route($routeBase . 'item-action', 
                                            ['id' => $dataItem->id, 'action' => 'edit']) }}"
                                                class="list-icons-item text-primary">
                                                <i class="icon-pencil7"></i>
                                                <span class="text">@trans('common.edit')</span>
                                            </a>
                                        @endif                                  
 

                                        @if (!empty($moreItemActions = $controller->moreItemActions($dataItem)))
                                            <div class="dropdown position-static cursor-pointer">
                                                <span  class="list-icons-item" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="icon-menu9"></i>
                                                </span>                                
                                                <div class="dropdown-menu dropdown-menu-right" style="">

                                                    @foreach ($moreItemActions as $key => $arr)
                                                        <a href="{{ route($routeBase . 'item-action', 
                                                        ['id' => $dataItem->id, 'action' => $key]) }}"
                                                            class="dropdown-item text-primary">
                                                            <i class="{{ $arr['icon'] ?? 'icon-pencil7' }}"></i> <span class="text">{{ $arr['label'] }}</span>
                                                        </a>
                                                    @endforeach                                            

                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

    @else
        <div class="alert alert-primary alert-styled-left alert-dismissible">
            {{ __('message.no_item_found') }}
        </div>
    @endif

    <div class="row flex-row-reverse">
        <div class="col-lg-6 ">
            @if (!$dataList->isEmpty())
            <div class="row align-items-center justify-content-end">                
                <div class="col-auto">
                    <select name="action" class="form-control d-inline-block" required>
                        <option value="">-- {{ __('common.action') }} --</option>

                        @foreach ($controller->moreBulkActions() as $key => $arr)
                            <option value="{{ $key }}">{{ $arr['label'] }}</option>
                        @endforeach

                        @if ($controller->deleteAble())
                            <option value="delete">{{ __('common.delete') }}</option>
                        @endif

                    </select>
                </div>                
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary" disabled>{{ __('common.apply') }}</button>
                </div>
            </div>
            @endif

        </div>
        <div class="col-lg-6">
            {!! $dataList->onEachSide(20)->links() !!}
        </div>        
    </div>
</form>


@endsection