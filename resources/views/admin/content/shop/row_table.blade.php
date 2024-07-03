@foreach($shops as $item)
    <tr class="text-center">
        <td>{{$item->name}}</td>
        <td><img src="{{$item->image_path}}" class="w-20 h-44 mx-auto"></td>
        <td>{{$item->phone}}</td>
        <td>{{$item->address}}</td>
        <td class="text-[##136ebf] text-center"><a href="{{$item->link}}" class="text-base text-primary"><i class="mx-auto" data-lucide="map-pin"></i></a></td>
        <td>
            <div class="flex justify-center items-center text-xl">
                <a class="flex items-center mr-3" href="{{route('admin.shop.edit',["id"=>$item->id])}}"> <i class="fa-solid fa-pen-to-square"></i> </a>
                <a class="flex items-center text-danger" href="#" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal-{{$item->id}}"> <i class="fa-solid fa-trash"></i> </a>
            </div>
        </td>
    </tr>
    <div id="delete-confirmation-modal-{{$item->id}}" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-slate-500 mt-2">
                            Do you really want to delete these records?
                            <br>
                            This process cannot be undone.
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <a href="{{route('admin.shop.destroy',['id' => $item->id])}}"><button type="button" class="btn btn-danger w-24">Delete</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endforeach
