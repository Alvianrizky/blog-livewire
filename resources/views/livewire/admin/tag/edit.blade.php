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
                                    Edit Tag
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive p-3">
                                        {{-- <livewire:admin.tag.datatable /> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </x-admin-layout>
</div>
