@extends('layouts.adminLayout')
@section('content')
    <div class="intro-y flex items-center mt-8 text-base">
        <h2 class="text-lg font-medium mr-auto">
            Thêm sản phẩm
        </h2>
    </div>
    <form action="{{route('admin.product.store')}}" method="POST" class="text-base">
        @csrf
        <div class="intro-y box p-5 mt-5">
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down"
                         class="lucide lucide-chevron-down w-4 h-4 mr-2"><polyline points="6 9 12 15 18 9"></polyline>
                    </svg> Thông tin sản phẩm </div>
                <div class="mt-5">
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Tên sản phẩm</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input id="product-name" name="product-name" type="text" class="form-control" placeholder="Product name">
                        </div>
                    </div>
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Danh mục sản phẩm</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <select id="category" class="form-select" name="category-id">
                                @foreach($categories as $item)
                                    <option value="{{ $item->id }}">{{$item->name}}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Nhà Cung cấp</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <select id="category" class="form-select" name="brand-id">
                                @foreach($brands as $item)
                                    <option value="{{ $item->id }}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-6 mt-5 pt-5">
                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label xl:w-64 xl:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Barcode</div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <input id="barcode" type="text" class="form-control" name="barcode" placeholder="Product name">
                            </div>
                        </div>
                        <div class="form-inline items-start flex-col xl:flex-row first:mt-0 first:pt-0">
                            <div class="form-label xl:w-64 xl:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Giá</div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <input id="price" type="number" class="form-control" name="price" placeholder="Giá sản phẩm">
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-6 mt-5 pt-5">
                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                            <div class="form-label xl:w-64 xl:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Số Lượng</div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <input id="barcode" type="text" class="form-control" name="quantity" placeholder="Số lượng">
                            </div>
                        </div>
                        <div class="form-inline items-start flex-col xl:flex-row  first:mt-0 first:pt-0">
                            <div class="form-label xl:w-64 xl:!mr-10">
                                <div class="text-left">
                                    <div class="flex items-center">
                                        <div class="font-medium">Phần trăm giảm giá</div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full mt-3 xl:mt-0 flex-1">
                                <input id="price" type="number" class="form-control" name="discount_persent" placeholder="Giảm giá ...%">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="intro-y box p-5 mt-5 grid grid-cols-2 gap-4">

                </div>
            </div>
        </div>
        <div class="intro-y box p-5 mt-5">
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                         -width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down"
                         class="lucide lucide-chevron-down w-4 h-4 mr-2"><polyline points="6 9 12 15 18 9"></polyline>
                    </svg> Chi tiết sản phẩm </div>
                <div class="mt-5">
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Mô tả sản phẩm</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <textarea id="content" name="product-description"></textarea>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="intro-y box p-5">
            <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
                <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down"
                         data-lucide="chevron-down" class="lucide lucide-chevron-down
                         w-4 h-4 mr-2"><polyline points="6 9 12 15 18 9"></polyline>
                    </svg> Ảnh preview </div>
                <div class="mt-5">
                    <div class="form-inline items-start flex-col xl:flex-row mt-10">
                        <div class="form-label w-full xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Thêm Ảnh</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full  xl:mt-0 grid grid-cols-2 gap 4">
                            <div>
                                <div class="relative">
                                    <input type="text" name="image[]"  class="form-control" id="image_label-0">
                                    <div class="w-1/5 absolute top-0 right-0">
                                        <button class="btn btn-secondary"  type="button" id="button-image-0" aria-label="Image" aria-describedby="button-image" onclick="addImage(0)">Chọn file</button>
                                    </div>
                                </div>
                                <div class="relative mt-3">
                                    <input type="text" name="image[]"  class="form-control" id="image_label-1">
                                    <div class="w-1/5 absolute top-0 right-0">
                                        <button class="btn btn-secondary"  type="button" id="button-image-1" aria-label="Image" aria-describedby="button-image" onclick="addImage(1)">Chọn file</button>
                                    </div>
                                </div>
                                <div class="relative mt-3">
                                    <input type="text" name="image[]"  class="form-control" id="image_label-2">
                                    <div class="w-1/5 absolute top-0 right-0">
                                        <button class="btn btn-secondary"  type="button" id="button-image-2" aria-label="Image" aria-describedby="button-image" onclick="addImage(2)">Chọn file</button>
                                    </div>
                                </div>
                            </div>

                            <div class="flex">
                                <div>
                                    <img src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg"
                                         id="img_preview-0" class="ml-5 h-24 w-24">
                                </div>
                                <div>
                                    <img src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg"
                                         id="img_preview-1" class="ml-5 h-24 w-24">
                                </div>
                                <div>
                                    <img src="https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg"
                                         id="img_preview-2" class="ml-5 h-24 w-24">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="intro-y flex items-center mt-8">
            <h2 class="text-lg font-medium mr-auto">
                Thêm bài viết
            </h2>
        </div>

        @include('component.Post.formAddPost',['post'=>null])

        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Lưu</button>
        </div>
        </form>
    <script>
        var inputId="";
        function addImage(id) {
            console.log(id);
            inputId=id;
            window.open('/file-manager/fm-button', 'fm', 'width=1400,height=800');
            console.log(inputId);
        }


    </script>

@endsection
