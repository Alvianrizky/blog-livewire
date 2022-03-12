<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class Datatable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('No', 'id')
                ->sortable()
                ->searchable(),
            Column::make('Nama tag', 'name_tag')
                ->sortable()
                ->searchable(),
            Column::make('Aksi', 'id')
                ->format(function ($value) {
                return view('livewire.admin.components.action')->with('data', $value);
            }),
        ];
    }

    public function query(): Builder
    {
        return Post::query();
    }
}
