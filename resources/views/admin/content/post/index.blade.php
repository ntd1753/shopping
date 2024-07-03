@extends('layouts.adminLayout')
@section('content')
    <h2 class="intro-y text-lg font-medium mt-10">
        Post
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{route('admin.post.add')}}"><button class="btn btn-primary shadow-md mr-2">Add New Post</button></a>
            <div class="dropdown">
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
                <tr>
                    <th class="whitespace-nowrap">Tiêu đề bài viết</th>
                    <th class="whitespace-nowrap">Preview image</th>
                    <th class="text-center whitespace-nowrap">Description</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
                </thead>
                <tbody>
                @include("admin.content.post.row_table",["posts"=>$posts])

                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        @foreach($posts as $item)
            <div id="preview-post-{{$item->id}}-modal-size" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        {!! $item->content !!}
                    </div>
                </div>
            </div>

        @endforeach
        <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->

    <script>

    </script>
@endsection
