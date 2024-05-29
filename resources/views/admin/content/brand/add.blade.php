@extends("layouts.adminLayout")
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Add Brand
        </h2>
    </div>
    <form action="{{route('admin.brand.store')}}" method="POST">
        @csrf
    <div class="intro-y box p-5 mt-5">
        <div class="border border-slate-200/60 dark:border-darkmode-400 rounded-md p-5">
            <div class="font-medium text-base flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                     stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down"
                     class="lucide lucide-chevron-down w-4 h-4 mr-2">
                    <polyline points="6 9 12 15 18 9"></polyline>
                </svg>
                Brand Information
            </div>
            <div class="mt-5">
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Brand Name</div>
                                <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <input id="product-name" type="text" class="form-control" name="brand-name" placeholder="Product name">
                    </div>
                </div>
                <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                    <div class="form-label xl:w-64 xl:!mr-10">
                        <div class="text-left">
                            <div class="flex items-center">
                                <div class="font-medium">Description</div>
                                <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full mt-3 xl:mt-0 flex-1">
                        <textarea class="form-control" id="content" name="description"></textarea>

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
