<div>
    <div class="container">
        <div class="row" style="margin-top: 100px !important;">
            <div class="col-sm-12">
                <div class="title-box text-center">
                    {{-- <h3 class="title-a">
                        Blog
                    </h3>
                    <p class="subtitle-a">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    </p>
                    <div class="line-mf"></div> --}}
                </div>
            </div>
        </div>

        <div class="row justify-content-start">
            <div class="row justify-content-start col-xl-10">
                <div class="row col-sm-12 col-md-12 col-lg-12 d-flex justify-content-start">

                    <div class="mb-3">
                        <hr style="border: 3px solid #0078ff !important; border-radius: 5px;">
                        <h2>News Update</h2>
                    </div>


                    @if ($blog)
                        @foreach ($blog as $val)

                        <div class="col-12 col-md-6 mb-4">
                            <div class="card-blogs m-2">
                                <a wire:click="detail('{{ $val['id'] }}')" style="text-decoration: none; color: black;">
                                    <div class="card-blogs-image">
                                        @if ($val['thumbnail'])
                                            <img src="{{ asset("storage/$val[thumbnail]") }}" alt="Gambar Thumbnail">
                                        @else
                                            <img src="{{ asset('img/default-post.png') }}" alt="Gambar Thumbnail">
                                        @endif
                                    </div>
                                    <div class="mt-3">
                                        <p class="text-muted">{{ $val['date'] }}</p>
                                    </div>
                                    <div class="text-blog">
                                        <h4 class="fw-bolder">{{ $val['title'] }}</h4>
                                        <p class="text-justify">{{ $val['post']->contents }}</p>
                                    </div>
                                    <div class="my-3 fs-7">

                                        @foreach ($val['tag'] as $item)
                                        <span class="border rounded p-2" style="line-height:3.4;">{{ $item->tag->name_tag }}</span>
                                        @endforeach

                                    </div>
                                </a>
                            </div>
                        </div>

                        @endforeach
                    @else

                    @endif



                    {{-- <div class="card-blogs m-2">
                        <div class="card-blogs-image">
                            <img src="{{ asset('img/default-post.png') }}" alt="gambar">
                        </div>
                        <div class="mt-3">
                            <p class="text-muted">15 Februari 2022</p>
                        </div>
                        <div class="text-blog">
                            <h3 class="fw-bolder">Judul Artikel Panjang Apa Aja</h3>
                            <p class="text-justify fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                        </div>
                        <div class="my-3 fs-7">
                            <span class="border rounded p-2" style="line-height:3.4;">Website</span>
                            <span class="border rounded p-2" style="line-height:3.4;">Teknologi</span>
                            <span class="border rounded p-2" style="line-height:3.4;">Tutorial</span>
                        </div>
                    </div> --}}


                </div>
                {{-- <div class="col-4 d-none d-sm-none d-md-none d-lg-block">
                    <h4>Tags</h4>
                    <div class="my-3">
                        <span class="border rounded p-2 mr-2" style="line-height:3.4;">Website</span>
                        <span class="border rounded p-2 mr-2" style="line-height:3.4;">Teknologi</span>
                        <span class="border rounded p-2 mr-2" style="line-height:3.4;">Tutorial</span>
                        <span class="border rounded p-2 mr-2" style="line-height:3.4;">Anime</span>
                        <span class="border rounded p-2 mr-2" style="line-height:3.4;">Belajar</span>
                        <span class="border rounded p-2 mr-2" style="line-height:3.4;">Tips dan Trik</span>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
