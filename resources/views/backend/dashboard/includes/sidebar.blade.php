<aside class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('storage/setting/admin-logo/'.$settingDash->admin_logo) }}" class="logo-icon" alt="logo icon" />
        </div>
        <!-- <div>
            <h4 class="logo-text" style=" text-align: center; "> মৎস্য ও প্রাণিসম্পদ তথ্য ভাণ্ডার </h4>
        </div> -->
        <div class="toggle-icon ms-auto">
            <ion-icon name="menu-sharp"></ion-icon>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a  href="{{ route('admin.dashboard') }}">
                <div class="parent-icon">
                    <i class="bi bi-house-door"></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        @AdministratorEditor
            <li>
                <a  href="{{ route('admin.scrolling.news.ticker.index') }}">
                    <div class="parent-icon">
                        <i class="bi bi-newspaper"></i>
                    </div>
                    <div class="menu-title"> স্ক্রলিং নিউজ টিকার </div>
                </a>
            </li>
        @endAdministratorEditor

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <i class="bi bi-bounding-box-circles"></i>
                </div>
                <div class="menu-title">  প্রয়োজনীয় সেবা বক্স  </div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.post.index') }}"> <i class="bi bi-arrow-right"></i> All Posts </a>
                </li>
                <li>
                    <a href="{{ route('admin.post.create') }}"> <i class="bi bi-arrow-right"></i> Add New </a>
                </li>
                @AdministratorEditor
                    <li>
                        <a href="{{ route('admin.category.index') }}"> <i class="bi bi-arrow-right"></i> Categories </a>
                    </li>
                @endAdministratorEditor
            </ul>
        </li>
        @AdministratorEditor
            <li>
                <a  href="{{ route('admin.photo.message.index') }}">
                    <div class="parent-icon">
                        <i class="bi bi-card-image"></i>
                    </div>
                    <div class="menu-title"> ছবি বার্তা </div>
                </a>
            </li>
        @endAdministratorEditor

        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon">
                    <i class="bi bi-bounding-box-circles"></i>
                </div>
                <div class="menu-title">  মৎস্য ও প্রানিসম্পদ বিশেষ সেবা  </div>
            </a>
            <ul>
                <li>
                    <a href="{{ route('admin.flss.post.index') }}"> <i class="bi bi-arrow-right"></i> All Posts </a>
                </li>
                <li>
                    <a href="{{ route('admin.flss.post.create') }}"> <i class="bi bi-arrow-right"></i> Add New </a>
                </li>
                @AdministratorEditor
                <li>
                    <a href="{{ route('admin.flss.category.index') }}"> <i class="bi bi-arrow-right"></i> Categories </a>
                </li>
                @endAdministratorEditor
            </ul>
        </li>

        @AdministratorEditor
            <li>
                <a href="{{ route('admin.important.link.index') }}">
                    <div class="parent-icon">
                        <i class="bi bi-link-45deg"></i>
                    </div>
                    <div class="menu-title">  গুরুর্তপূর্ন লিঙ্ক সমূহ  </div>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.necessary.other.service.index') }}">
                    <div class="parent-icon">
                        <i class="bi bi-app-indicator"></i>
                    </div>
                    <div class="menu-title">  প্রয়োজনীয় অন্যান্য সেবা  </div>
                </a>
            </li>

            <li class="menu-label">UI Elements</li>
            
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="bi bi-file-earmark"></i>
                    </div>
                    <div class="menu-title"> Pages </div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('admin.page.index') }}"> <i class="bi bi-arrow-right"></i> All Pages </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.page.create') }}"> <i class="bi bi-arrow-right"></i> Add New </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="bi bi-images"></i>
                    </div>
                    <div class="menu-title"> Media </div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('admin.media.index') }}"> <i class="bi bi-arrow-right"></i> Library </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.media.create') }}"> <i class="bi bi-arrow-right"></i> Add New </a>
                    </li>
                </ul>
            </li>
        @endAdministratorEditor
       
        
        
        {{---
            Administrator
            Author
            Editor
            AllUser
            AuthorEditor
            AdministratorAuthor
            AdministratorEditor
        ---}}
        @AdministratorEditor
            <li>
                <a href="javascript:;" class="has-arrow">
                    <div class="parent-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    <div class="menu-title"> User Profile </div>
                </a>
                <ul>
                    <li>
                        <a href="{{ route('admin.user.index') }}"> <i class="bi bi-arrow-right"></i> All Active Users </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.user.pending.index') }}"> <i class="bi bi-arrow-right"></i> All Pending Users </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.user.inactive.index') }}"> <i class="bi bi-arrow-right"></i> All Inactive Users </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.user.create') }}"> <i class="bi bi-arrow-right"></i> Add New </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.user.profile.index') }}"> <i class="bi bi-arrow-right"></i> Profile </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.user.role.index') }}"> <i class="bi bi-arrow-right"></i> User Role </a>
                    </li>
                </ul>
            </li>
            <li>
                <a  href="{{ route('admin.setting.index') }}">
                    <div class="parent-icon">
                        <i class="bi bi-gear"></i>
                    </div>
                    <div class="menu-title"> Settings </div>
                </a>
            </li>
        @endAdministratorEditor
        {{-- <li>
            <a  href="/rd/authentication/sign-in.php">
                <div class="parent-icon">
                    <i class="bi bi-box-arrow-in-right"></i>
                </div>
                <div class="menu-title"> Sign In </div>
            </a>
        </li> --}}
        
    </ul>
    <!--end navigation-->
</aside>