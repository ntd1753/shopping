<div class="intro-y box p-5 mt-5 grid grid-cols-2 gap-4">
    <div>
        <div class="">
            <label for="reviewName" class="" >Tiêu đề bài viết:</label>
            <input type="text" class="form-control mt-2" id="reviewName" name="name" placeholder="Nhập tiêu đề bài viết ..."
                   value="@if(isset($post)) {{$post->name}} @endif">
        </div>

        <div class="mt-3">
            <label for="description">Slug bài viết:</label>
            <input type="text" class="form-control  mt-2" id="description" name="slug" placeholder="Nhập description....."
                   value="@if(isset($post)) {{$post->slug}} @endif">
        </div>
        <div class="mt-3">
            <label for="content">Mô tả:</label>
            <textarea class="form-control  mt-2" id="content" name="description" placeholder="Nhập nội dung ....." >
                @if(isset($post)) {!! $post->description !!} @endif
            </textarea>
        </div>
    </div>
    <div>
        <div class="">
            <label for="reviewName" class="">SEO title:</label>
            <input type="text" class="form-control mt-2" id="seo_title" name="seo_title" placeholder="Nhập tiêu đề bài viết ..."
            value="@if(isset($post)) {{$post->seo_title}} @endif">
        </div>
        <div class="mt-3">
            <label for="description">SEO keyword:</label>
            <input type="text" class="form-control  mt-2" id="seo_keyword" name="seo_keywords" placeholder="Nhập description....."
            value="@if(isset($post)) {{$post->seo_keywords}} @endif">
        </div>
        <div class="mt-3">
            <label for="content">SEO description:</label>
            {{--                    <input type="text" class="form-control  mt-2" id="content" name="content" placeholder="Nhập nội dung ....." >--}}
            <textarea class="form-control  mt-2" id="Seo" name="seo_description" placeholder="Nhập nội dung ....." >
                @if(isset($post)) {!! $post->seo_description !!} @endif
            </textarea>
        </div>
    </div>
</div>
<div class="intro-y box p-5 mt-5">
    <label for="content">Nội dung bài viết:</label>
    {{--                    <input type="text" class="form-control  mt-2" id="content" name="content" placeholder="Nhập nội dung ....." >--}}
    <textarea class="form-control  mt-2" id="content" name="content" placeholder="Nhập nội dung ....." >
        @if(isset($post)) {!! $post->content !!} @endif
    </textarea>
</div>
