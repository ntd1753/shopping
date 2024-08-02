<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{
    private function getPostCategories(){
        return Category::where('model_type','=', 'post')->where('parent_id','=',0)->with('subCategories')->get();
    }
    protected function fillDataToPost($item, $input, $is_create) : void
    {
        $item["name"] = $input["name"] ?? "";
        $item["slug"] = $input["slug"] ?? Str::slug($item["name"]);
        $item["description"] = $input["description"] ?? "";
        $item["content"] = $input["content"] ?? "";
        $item["seo_title"] = $input["seo_title"] ?? "";
        $item["seo_keywords"] = $input["seo_keywords"] ?? "";
        $item["seo_description"] = $input["seo_description"] ?? "";
        $item["category_id"] = $input["category_id"] ?? null;
        if ($is_create)
        {
            $item["views"] = 0;
            $item["rating_number"] = 0;
            $item["rating_value"] = 0;
        }
        $item->save();
    }
    protected function type($variable) {
        return is_object($variable) ? get_class($variable) : gettype($variable);
    }
    public function index(): Factory|View|Application
    {
        $group = 'post';
        return view('admin.content.post.index',[
            "posts" =>
                Post::orderBy('category_id', 'ASC')->whereHas('category', function ($query) use ($group) {
                    $query->where('model_type', $group);
                })->paginate(50)
        ]);

    }

    public function add(): Factory|View|Application
    {
        return view("admin.content.post.add",[
            "categories" => $this->getPostCategories(),
        ]);
    }
    protected function saveImageIntoPost($images, $post): void
    {
        if (is_array($images)){
            foreach ($images as $img)
            {
                $image = new Image();
                $image["model_type"] = $this->type($post);
                $image["model_id"] = $post->id;
                $image["path"] = $img;
                $image["name"] = $img;
                $image["alt"] = $img;
                $image->save();
            }

        }
        else{
            $image = new Image();
            $image["model_type"] = $this->type($post);
            $image["model_id"] = $post->id;
            $image["path"] = $images;
            $image["name"] = $images;
            $image["alt"] = $images;
            $image->save();
        }
    }
    public function store(Request $request): RedirectResponse
    {
        $request = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:items,slug',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'seo_title' => 'nullable|string|max:255',
            'seo_keywords' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string|max:255',
            'images' => 'required|string|max:255'
        ]);
        $input = $request->all();

        $item = new Post();
        $this->fillDataToPost($item, $input, true);
        $images = $input["images"] ?? [];
        $this->saveImageIntoPost($images, $item);
        return redirect()->route("admin.post.index");
    }

    public function edit($id): Factory|View|Application|RedirectResponse
    {
        $post = Post::find($id);
        if (!$post) return redirect()->back();
        return view("admin.content.post.edit",[
            "item" => $post,
            "categories" => $this->getPostCategories(),
        ]);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $post = Post::find($id);
        if (!$post) return redirect()->back();

        $input = $request->all();
        $this->fillDataToPost($post, $input, false);

        $post->deleteImages();
        $images = $input["images"] ?? [];
        $this->saveImageIntoPost($images, $post);

        return redirect()->route("admin.post.index");
    }

    public function destroy($id): RedirectResponse
    {
        $post = Post::find($id);
        if (!$post) return redirect()->back();
        $post->delete();
        return redirect()->route("admin.post.index");
    }
}
