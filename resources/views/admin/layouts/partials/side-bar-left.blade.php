<div data-simplebar class="h-100">
    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title" key="t-menu">Dashboard</li>


            <li>
                <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                    <i class="bx bx-home-circle"></i>
                    <span key="t-chat">Dashboard</span>
                </a>
            </li>

            <li class="menu-title" key="t-administration">Administration</li>

            <li class="{{ activeMenuLi('admin/employees') }}">
                <a href="{{ route('admin.employees.index') }}"
                   class="waves-effect {{ activeMenu('admin/employees') }}">
                    <i class="bx bx-receipt"></i>
                    <span key="t-employees">Employees</span>
                </a>
            </li>

            <li class="menu-title" key="t-settings">Settings</li>

            <li class="menu-title" key="t-messages">Messages</li>


            <li>
                <a href="chat.html" class="waves-effect">
                    <i class="bx bx-chat"></i>
                    <span key="t-chat">Chat</span>
                </a>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-map"></i>
                    <span key="t-maps">Maps</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="maps-google.html" key="t-g-maps">Google Maps</a></li>
                    <li><a href="maps-vector.html" key="t-v-maps">Vector Maps</a></li>
                    <li><a href="maps-leaflet.html" key="t-l-maps">Leaflet Maps</a></li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="bx bx-share-alt"></i>
                    <span key="t-multi-level">Multi Level</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li><a href="javascript: void(0);" key="t-level-1-1">Level 1.1</a></li>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2">Level 1.2</a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="javascript: void(0);" key="t-level-2-1">Level 2.1</a></li>
                            <li><a href="javascript: void(0);" key="t-level-2-2">Level 2.2</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript: void(0);" class="waves-effect">
                    <span class="badge rounded-pill bg-danger float-end" key="t-hot">Hot</span>
                    <i class="bx bx-layout"></i>
                    <span key="t-layouts">Layouts</span>
                </a>
                <ul class="sub-menu" aria-expanded="true">
                    <li>
                        <a href="javascript: void(0);" class="has-arrow" key="t-vertical">Vertical</a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="layouts-light-sidebar.html" key="t-light-sidebar">Light Sidebar</a>
                            </li>
                            <li><a href="layouts-compact-sidebar.html" key="t-compact-sidebar">Compact
                                    Sidebar</a></li>
                            <li><a href="layouts-icon-sidebar.html" key="t-icon-sidebar">Icon Sidebar</a>
                            </li>
                            <li><a href="layouts-boxed.html" key="t-boxed-width">Boxed Width</a></li>
                            <li><a href="layouts-preloader.html" key="t-preloader">Preloader</a></li>
                            <li><a href="layouts-colored-sidebar.html" key="t-colored-sidebar">Colored
                                    Sidebar</a></li>
                            <li><a href="layouts-scrollable.html" key="t-scrollable">Scrollable</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);" class="has-arrow" key="t-horizontal">Horizontal</a>
                        <ul class="sub-menu" aria-expanded="true">
                            <li><a href="layouts-horizontal.html" key="t-horizontal">Horizontal</a></li>
                            <li><a href="layouts-hori-topbar-light.html" key="t-topbar-light">Topbar
                                    light</a></li>
                            <li><a href="layouts-hori-boxed-width.html" key="t-boxed-width">Boxed width</a>
                            </li>
                            <li><a href="layouts-hori-preloader.html" key="t-preloader">Preloader</a></li>
                            <li><a href="layouts-hori-colored-header.html" key="t-colored-topbar">Colored
                                    Header</a></li>
                            <li><a href="layouts-hori-scrollable.html" key="t-scrollable">Scrollable</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
    <!-- Sidebar -->
</div>
