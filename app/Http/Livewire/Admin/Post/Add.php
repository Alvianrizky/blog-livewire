<?php

namespace App\Http\Livewire\Admin\Post;

use Livewire\Component;

class Add extends Component
{
    public $page = 'post';

    public function render()
    {
        return view('livewire.admin.post.add')->layout('layouts.admin');
    }
}
