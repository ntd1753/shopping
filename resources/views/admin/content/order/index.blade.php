@extends('layouts.adminLayout')
@section('content')
    <form method="POST" action="{{route('admin.order.status.change')}}" id="status-form">
        @csrf
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
                    <button type="button" class="btn  @if(isset($query['status'])) btn-outline-secondary @else btn-success   @endif   mr-1 mb-2">Tất cả</button>
                    </a>
                </div>
                <div class="ml-2">
                    <a href="{{route('admin.order.index',['status'=>'da dat hang'])}}">
                    <button type="button"  class="btn   @if(isset($query['status']) && $query['status'] == 'da dat hang') btn-success @else btn-outline-secondary @endif  mr-1 mb-2">Đã đặt hàng</button>
                    </a>
                </div>
                <div class="ml-2">
                    <a href="{{route('admin.order.index',['status'=>'dang giao hang'])}}">
                    <button type="button" class="btn @if(isset($query['status']) && $query['status'] == 'dang giao hang') btn-success @else  btn-outline-secondary @endif  mr-1 mb-2">Đang giao hàng</button>
                    </a>
                </div>
                <div class="ml-2">
                    <a href="{{route('admin.order.index',['status'=>'giao hang thanh cong'])}}">
                        <button type="button" class="btn  @if(isset($query['status']) && $query['status'] == 'giao hang thanh cong') btn-success @else  btn-outline-secondary @endif mr-1 mb-2">Đã Giao hàng</button>
                    </a>
                </div>
            </div>
            <div class="hidden xl:block mx-auto text-slate-500"></div>
            <div class="w-full xl:w-auto flex items-center mt-3 xl:mt-0">
                <div class="dropdown">
                    <button class="dropdown-toggle btn px-2 box" type="button" aria-expanded="false" data-tw-toggle="dropdown">
                        <span class=" flex items-center justify-center"> <i data-lucide="arrow-left-right" class="w-4 h-4 mr-2"></i> Thay đổi trạng thái </span>
                    </button>
                    <div class="dropdown-menu w-40">
                        <ul class="dropdown-content">
                            <li>
                                <a href="#" class="status-change dropdown-item" data-value="đang vận chuyển">Đang vận chuyển </a>

                            </li>
                            <li>
                                <a href="#" class="status-change dropdown-item" data-value="giao hàng thành công">Giao Hàng Thành công</a>

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
                        <input id="select-all" class="form-check-input" type="checkbox">
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
        {{ $order->links('vendor.pagination.tailwind') }}
        <!-- END: Pagination -->
    </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dropdownItems = document.querySelectorAll('.dropdown-content .status-change');

            dropdownItems.forEach(function (item) {
                item.addEventListener('click', function (event) {
                    event.preventDefault();

                    // Lấy giá trị từ data-value của thẻ a
                    const value = item.getAttribute('data-value');

                    // Tìm input radio có value tương ứng và chọn nó
                    const radio = document.createElement('input');
                    radio.type = 'hidden';
                    radio.name = 'status';
                    radio.value = value;
                    document.getElementById('status-form').appendChild(radio);
                    // Gửi form
                    document.getElementById('status-form').submit();
                });
            });
            const selectAll = document.getElementById('select-all');
            selectAll.addEventListener('change', function () {
                const checkBoxOrderId = document.getElementsByClassName('checkbox-order-id');
                Array.from(checkBoxOrderId).forEach(function (item) {
                    item.checked = selectAll.checked;
                });
            });
        });
    </script>
@endsection
