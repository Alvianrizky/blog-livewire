<div>
    <x-admin-layout>
        <div class="row justify-content-center" style="margin-top: 100px !important;">
            <div class="col-sm-12 col-xl-10">
                <div class="container">

                    <div class="row">
                        <div class="col-6">
                            <h1>Tag</h1>
                        </div>
                        <div class="col-6">
                            <nav aria-label="breadcrumb mt-2">
                                <ol class="breadcrumb"
                                    style="background-color: #f8fafc !important; float: right !important;">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tag</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow-sm">
                                <div class="card-header bg-putih">
                                    Tambah Tag
                                </div>
                                <div class="card-body">

                                    <form>
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">Nama Tag</label>
                                            <input type="text" class="form-control" placeholder="nama tag" id="name_tag" name="name_tag" wire:model.defer="nameTag">
                                            @error('nameTag') <span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="mb-3">
                                            <a href="{{ route('tag.index') }}" class="btn btn-light text-left me-2">Kembali</a>
                                            <button type="button" class="btn bg-index text-light" wire:click.prevent="store">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </x-admin-layout>
</div>
