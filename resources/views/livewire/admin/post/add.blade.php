<div>
    <style>
        .bg-putih {
            background-color: #fff !important;
        }

        .btn:hover {
            background-color: #fff !important;
            color: #0078ff !important;
        }
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

            $('#autoresizing').on('input', function () {
                this.style.height = 'auto';

                this.style.height =
                        (this.scrollHeight) + 'px';
            });

            document.getElementById("deskripsi").addEventListener("keyup", myFunction);

            function myFunction() {
                console.log('cek');
                this.style.height = 'auto';

                this.style.height = (this.scrollHeight) + 'px';
            }

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                    document.getElementById('blah').style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }



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

                <div class="row">
                    <div class="col-12">

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Judul Postingan</label>
                            <input type="text" class="form-control" placeholder="judul postingan">
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tag Postingan</label>
                            <select class="col-12" multiple="true">
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
                                    <button type="button" class="btn btn-primary">Tambah</button>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Foto Thumbnail</label>
                            <input class="form-control" onchange="readURL(this);" type="file">
                            <img id="blah" src="" class="img-thumbnail mx-auto d-block" style="height: 200px !important; border: none; display: none !important;" alt="">
                        </div>

                        <div class="container mb-3 border p-3" style="min-height: 350px; margin-bottom: 200px !important;">
                            <h1 class="mb-4">Content</h1>

                            <div class="row content">

                                {{-- <div class="col-11">
                                    <div class="mb-4">
                                        <label class="form-label">Deskripsi</label>
                                        <textarea id="autoresizing" class="form-control" placeholder="Ketik text disini" style="min-height: 200px;"></textarea>
                                    </div>
                                </div>
                                <div class="col-1" style="padding-top: 30px;">
                                    <button class="btn btn-danger remove"><i class="fas fa-trash"></i></button>
                                </div> --}}
                            </div>

                        </div>


                        <div class="mb-3">
                            <div class="after">

                                {{-- <div class="col-span-4">
                                    <input id="video" name="video[]" type="text" autocomplete="video"
                                        class="form-control"
                                        placeholder="input full link youtube">
                                </div>
                                <div class="w-11">
                                    <button type="button" class="btn btn-primary add" aria-label="Delete">
                                        <svg class="ml-1 w-5 h-5" aria-hidden="true" focusable="false" viewBox="0 0 448 512">
                                            <path fill="currentColor"
                                                d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z">
                                            </path>
                                        </svg>
                                    </button>
                                </div> --}}

                            </div>

                            <div class="copy" style="display: none;">
                                <div class="controll">
                                    <div class="col-span-4">
                                        <input id="video" name="video[]" type="text" autocomplete="video" class="form-control" placeholder="input full link youtube">
                                    </div>
                                    <div class="w-11">
                                        <button type="button" class="btn btn-danger remove" aria-label="Delete">
                                            <svg class="ml-1 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

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





                <div class="copy_deskripsi" style="display: none;">
                    <div class="controll">
                        <div class="row">
                            <div class="col-11">
                                <div class="mb-4">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea id="deskripsi" class="form-control" placeholder="Ketik text disini" style="min-height: 300px;"></textarea>
                                </div>
                            </div>
                            <div class="col-1" style="padding-top: 30px;">
                                <button class="btn btn-danger remove"><i class="fas fa-trash"></i></button>
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
                                    <input class="form-control" type="file" accept="image/*">
                                </div>
                            </div>
                            <div class="col-1" style="padding-top: 30px;">
                                <button class="btn btn-danger remove"><i class="fas fa-trash"></i></button>
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
                                    <input type="text" class="form-control" placeholder="link video youtube">
                                </div>
                            </div>
                            <div class="col-1" style="padding-top: 30px;">
                                <button class="btn btn-danger remove"><i class="fas fa-trash"></i></button>
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
                                    <input type="text" class="form-control" placeholder="text heading">
                                </div>
                            </div>
                            <div class="col-1" style="padding-top: 30px;">
                                <button class="btn btn-danger remove"><i class="fas fa-trash"></i></button>
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
                                    <input type="url" class="form-control" placeholder="link example = http://www.example.com">
                                </div>
                            </div>
                            <div class="col-1" style="padding-top: 30px;">
                                <button class="btn btn-danger remove"><i class="fas fa-trash"></i></button>
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
                                    <input class="form-control" type="file" accept="audio/*">
                                </div>
                            </div>
                            <div class="col-1" style="padding-top: 30px;">
                                <button class="btn btn-danger remove"><i class="fas fa-trash"></i></button>
                            </div>
                        </div>
                    </div>
                </div>





















            </div>

        </div>
    </div>
</div>
