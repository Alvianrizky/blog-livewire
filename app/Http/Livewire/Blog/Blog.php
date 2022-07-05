<?php

namespace App\Http\Livewire\Blog;

use App\Models\Post;
use App\Models\PostDetail;
use App\Models\PostTag;
use Carbon\Carbon;
use Livewire\Component;

class Blog extends Component
{
    public $blog;

    public function mount()
    {
        Carbon::setLocale('id');
    }

    public function render()
    {
        $blog = Post::all();

        $post = [];
        foreach($blog as $val) {
            $postDetail = PostDetail::where('posts_id', $val->id)->orderBy('order', 'ASC')->first();
            $postTag = PostTag::where('posts_id', $val->id)->get();

            $post[] = [
                'id' => $val->id,
                'title' => $val->title,
                'slug' => $val->slug,
                'date' => Carbon::parse($val->created_at)->isoFormat('dddd, D MMM Y'),
                'tanggal' => Carbon::parse($val->created_at)->isoFormat('Y-MM-DD'),
                'thumbnail' => $val->thumbnail,
                'meta_desc' => $val->meta_desc,
                'meta_keys' => $val->meta_keys,
                'post' => $postDetail,
                'tag' => $postTag
            ];
        }

        $this->blog = $post;

        return view('livewire.blog.blog');
    }

    public function detail($id)
    {
        $post = Post::find($id);
        $date = Carbon::parse($post->created_at)->isoFormat('Y-MM-DD');

        redirect()->route('detail.blog', ['date' => $date, 'slug' => $post->slug]);
    }
}
