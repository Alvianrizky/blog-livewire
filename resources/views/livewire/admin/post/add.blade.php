<div>
    @push('styles')
    <style>
        #autoresizing {
            display: block;
            overflow: hidden;
            resize: none;
        }

        input[type=file]::-webkit-file-upload-button,
        input[type=file]::file-selector-button {
            margin-inline-start: -12px;
            margin-inline-end: 1rem;
            background-color: #0078ff;
            border: none;
            color: white;
            margin-top: -10px;
            padding: 0.5rem;
        }
    </style>
    @endpush

    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

            var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
                removeItemButton: true,
            });


        });
    </script>
    @endpush
    <div class="row justify-content-center" style="margin-top: 100px !important;">
        <div class="col-sm-12 col-xl-10">

            <div class="container">

                <div class="row">
                    <div class="col-6">
                        <h1>Postingan</h1>
                    </div>
                    <div class="col-6">
                        <nav aria-label="breadcrumb mt-2">
                            <ol class="breadcrumb"
                                style="background-color: #f8fafc !important; float: right !important;">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Postingan</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <form enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Judul Postingan</label>
                                <input type="text" class="form-control" placeholder="judul postingan" wire:model.defer="title">
                                @error('title') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tag Postingan</label>
                                <div class="row">
                                    <div class="col-11">
                                        <div wire:ignore>
                                            <select class="col-12" id="select" name="tagId" multiple wire:model.defer="tagId">
                                                @foreach ($tags as $item)
                                                <option value="{{$item->id}}">{{$item->name_tag}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-1">
                                        <button type="button" class="btn bg-index text-light">Tambah</button>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tambah Tag</label>
                                <div class="row">
                                    <div class="col-auto">
                                        <input type="text" class="form-control" placeholder="tag baru">
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn bg-index text-light">Tambah</button>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Meta Deskripsi</label>
                                <textarea id="autoresizing" class="form-control" placeholder="Ketik text disini" maxlength="200" wire:model.defer="metaDesc"></textarea>
                                @error('metaDesc') <span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Foto Thumbnail</label>
                                <input class="form-control" onchange="readURL(this);" accept="image/*" type="file" wire:model.defer="foto">
                                <img id="blah" src="" class="img-thumbnail mx-auto d-block" style="height: 200px !important; border: none; display: none !important;" alt="">
                            </div>

                            <div class="container mb-3 border p-3" style="min-height: 350px;">
                                <h1 class="mb-4">Content</h1>

                                <div class="row">

                                    @if ($input)
                                        @foreach ($input as $key => $val)
                                            @include('livewire.admin.components.deskripsi')
                                        @endforeach
                                    @endif

                                </div>



                            </div>

                            <div class="mb-3">
                                <a href="{{ route('tag.index') }}" class="btn btn-light text-left me-2">Kembali</a>
                                <button type="button" class="btn bg-index text-light" wire:click.prevent="store">Simpan</button>
                            </div>

                        </div>
                    </div>
                </form>

                <div class="row justify-content-center">
                    <div class="col-3">
                        <nav class="fixed-bottom my-5" style="width: 450px; margin: 0 auto;">
                            <div class="card shadow-sm">
                                <div class="card-body" style="vertical-align: middle;">
                                    {{-- text image video heading sound --}}
                                    <div class="text-center" style="display: flex;">
                                        <div style="width: 20%;">
                                            <a class="btn add_deskripsi" wire:click.prevent="add('Text')"><i class="fas fa-font fa-2x"></i><br>Text</a>
                                        </div>
                                        <div style="width: 20%;">
                                            <a class="btn add_heading" wire:click.prevent="add('Heading')"><i class="fas fa-heading fa-2x"></i><br>Heading</a>
                                        </div>
                                        <div style="width: 20%;">
                                            <a class="btn add_link" wire:click.prevent="add('Link')"><i class="fas fa-link fa-2x"></i><br>Link</a>
                                        </div>
                                        <div style="width: 20%;">
                                            <a class="btn add_image" wire:click.prevent="add('Image')"><i class="fas fa-image fa-2x"></i><br>Image</a>
                                        </div>
                                        <div style="width: 20%;">
                                            <a class="btn add_video" wire:click.prevent="add('Video')"><i class="fab fa-youtube fa-2x"></i><br>Video</a>
                                        </div>
                                        <div style="width: 20%;">
                                            <a class="btn add_audio" wire:click.prevent="add('List')"><i class="fas fa-list fa-2x"></i><br>List</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>










            </div>

        </div>
    </div>
</div>
