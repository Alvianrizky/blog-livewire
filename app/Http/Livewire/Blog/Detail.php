<?php

namespace App\Http\Livewire\Blog;

use App\Models\Post;
use App\Models\PostDetail;
use App\Models\PostTag;
use Carbon\Carbon;
use Livewire\Component;

class Detail extends Component
{
    public $post, $postDetail, $postTag;

    public function mount($date, $slug)
    {
        Carbon::setLocale('id');

        $post = Post::where('slug', $slug)->first();

        $this->post = [
            'title' => $post->title,
            'thumbnail' => $post->thumbnail,
            'meta_desc' => $post->meta_desc,
            'meta_keys' => $post->meta_keys,
            'date' => Carbon::parse($post->created_at)->isoFormat('dddd, D MMM Y')
        ];


        $this->postTag = PostTag::where('posts_id', $post->id)->get();
        $this->postDetail = PostDetail::where('posts_id', $post->id)->orderBy('order', 'ASC')->get();
    }

    public function render()
    {
        return view('livewire.blog.detail');
    }
}
