<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <div class="sidebar-brand d-none d-md-flex">
            <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="/assets/brand/coreui.svg#full"></use>
            </svg>
            <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="/assets/brand/coreui.svg#signet"></use>
            </svg>
        </div>
        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
            <li class="nav-item"><a class="nav-link" href=" {{ route('home')  }}">
                    <svg class="nav-icon">
                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-home"></use>
                    </svg> Dashboard</a></li>
            <li class="nav-group">
                <a class="nav-link nav-group-toggle" href="#">
                    <svg class="nav-icon">
                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-list"></use>
                    </svg>CMS
                </a>
                <ul class="nav-group-items">
                    <li class="nav-item"><a class="nav-link" href="{{ route('researchers.index') }}">
                            <svg class="nav-icon">
                                <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-people"></use>
                            </svg> Istraživači</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('publications.index') }}">
                            <svg class="nav-icon">
                                <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-pencil"></use>
                            </svg> Publikacije</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('projects.index') }}">
                            <svg class="nav-icon">
                                <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-puzzle"></use>
                            </svg> Projekti</a></li>
                    @if(Auth::user()->user_role->slug == "admin")
                            <li class="nav-item"><a class="nav-link" href="{{ route('student-activities.index') }}">
                                    <svg class="nav-icon">
                                        <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-graph"></use>
                                    </svg>Aktivnosti</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('disseminations.index') }}">
                                <svg class="nav-icon">
                                    <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-globe-alt"></use>
                                </svg> Diseminacija</a></li>
                        <li class="nav-item"><a class="nav-link"    href="{{ route('news.index') }}">
                                <svg class="nav-icon">
                                    <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-newspaper"></use>
                                </svg> Vesti</a></li>
                    @endif
                </ul>
            </li>
            @if(Auth::user()->user_role->slug == "admin")
                <li class="nav-group">
                    <a class="nav-link nav-group-toggle" href="#">
                        <svg class="nav-icon">
                            <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-settings"></use>
                        </svg>Podešavanja
                    </a>
                    <ul class="nav-group-items">
                        <li class="nav-item"><a class="nav-link" href=" {{ route('users.index') }}">
                                <svg class="nav-icon">
                                    <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-user"></use>
                                </svg> Korisnici</a></li>
                        <li class="nav-item"><a class="nav-link" href=" {{ route('main-slider.index') }}">
                                <svg class="nav-icon">
                                    <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-layers"></use>
                                </svg> Glavni Slajder</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('welcome-section.index') }}">
                                <svg class="nav-icon">
                                    <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-short-text"></use>
                                </svg> Tekst Početne</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('galleries.index') }}">
                                <svg class="nav-icon">
                                    <use xlink:href="/assets/icons/coreui/free-symbol-defs.svg#cui-flower"></use>
                                </svg> Galerija</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>


