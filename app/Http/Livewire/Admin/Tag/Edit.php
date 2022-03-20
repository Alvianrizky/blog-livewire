<?php

namespace App\Http\Livewire\Admin\Tag;

use Livewire\Component;

class Edit extends Component
{
    public $getId;

    public function mount($id)
    {
        $this->getId = $id;
    }

    public function render()
    {
        return view('livewire.admin.tag.edit');
    }
}
