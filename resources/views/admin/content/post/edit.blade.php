@extends('layouts.adminLayout')
@section('content')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Add Category
        </h2>
    </div>
    <form action="{{route('admin.post.update',$item->id)}}" method="POST">
        @csrf
        <div class="intro-y box p-5 mt-5">
            <div class=" p-5">
                <div class="grid grid-cols-2 gap-4">
                    <div class="mt-5">
                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Post Category</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <select id="category" class="form-select" name="category_id">
                                @foreach($categories as $category)
                                    #@if($item->category_id===$category->id)
                                        <option value="{{$category->id}}" selected>{{$category->name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                        <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Link Preview Image</div>
                                    <div class="ml-2 px-2 py-0.5 bg-slate-200 text-slate-600 dark:bg-darkmode-300 dark:text-slate-400 text-xs rounded-md">Required</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1 relative">

                                <input type="text" name="images"  class="form-control" id="image_label" value="{{$item->images->path}}">

                            <div class="w-1/5 absolute top-0 right-0">
                                <button class="btn btn-secondary"  type="button" id="button-image" aria-label="Image" aria-describedby="button-image">Chọn file</button>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="mt-5 ">
                        <div class="ml-5 font-medium w-full">
                            Preview Image
                        </div>
                        <div >

                            <img src="@if($item->images->path) {{$item->images->path}} @else https://t4.ftcdn.net/jpg/04/73/25/49/360_F_473254957_bxG9yf4ly7OBO5I0O5KABlN930GwaMQz.jpg  @endif" id="img_preview" class="ml-5 mt-5 h-24 w-24">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="intro-y box p-5 mt-5 grid grid-cols-2 gap-4">
            <div>
                <div class="">
                    <label for="reviewName" class="">Tiêu đề bài viết:</label>
                    <input type="text" class="form-control mt-2" id="reviewName" name="name" value="{{$item->name}}" placeholder="Nhập tiêu đề bài viết ...">
                </div>

                <div class="mt-3">
                    <label for="description">Slug bài viết:</label>
                    <input type="text" class="form-control  mt-2" id="description" value="{{$item->slug}}" name="slug" placeholder="Nhập description....." >
                </div>
                <div class="mt-3">
                    <label for="content">Mô tả:</label>
                    <textarea class="form-control  mt-2" id="content" value="{{$item->description}}" name="description" placeholder="Nhập nội dung ....." >{!! $item->description !!}</textarea>
                </div>
            </div>
            <div>
                <div class="">
                    <label for="reviewName" class="">SEO title:</label>
                    <input type="text" class="form-control mt-2" id="seo_title" value="{{$item->seo_title}}" name="seo_title" placeholder="Nhập tiêu đề bài viết ...">
                </div>
                <div class="mt-3">
                    <label for="description">SEO keyword:</label>
                    <input type="text" class="form-control  mt-2" id="seo_keyword" value="{{$item->seo_keywords}}" name="seo_keywords" placeholder="Nhập description....." >
                </div>
                <div class="mt-3">
                    <label for="content">SEO description:</label>
                    {{--                    <input type="text" class="form-control  mt-2" id="content" name="content" placeholder="Nhập nội dung ....." >--}}
                    <textarea class="form-control  mt-2" id="Seo" name="seo_description"  placeholder="Nhập nội dung ....." >{!! $item->seo_description !!}</textarea>
                </div>
            </div>
        </div>
        <div class="intro-y box p-5 mt-5">
            <label for="content">Nội dung bài viết:</label>
            {{--                    <input type="text" class="form-control  mt-2" id="content" name="content" placeholder="Nhập nội dung ....." >--}}
            <textarea class="form-control  mt-2" id="content" name="content" placeholder="Nhập nội dung ....." >{!! $item->content !!}</textarea>
        </div>
        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Save</button>
            </div>
        </form>
<script>
    var inputId='';
</script>
@endsection
