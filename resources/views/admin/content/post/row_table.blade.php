@foreach($posts as $item)

    <tr class="intro-x text-base">
        <td>
            <a href="" class="font-medium whitespace-nowrap">{{$item->name}}</a>
{{--            <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5">Tags: Mothercare, Gini &amp; Jony, H&amp;M, Babyhug, Liliput</div>--}}
        </td>
        <td>

                <a class="text-slate-500 flex items-center mr-3" href="javascript:;"> <img src="{!! $item->images->path !!}" class="h-32 w-30"> </a>

        </td>
        <td class="w-40">
            <div class="flex items-center justify-center">  {!! $item->description !!} </div>
        </td>
        <td class="table-report__action w-56">
            <div class="flex justify-center items-center text-xl">
                <a class="flex items-center mr-3" href="#" data-tw-toggle="modal" data-tw-target="#preview-post-{{$item->id}}-modal-size"><i class="fa-solid fa-newspaper"></i> </a>
                <a class="flex items-center mr-3" href="{{route('admin.post.edit',["id"=>$item->id])}}"> <i class="fa-solid fa-pen-to-square"></i> </a>
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
                        <a href="{{route('admin.post.destroy',['id' => $item->id])}}"><button type="button" class="btn btn-danger w-24">Delete</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
