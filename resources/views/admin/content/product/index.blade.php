@extends('layouts.adminLayout')
@section('content')
<h2 class="intro-y text-2xl font-medium mt-10">
    Quản lí sản phẩm
</h2>
@if (session('failures'))
    <div class="alert alert-danger">
        <ul>
            @foreach (session('failures') as $failure)
                <li>{{ $failure->row() }}: {{ implode(', ', $failure->errors()) }}</li>
            @endforeach
        </ul>
    </div>
@endif



<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a href="{{route('admin.product.add')}}"><button class="btn btn-primary shadow-md mr-2">Thêm sản phẩm</button></a>
        <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">

            <form action="{{route('admin.product.import.exel')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" id="exel-file-input" class="form-control hidden">
                <button id="import-exel-btn" type="button" class="btn btn-primary shadow-md mr-2"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Import file Excel </button>
            </form>
            <a href="{{route('admin.product.export.exel')}}">
                <button class="btn btn-primary shadow-md mr-2"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </button>
            </a>
        </div>
        <div class="hidden md:block mx-auto text-slate-500"></div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-slate-500">
                <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
            </div>
        </div>
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
            <tr class="text-center text-base ">
                <th class="whitespace-nowrap">Tên sản phẩm</th>
                <th class="whitespace-nowrap">Preview image</th>
                <th class="whitespace-nowrap">Thương Hiệu</th>
                <th class="text-center whitespace-nowrap">Danh mục sản phẩm</th>
                <th class="text-center whitespace-nowrap">Giá</th>
                <th class="text-center whitespace-nowrap">Hành động</th>
            </tr>
            </thead>
            <tbody>
            @include("admin.content.product.row_table",["products"=>$products])

            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->

    <!-- END: Pagination -->
</div>
<!-- BEGIN: Delete Confirmation Modal -->
{{ $products->links('vendor.pagination.tailwind') }}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const importButton = document.getElementById('import-exel-btn');
        const fileInput = document.getElementById('exel-file-input');
        const form = fileInput.closest('form');

        importButton.addEventListener('click', function() {
            fileInput.click();
        });

        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                form.submit();
            }
        });
    });
</script>
@endsection
