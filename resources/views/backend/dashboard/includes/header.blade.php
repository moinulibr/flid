<header class="top-header">
    <nav class="navbar navbar-expand gap-3">
        <div class="mobile-menu-button">
            <i class="bi bi-list"></i>
        </div>
        <form class="searchbar">
            <div class="position-absolute top-50 translate-middle-y search-icon ms-3">
                <i class="bi bi-search"></i>
            </div>
            <input class="form-control" type="text" placeholder="Search for anything" />
            <div class="position-absolute top-50 translate-middle-y search-close-icon">
                <i class="bi bi-x-lg"></i>
            </div>
        </form>
        <div class="top-navbar-right ms-auto">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item mobile-search-button">
                    <a class="nav-link" href="javascript:;">
                        <div class="">
                            <i class="bi bi-search"></i>
                        </div>
                    </a>
                </li>
                @AdministratorEditor
                <li>
                    <a href="{{ route('admin.user.pending.index') }}"> Pending Authors  {{$pendingAuthors}}</a> , 
                </li> 
                <li>
                    <a href="{{route('admin.post.index','reqtopub')}}"> Pending Post  {{$mainPosts}}</a>, 
                </li>
                <li>
                    <a href="{{route('admin.flss.post.index','reqtopub')}}"> Pending Flss Post  {{$flssPosts}}</a>
                </li>
                @endAdministratorEditor
                {{-- <li class="nav-item dropdown dropdown-large">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                        <div class="position-relative">
                            <span class="notify-badge">8</span>
                            <i class="bi bi-bell"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:;">
                            <div class="msg-header">
                                <p class="msg-header-title">Notifications</p>
                                <p class="msg-header-clear ms-auto">Marks all as read</p>
                            </div>
                        </a>
                        <div class="header-notifications-list">
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify">
                                        <i class="bi bi-basket2"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Orders <span class="msg-time float-end">2 min ago</span></h6>
                                        <p class="msg-info">You have recived new orders</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec ago</span></h6>
                                        <p class="msg-info">5 new user registered</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify">
                                        <i class="bi bi-file-earmark"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min ago</span></h6>
                                        <p class="msg-info">The pdf files generated</p>
                                    </div>
                                </div>
                            </a>

                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify">
                                        <i class="bi bi-check2-all"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Product Approved <span class="msg-time float-end">2 hrs ago</span></h6>
                                        <p class="msg-info">Your new product has approved</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify">
                                        <i class="bi bi-send"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">Time Response <span class="msg-time float-end">28 min ago</span></h6>
                                        <p class="msg-info">5.1 min avarage time response</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify">
                                        <i class="bi bi-chat-dots"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs ago</span></h6>
                                        <p class="msg-info">New customer comments recived</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify">
                                        <i class="bi bi-archive"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day ago</span></h6>
                                        <p class="msg-info">24 new authors joined last week</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify">
                                        <i class="bi bi-camera-video"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs ago</span></h6>
                                        <p class="msg-info">Successfully shipped your item</p>
                                    </div>
                                </div>
                            </a>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex align-items-center">
                                    <div class="notify">
                                        <i class="bi bi-bucket"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks ago</span></h6>
                                        <p class="msg-info">45% less alerts last 4 weeks</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <a href="javascript:;">
                            <div class="text-center msg-footer">View All Notifications</div>
                        </a>
                    </div>
                </li> --}}

                <li class="nav-item dropdown dropdown-user-setting">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                        <div class="user-setting">
                             @if (Auth::guard('web')->user()->photo)
                            <img  src="{{ asset('storage/user/'.Auth::guard('web')->user()->photo) }}" class="user-img" alt="">
                            @else
                            <img src="https://via.placeholder.com/110X110/212529/fff" class="user-img" alt="" />
                            @endif
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="javascript:;">
                                <div class="d-flex flex-row align-items-center gap-2">
                                     @if (Auth::guard('web')->user()->photo)
                                        <img class="rounded-circle" width="54" height="54" src="{{ asset('storage/user/'.Auth::guard('web')->user()->photo) }}" alt="" >
                                        @else
                                        <img src="https://via.placeholder.com/110X110/212529/fff" alt="" class="rounded-circle" width="54" height="54" />
                                        @endif
                                    <div class="">
                                        <h6 class="mb-0 dropdown-user-name">
                                            {{Auth::guard('web')->user()->name}}
                                        </h6>
                                        <small class="mb-0 dropdown-user-designation text-secondary">
                                            {{Auth::guard('web')->user()->userRoles?Auth::guard('web')->user()->userRoles->name:NULL}}
                                        </small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            {{-- <a class="dropdown-item" href="{{ route('admin.user.edit',Auth::guard('web')->user()->id) }}"> --}}
                            <a class="dropdown-item" href="{{ route('admin.user.profile.index') }}">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <ion-icon name="person-outline"></ion-icon>
                                    </div>
                                    <div class="ms-3"><span>Profile</span></div>
                                </div>
                            </a>
                        </li>

                        @AdministratorEditor
                        <li>
                            <a class="dropdown-item" href="{{ route('admin.setting.index') }}">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <ion-icon name="settings-outline"></ion-icon>
                                    </div>
                                    <div class="ms-3"><span>Setting</span></div>
                                </div>
                            </a>
                        </li>
                        @endAdministratorEditor

                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout.perform') }}">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <ion-icon name="log-out-outline"></ion-icon>
                                    </div>
                                    <div class="ms-3"><span>Logout</span></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>