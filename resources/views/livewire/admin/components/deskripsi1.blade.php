<div class="copy_deskripsi" style="display: none;">
    <div class="controll">
        <div class="row">
            <div class="col-11">
                <div class="mb-4">
                    <label class="form-label">Deskripsi</label>
                    <textarea id="deskripsi" class="form-control" placeholder="Ketik text disini" style="min-height: 300px;" wire:model.defer="deskripsi.teks"></textarea>
                </div>
            </div>
            <div class="col-1" style="padding-top: 30px;">
                <button class="btn btn-danger text-light remove"><i class="fas fa-trash"></i></button>
            </div>
        </div>
    </div>
</div>


<div class="copy_image" style="display: none;">
    <div class="controll">
        <div class="row">
            <div class="col-11">
                <div class="mb-4">
                    <label class="form-label">Upload Image</label>
                    <input class="form-control" type="file" accept="image/*" wire:model.defer="deskripsi.image">
                </div>
            </div>
            <div class="col-1" style="padding-top: 30px;">
                <button class="btn btn-danger text-light remove"><i class="fas fa-trash"></i></button>
            </div>
        </div>
    </div>
</div>


<div class="copy_video" style="display: none;">
    <div class="controll">
        <div class="row">
            <div class="col-11">
                <div class="mb-4">
                    <label class="form-label">Link Video</label>
                    <input type="text" class="form-control" placeholder="link video youtube" wire:model.defer="deskripsi.video">
                </div>
            </div>
            <div class="col-1" style="padding-top: 30px;">
                <button class="btn btn-danger text-light remove"><i class="fas fa-trash"></i></button>
            </div>
        </div>
    </div>
</div>


<div class="copy_heading" style="display: none;">
    <div class="controll">
        <div class="row">
            <div class="col-11">
                <div class="mb-4">
                    <label class="form-label">Heading Text</label>
                    <input type="text" class="form-control" placeholder="text heading" wire:model.defer="deskripsi.heading">
                </div>
            </div>
            <div class="col-1" style="padding-top: 30px;">
                <button class="btn btn-danger text-light remove"><i class="fas fa-trash"></i></button>
            </div>
        </div>
    </div>
</div>

<div class="copy_link" style="display: none;">
    <div class="controll">
        <div class="row">
            <div class="col-11">
                <div class="mb-4">
                    <label class="form-label">HyperLink</label>
                    <input type="text" class="form-control mb-2" placeholder="name link">
                    <input type="url" class="form-control" placeholder="link example = http://www.example.com" wire:model.defer="deskripsi.link">
                </div>
            </div>
            <div class="col-1" style="padding-top: 30px;">
                <button class="btn btn-danger text-light remove"><i class="fas fa-trash"></i></button>
            </div>
        </div>
    </div>
</div>


<div class="copy_audio" style="display: none;">
    <div class="controll">
        <div class="row">
            <div class="col-11">
                <div class="mb-4">
                    <label class="form-label">Upload Audio</label>
                    <input class="form-control" type="file" accept="audio/*" wire:model.defer="deskripsi.audio">
                </div>
            </div>
            <div class="col-1" style="padding-top: 30px;">
                <button class="btn btn-danger text-light remove"><i class="fas fa-trash"></i></button>
            </div>
        </div>
    </div>
</div>
