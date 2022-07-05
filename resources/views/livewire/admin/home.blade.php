<div>
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
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 row">

                        <div class="col-auto mx-2 bg-primary text-light rounded p-4" style="width: 300px;">
                            <div class="row">
                                <div class="col-6">
                                    <h1 class="text-light"><strong>{{$post}}</strong></h1>
                                    <p class="ml-1"><strong>Postingan</strong></p>
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-file fa-5x float-right" style="color: white; opacity:0.4;"></i>
                                </div>
                                <div class="col-12 text-center mt-2">
                                    <a href="{{ route('post.index') }}" class="text-light">More Info <i class="fas fa-arrow-right ml-2"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-auto mx-2 bg-success text-light rounded p-4" style="width: 300px;">
                            <div class="row">
                                <div class="col-6">
                                    <h1 class="text-light"><strong>{{$tag}}</strong></h1>
                                    <p class="ml-1"><strong>Tags</strong></p>
                                </div>
                                <div class="col-6">
                                    <i class="fas fa-tag fa-5x float-right" style="color: white; opacity:0.4;"></i>
                                </div>
                                <div class="col-12 text-center mt-2">
                                    <a href="{{ route('tag.index') }}" class="text-light">More Info <i class="fas fa-arrow-right ml-2"></i></a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
