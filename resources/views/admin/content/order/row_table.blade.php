@foreach($order as $item)
    <tr class="text-center intro-x">
        <td class="w-10">
            <input class="form-check-input checkbox-order-id" type="checkbox" name="order_id[]" value="{{$item->id}}">
        </td>
        <td>{{$item->id}}</td>
        <td>{{$item->created_at}}</td>
        <td>{{$item->user->name}}</td>
        <td>{{$item->paymentMethod->name}}</td>
        <td style="@if($item->status =='đã đặt hàng')
                        color: #0d6efd;
                    @elseif($item->status =='đang vận chuyển')
                         color: #ffc720;
                    @elseif($item->status =='giao hàng thành công'||$item->status =='đã thanh toán')
                        color: #00bb00;
                    @endif">
            <span class="text-xs">
                <i class="fa-solid fa-circle"></i>
            </span>
            {{$item->status}}
        </td>
        <td> {{ number_format($item->total_amount, 0, ',', '.') }}₫</td>
        <td class="table-report__action w-56">
            <div class="flex justify-center items-center">
                <a href="{{route('admin.order.detail',["id"=>$item->id])}}" data-theme="dark" class="tooltip" title="Chi tiết đơn hàng"><i class="fa-solid fa-circle-info"></i></a>
            </div>
        </td>

@endforeach
