@foreach($orderItems as $item)
    <tr>
        <td class="!py-4">
            <div class="flex items-center">
                <div class="w-10 h-10 image-fit zoom-in">
                    <img alt="{{ $item->product->images[0]->path }}"
                    class="rounded-lg border-2 border-white shadow-md tooltip"
                    src="{{$item->product->images[0]->path}}"
                    title="{{$item->product->name}}">
                </div>
                <a href="#" class="font-medium whitespace-nowrap ml-4">{{$item->product->name}}</a>
            </div>
        </td>
        <td class="text-right">{{number_format($item->price,0,',','.')}}VNĐ</td>
        <td class="text-right">{{$item->quantity}}</td>
        <td class="text-right">{{number_format($item->price*$item->quantity,0,',','.')}}VNĐ</td>
    </tr>
@endforeach
