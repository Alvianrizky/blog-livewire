<?php

namespace App\Http\Livewire\Admin\Post;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public $page = 'post';

    public function render()
    {
        return view('livewire.admin.post.index');
    }
}
