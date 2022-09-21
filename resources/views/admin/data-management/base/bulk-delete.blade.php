@extends('admin.data-management.base.layout')

@section('content')

<div class="mb-2">
    <a href="{{ session('routeReturnUrls.' . $routeBase . 'index') ?: route($routeBase . 'index') }}"
        class="btn btn-primary">{{ __('common.back') }} <i class="icon-arrow-left8 ml-2"></i>
    </a>
</div>

<div class="card">
    <div class="card-body">

        @if ($dataList->isNotEmpty())
            
            <form action="{{ route($routeBase . 'bulk-action-submit') }}" method="POST">
                @csrf
                <input type="hidden" name="action" value="{{ request()->input('action') }}">

                @php
                    $deleteAbleCount = 0;
                @endphp
                @foreach ($dataList as $dataItem)
                    <div class="my-1">
                        @if ($controller->deleteAble($dataItem))                            
                            <label class="custom-checkbox">
                                <input type="checkbox" name="ids[]" value="{{ $dataItem->id }}" checked><span class="checkmark"></span>
                                <span>(ID: {{ $dataItem->id }}) {{ $dataItem->getName() }}</span>
                            </label>
                            @php
                                $deleteAbleCount++;
                            @endphp
                        @else
                            <div class="text-warning">
                                {{ __('message.item_can_not_be_deleted', 
                                ['item' => sprintf(
                                    '[%s ID %s] "%s" ',
                                    $modelName,
                                    $dataItem->id,
                                    $dataItem->getName()
                                )])  }}
                            </div>
                        @endif
                    </div>
                @endforeach

                <div class="mt-3">
                    @if ($deleteAbleCount > 0)
                        <div class="alert alert-warning text-center">
                            <p class="mb-3">
                                <label class="custom-checkbox">
                                    <input type="checkbox" name="confirm" value="1" required><span class="checkmark"></span>
                                    <span>{{ __('message.item_delete_confirm', ['item' => $modelName]) }}</span>
                                    
                                </label>
                            </p> 
                            <div class="row justify-content-center">
                                <div class="col-auto">
                                    <button type="submit" class="btn btn-warning">{{ __('common.submit') }} <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </div>
                        </div>

                    @else
                        <div class="alert alert-info alert-styled-left alert-dismissible">
                            {{ __('message.bulk_action_item_list_empty') }}
                        </div>
                    @endif
                </div>

                
            </form>       
        @endif
    </div>
</div>
@endsection