<div class="wrapper d-flex flex-column bg-light">
<header class="header header-sticky mb-4">
    <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
            <svg class="icon icon-lg">
                <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-menu"></use>
            </svg>
        </button>
        <ul class="header-nav d-none d-md-flex">
            <li class="nav-item"><a class="nav-link">Istraživačka grupa za Multimodalno Biomedicinsko Inženjerstvo</a></li>
        </ul>
        <form method="POST" action="{{ route('logout') }}">
            <ul class="header-nav ms-3">
                @csrf
                <li class="nav-item"><button class="btn btn-link nav-link" type="submit">
                    <svg class="icon me-2">
                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-account-logout"></use>
                    </svg> Logout</button>
                </li>
            </ul>
        </form>
    </div>
    <div class="header-divider"></div>
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb my-0 ms-2">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <?php $segments = ''; ?>
                @for($i = 1; $i <= count(Request::segments()); $i++)
                    <?php $segments .= '/'. Request::segment($i); ?>
                    @if($i < count(Request::segments()))
                        <li class="breadcrumb-item">{{ ucwords(Request::segment($i)) }}</li>
                    @else
                        <li class="breadcrumb-item active">{{ ucwords(Request::segment($i)) }}</li>
                    @endif
                @endfor
            </ol>
        </nav>
    </div>
</header>
</div>
