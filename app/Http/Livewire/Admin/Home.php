<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;

class Home extends Component
{
    public $page = 'dashboard';
    public $post, $tag;

    public function render()
    {
        $this->post = Post::count();
        $this->tag = Tag::count();
        return view('livewire.admin.home');
    }


}
