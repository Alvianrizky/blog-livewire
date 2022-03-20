<div>
    @push('styles')

    @endpush
    <style>
        #autoresizing {
            display: block;
            overflow: hidden;
            resize: none;
        }

        input[type=file]::-webkit-file-upload-button,
        input[type=file]::file-selector-button {
            /* @apply text-white bg-gray-700 hover:bg-gray-600 font-medium text-sm cursor-pointer border-0 py-2.5 pl-8 pr-4; */
            margin-inline-start: -12px;
            margin-inline-end: 1rem;
            background-color: #0078ff;
            border: none;
            color: white;
            margin-top: -10px;
            padding: 0.5rem;
        }
    </style>
    @push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $(".add").click(function () {
                var html = $(".copy").html();
                $(".after").before(html);
            });

            $(".add_deskripsi").click(function () {
                var html = $(".copy_deskripsi").html();
                $(".content").before(html);
            });

            $(".add_image").click(function () {
                var html = $(".copy_image").html();
                $(".content").before(html);
            });

            $(".add_video").click(function () {
                var html = $(".copy_video").html();
                $(".content").before(html);
            });

            $(".add_heading").click(function () {
                var html = $(".copy_heading").html();
                $(".content").before(html);
            });

            $(".add_link").click(function () {
                var html = $(".copy_link").html();
                $(".content").before(html);
            });

            $(".add_audio").click(function () {
                var html = $(".copy_audio").html();
                $(".content").before(html);
            });

            $("body").on("click", ".remove", function () {
                $(this).parents(".controll").remove();
            });



            // $('#autoresizing').on('input', function () {
            //     this.style.height = 'auto';

            //     this.style.height =
            //             (this.scrollHeight) + 'px';
            // });

            // document.getElementById("deskripsi").addEventListener("keyup", myFunction);

            // function myFunction() {
            //     console.log('cek');
            //     this.style.height = 'auto';

            //     this.style.height = (this.scrollHeight) + 'px';
            // }

        });

        // function readURL(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();

        //         reader.onload = function (e) {
        //             $('#blah').attr('src', e.target.result);
        //             document.getElementById('blah').style.display = 'block';
        //         };

        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }



    </script>
    @endpush
    <div class="row justify-content-center" style="margin-top: 100px !important;">
        <div class="col-sm-12 col-xl-10">

            <div class="container">

                <div class="row">
                    <div class="col-6">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-6">
                        <nav aria-label="breadcrumb mt-2">
                            <ol class="breadcrumb"
                                style="background-color: #f8fafc !important; float: right !important;">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <form>
                    @csrf
                    <div class="row">
                        <div class="col-12">

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Judul Postingan</label>
                                <input type="text" class="form-control" placeholder="judul postingan" wire:model.defer="title">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Tag Postingan</label>
                                <select class="col-12" multiple="true" wire:model.defer="tag">
                                    <option value="1">Excellent</option>
                                    <option value="2">Very Good</option>
                                    <option value="3">Good</option>
                                    <option value="4">Not Bad</option>
                                    <option value="5">Bad</option>
                                    <option value="6">Very Bad</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tambah Tag</label>
                                <div class="row">
                                    <div class="col-auto">
                                        <input type="text" class="form-control" placeholder="tag baru">
                                    </div>
                                    <div class="col-auto">
                                        <button type="button" class="btn bg-index text-light">Tambah</button>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Foto Thumbnail</label>
                                <input class="form-control" onchange="readURL(this);" type="file">
                                <img id="blah" src="" class="img-thumbnail mx-auto d-block" style="height: 200px !important; border: none; display: none !important;" alt="">
                            </div>

                            <div class="container mb-3 border p-3" style="min-height: 350px;">
                                <h1 class="mb-4">Content</h1>

                                <div class="row content">
                                </div>

                                @include('livewire.admin.components.deskripsi')

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
                                            <a class="btn add_deskripsi"><i class="fas fa-font fa-2x"></i><br>Text</a>
                                        </div>
                                        <div style="width: 20%;">
                                            <a class="btn add_heading"><i class="fas fa-heading fa-2x"></i><br>Heading</a>
                                        </div>
                                        <div style="width: 20%;">
                                            <a class="btn add_link"><i class="fas fa-link fa-2x"></i><br>Link</a>
                                        </div>
                                        <div style="width: 20%;">
                                            <a class="btn add_image"><i class="fas fa-image fa-2x"></i><br>Image</a>
                                        </div>
                                        <div style="width: 20%;">
                                            <a class="btn add_video"><i class="fab fa-youtube fa-2x"></i><br>Video</a>
                                        </div>
                                        <div style="width: 20%;">
                                            <a class="btn add_audio"><i class="fas fa-music fa-2x"></i><br>Sound</a>
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
