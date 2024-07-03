@extends('layouts.adminLayout')
@section('content')
    <h2 class="intro-y text-2xl font-medium mt-10">
        Đơn hàng
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap xl:flex-nowrap items-center mt-2">
            <div class="flex w-full sm:w-auto">
                <div class="w-48 relative text-slate-500 text-base text-center my-auto">
                    Trạng thái:
                </div>
                <div class="ml-2">
                    <a href="{{route('admin.order.index')}}">
                    <button class="btn  @if(isset($query['status'])) btn-outline-secondary @else btn-success   @endif   mr-1 mb-2">Tất cả</button>
                    </a>
                </div>
                <div class="ml-2">
                    <a href="{{route('admin.order.index',['status'=>'da dat hang'])}}">
                    <button class="btn   @if(isset($query['status']) && $query['status'] == 'da dat hang') btn-success @else btn-outline-secondary @endif  mr-1 mb-2">Đã đặt hàng</button>
                    </a>
                </div>
                <div class="ml-2">
                    <a href="{{route('admin.order.index',['status'=>'dang giao hang'])}}">
                    <button class="btn @if(isset($query['status']) && $query['status'] == 'dang giao hang') btn-success @else  btn-outline-secondary @endif  mr-1 mb-2">Đang giao hàng</button>
                    </a>
                </div>
                <div class="ml-2">
                    <a href="{{route('admin.order.index',['status'=>'giao hang thanh cong'])}}">
                        <button class="btn  @if(isset($query['status']) && $query['status'] == 'giao hang thanh cong') btn-success @else  btn-outline-secondary @endif mr-1 mb-2">Đã Giao hàng</button>
                    </a>
                </div>
            </div>
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                <button class="btn btn-primary shadow-md mr-2"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </button>
                <button class="btn btn-primary shadow-md mr-2"> <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </button>
                <div class="dropdown">
                    <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-lucide="plus"></i> </span>
                    </button>
                    <div class="dropdown-menu w-40">
                        <ul class="dropdown-content">
                            <li>
                                <a href="" class="dropdown-item"> <i data-lucide="arrow-left-right" class="w-4 h-4 mr-2"></i> Change Status </a>
                            </li>
                            <li>
                                <a href="" class="dropdown-item"> <i data-lucide="bookmark" class="w-4 h-4 mr-2"></i> Bookmark </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto 2xl:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                <tr class="text-center">
                    <th class="whitespace-nowrap">
                        <input class="form-check-input" type="checkbox">
                    </th>
                    <th class="whitespace-nowrap">Id</th>
                    <th class="whitespace-nowrap">Ngày tạo</th>
                    <th class="whitespace-nowrap">Khách hàng</th>
                    <th class="whitespace-nowrap">Loại thanh toán</th>
                    <th class="text-center whitespace-nowrap">STATUS</th>
                    <th class="text-right whitespace-nowrap">
                        <div class="pr-16">Tổng</div>
                    </th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                @include('admin.content.order.row_table',['order'=>$order])
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <!-- END: Pagination -->
    </div>
@endsection
