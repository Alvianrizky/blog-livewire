<?php

namespace App\Http\Livewire\Admin\Tag;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Add extends Component
{
    public $page = 'tag';
    public $nameTag;

    protected $rules = [
        'nameTag' => 'required|unique:tags,name_tag',
    ];

    public function render()
    {
        return view('livewire.admin.tag.add');
    }

    public function store()
    {
        $this->validate();

        $data = [
            'name_tag' => $this->nameTag,
        ];

        DB::beginTransaction();
        try {

            Tag::create($data);

            DB::commit();
            session()->flash('success', 'Data Berhasil Disimpan.');
            return redirect()->route('tag.index');
        } catch (\Exception $e) {
            dd($e);
            DB::rollback();
            session()->flash('error', 'Gagal tambah data !');
        }
    }
}
