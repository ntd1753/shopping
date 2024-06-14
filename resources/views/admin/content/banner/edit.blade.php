@extends("layouts.adminLayout")
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Sửa thông tin Banner
        </h2>
    </div>
    <form action="{{route('admin.banner.store')}}" method="POST">
        @csrf
        <div class="intro-y box p-5 mt-5">
            <div class="border border-slate-200/60 text-base  rounded-md p-5">
                <div class="font-medium  flex items-center border-b border-slate-200/60  pb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down"
                         class="lucide lucide-chevron-down w-4 h-4 mr-2">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                    Thông tin Banner
                </div>
                <div class="mt-5">
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Tiêu đề banner</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="product-name" type="text" class="form-control" name="name" value="{{$item->title}}">
                        </div>
                    </div>
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Banner</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <div class="">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="">
                                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                                            <div class="w-full mt-3 xl:mt-0 flex-1 relative">
                                                <input type="text" name="images"  class="form-control" id="image_label" value="{{$item->image_path}}">
                                                <div class="w-1/5 absolute top-0 right-0">
                                                    <button class="btn btn-secondary"  type="button" id="button-image" aria-label="Image" aria-describedby="button-image">Chọn file</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex">
                                        <div class="ml-5 font-medium">
                                            Preview Image
                                        </div>
                                        <div >
                                            <img src="{{$item->image_path}}" id="img_preview" class="ml-5  h-24 w-48">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Link</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="product-name" type="text" class="form-control" name="link" value="{{$item->link}}">
                        </div>
                    </div>
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Trạng thái</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <select class="tom-select w-full form-control" name="status">
                                <option class="form-control" value="{{$item->status}}" selected>
                                    @if($item->status=='active')
                                        Hiển Thị
                                    @else
                                        Không hiển thị
                                    @endif
                                </option>
                                <option class="form-control" value="@if($item->status=='active') inactive @else active @endif">
                                    @if($item->status=='active')
                                        Không hiển thị
                                    @else
                                        Hiển Thị
                                    @endif
                                </option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Lưu</button>
        </div></form>
    <script>
        var inputId='';
    </script>
@endsection
