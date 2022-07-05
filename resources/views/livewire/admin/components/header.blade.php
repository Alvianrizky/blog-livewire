<nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav" style="background-color: #0078ff !important; ">
    <div class="container">
        <a class="navbar-brand js-scroll" href="{{ route('home') }}">KakAlvin</a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
            aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link js-scroll {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('post.index') }}" class="nav-link js-scroll {{ (request()->is('admin/post*')) ? 'active' : '' }}">Postingan</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('tag.index') }}" class="nav-link js-scroll {{ (request()->is('admin/tag*')) ? 'active' : '' }}">Tags</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
