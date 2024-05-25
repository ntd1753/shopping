@extends("layouts.adminLayout")
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Add Category
        </h2>
    </div>
    <form action="{{route('admin.category.store',$model_type)}}" method="POST">
        @csrf
    <div class="intro-y box p-5 mt-5">
        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
            <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down"
                     class="lucide lucide-chevron-down w-4 h-4 mr-2">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
                Category Information
            </div>
            <div class="mt-5">
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Category Name</div>
                                <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="name" type="text" class="form-control" name="name" placeholder="Product name">
                    </div>
                </div>
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Category Parent</div>
                                <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <select id="category" class="form-select" name="parent_id">
                            <option value="0" selected>Không có danh mục cha</option>
                            @foreach($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Link Icon</div>
                                <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1 relative">
                        <input type="text" name="file_path"  class="form-control" id="image_label">
                        <div class="w-1/5 absolute top-0 right-0">
                            <button class="btn btn-secondary" type="button" id="button-image" aria-label="Image" aria-describedby="button-image">Chọn file</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
        <button type="submit" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Save &amp; Add New Product</button>
        <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Save</button>
    </div></form>

@endsection
