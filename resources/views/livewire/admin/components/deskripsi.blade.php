@if ($val['type'] == 'Text')
<div class="col-11">
    <div class="mb-4">
        <label class="form-label">Deskripsi</label>
        <textarea class="form-control" placeholder="Ketik text disini" style="min-height: 300px;" wire:model.defer="deskripsi.{{$key}}.Teks"></textarea>
    </div>
</div>
<div class="col-1" style="padding-top: 30px;">
    <button class="btn btn-danger text-light remove" wire:click.prevent="remove({{$key}})"><i class="fas fa-trash"></i></button>
</div>
@endif


@if ($val['type'] == 'Image')
<div class="col-11">
    <div class="mb-4">
        <label class="form-label">Upload Image</label>
        <input class="form-control" type="file" accept="image/*" wire:model.defer="deskripsi.{{$key}}.Image">
    </div>
</div>
<div class="col-1" style="padding-top: 30px;">
    <button class="btn btn-danger text-light remove" wire:click.prevent="remove({{$key}})"><i class="fas fa-trash"></i></button>
</div>
@endif



@if ($val['type'] == 'Audio')
<div class="col-11">
    <div class="mb-4">
        <label class="form-label">Upload Audio</label>
        <input class="form-control" type="file" accept="audio/mpeg" wire:model.defer="deskripsi.{{$key}}.Audio">
    </div>
</div>
<div class="col-1" style="padding-top: 30px;">
    <button class="btn btn-danger text-light remove" wire:click.prevent="remove({{$key}})"><i class="fas fa-trash"></i></button>
</div>
@endif



@if ($val['type'] == 'Video')
<div class="col-11">
    <div class="mb-4">
        <label class="form-label">Link Video</label>
        <input type="text" class="form-control" placeholder="link video youtube" wire:model.defer="deskripsi.{{$key}}.Video">
    </div>
</div>
<div class="col-1" style="padding-top: 30px;">
    <button class="btn btn-danger text-light remove" wire:click.prevent="remove({{$key}})"><i class="fas fa-trash"></i></button>
</div>
@endif



@if ($val['type'] == 'Heading')
<div class="col-11">
    <div class="mb-4">
        <label class="form-label">Heading Text</label>
        <input type="text" class="form-control" placeholder="text heading"
            wire:model.defer="deskripsi.{{$key}}.Heading">
    </div>
</div>
<div class="col-1" style="padding-top: 30px;">
    <button class="btn btn-danger text-light remove" wire:click.prevent="remove({{$key}})"><i class="fas fa-trash"></i></button>
</div>
@endif



@if ($val['type'] == 'Link')
<div class="col-11">
    <div class="mb-4">
        <label class="form-label">HyperLink</label>
        <input type="text" class="form-control mb-2" placeholder="name link" wire:model.defer="deskripsi.{{$key}}.Link.name">
        <input type="url" class="form-control" placeholder="link example = http://www.example.com" wire:model.defer="deskripsi.{{$key}}.Link.link">
    </div>
</div>
<div class="col-1" style="padding-top: 30px;">
    <button class="btn btn-danger text-light remove" wire:click.prevent="remove({{$key}})"><i class="fas fa-trash"></i></button>
</div>
@endif




