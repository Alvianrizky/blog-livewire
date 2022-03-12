<?php

namespace App\Http\Livewire\Admin\Tag;

use App\Models\Tag;
use Livewire\Component;

class Index extends Component
{
    public $page = 'tag';
    public $tags;

    public function render()
    {
        $this->tags = Tag::all();

        return view('livewire.admin.tag.index');
    }

    public function alert()
    {
        session()->flash('success', 'Data Berhasil Disimpan.');
        // session()->flash('info', 'Data Berhasil Disimpan.');
        // session()->flash('error', 'Data Berhasil Disimpan.');
    }
}
