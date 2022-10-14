@extends('admin.data-management.base.item-view')

@section('content')

@php
    $order = $dataItem;
    $customer = $order->user;    
@endphp

<div class="card">

    <div class="card-body">        
        <div class="row justify-content-between">

            <div class="col-auto mb-5">
                <h5 class="font-weight-semibold border-bottom text-info">{{ __('shopping.customer_info') }}</h5>
                @if ($customer)
                    <div>
                        <span class="text-muted mr-2">{{ __('user.name') }}:</span> 
                        <span class="font-weight-semibold">{{ $customer->getName() }}</span>
                    </div>
                    <div>
                        <span class="text-muted mr-2">{{ __('user.phone') }}:</span> 
                        <span class="font-weight-semibold">{{ $customer->phone }}</span>
                    </div>
                    <div>
                        <span class="text-muted mr-2">{{ __('user.address') }}:</span>
                        <span class="font-weight-semibold">{{ $customer->address }}</span>
                    </div>
                @endif
            </div>

            <div class="col-auto mb-5">
                <h5 class="font-weight-semibold border-bottom text-info">{{ __('shopping.shipping_info') }}</h5>
                {{ __('shopping.shipping_info_not_set') }}
            </div>

            <div class="col-auto mb-5">
                <h5 class="font-weight-semibold border-bottom text-info">{{ __('shopping.order_status') }}</h5>
                <div>
                    <span class="font-weight-semibold">{{ $order->getOrderStatus() }}</span>
                </div>                
            </div>

            <div class="col-auto mb-5">
                <h5 class="font-weight-semibold border-bottom text-info">{{ __('shopping.payment_status') }}</h5>
                
                <div>
                    <span class="text-muted mr-2">{{ __('common.status') }}:</span> 
                    <span class="font-weight-semibold">{{ $order->getPaymentStatus() }}</span>
                </div> 

                @if (($order->payment_status == 'paid') && $order->paid_at)
                <div>
                    <span class="text-muted mr-2">{{ __('common.time') }}:</span> 
                    <span class="font-weight-semibold">{{ $order->paid_at->format('Y-m-d H:i') }}</span>
                </div>
                <div>
                    <span class="text-muted mr-2">{{ __('shopping.payment_method') }}:</span> 
                    <span class="font-weight-semibold">{{ __('shopping.payment_method_label.'. $order->payment_method ) }}</span>
                </div>
                @endif

            </div>

            <div class="col-auto mb-5">
                <h5 class="font-weight-semibold border-bottom text-info">{{ __('shopping.shipping_status') }}</h5>

                <div>
                    <span class="text-muted mr-2">{{ __('common.status') }}:</span> 
                    <span class="font-weight-semibold">{{ $order->getShippingStatus() }}</span>
                </div> 

                @if (($order->shipping_status == 'delivered') && $order->delivered_at)
                <div>
                    <span class="text-muted mr-2">{{ __('common.time') }}:</span> 
                    <span class="font-weight-semibold">{{ $order->delivered_at->format('Y-m-d H:i') }}</span>
                </div>                                           
                @endif

            </div>

        </div>


        <div>
            
            <table class="data-table table">

                <thead class="bg-secondary text-white">
                    <tr>                    
                        <th data-column-name="">{{ __('product.name') }}</th>
                        <th>{{ __('product.sku') }}</th>
                        <th>{{ __('product.price') }}</th>
                        <th>{{ __('shopping.quantity') }}</th>
                        <th>{{ __('shopping.subtotal') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->items as $orderItem)
                        @php
                            $product = $orderItem->product;
                        @endphp
                        <tr>
                            <td>{{ $product ? $product->getName() : '' }}</td>
                            <td>{{ $product ? $product->sku : '' }}</td>
                            <td>{{ Helper::currency($orderItem->unit_cost) }}</td>
                            <td>{{ $orderItem->quantity }}</td>
                            <td>{{ Helper::currency($orderItem->cost) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="row justify-content-end mt-3">
                <div class="col-md-auto">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>{{ __('shopping.items_cost') }}:</th>
                                <td class="text-right">{{ Helper::currency($order->items_cost) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('shopping.tax') }}: <span class="font-weight-normal">(10%)</span></th>
                                <td class="text-right">{{ Helper::currency($order->tax) }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('shopping.total_cost') }}:</th>
                                <td class="text-right text-primary"><h5 class="font-weight-semibold mb-0">{{ Helper::currency($order->total_cost) }}</h5></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection