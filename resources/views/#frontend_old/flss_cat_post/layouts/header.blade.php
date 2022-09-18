<div class="header header-fixed header-logo-app clearfix">
    <a href="@yield('title_url')" class="header-title"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; &nbsp; &nbsp; 
        @yield('title')
    </a>
    
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-body">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-facebook-square" style="margin-right: 18px; font-size: 20px; vertical-align: middle;"></i> Facebook Community </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-exclamation-circle" style="margin-right: 18px; font-size: 20px; vertical-align: middle;"></i> Helpdesk </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-question-circle" style="margin-right: 18px; font-size: 20px; vertical-align: middle;"></i> FAQ </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-shield" style="margin-right: 18px; font-size: 20px; vertical-align: middle;"></i> Privacy Policy </a>
                </li>
            </ul>

            <div class="offcanvas-footer">
                <div class="footer-line mt-2">
                    <div class="credit">
                        <div class="inline-block relative">
                            <img alt="logo set" class="_mt-2" src="img/logo-b.png" style="height: 40px" />
                        </div>
                    </div>
                </div>

                <div class="developer-corner mt-1">
                    <div class="developer-title">
                        কারিগরি সহযোগিতায়
                    </div>
                    <div class="developer">
                        <a href="http://www.rdnetworkbd.com" target="_blank">
                            <img alt="rdnetworkbd logo" src="img/rd-logo-2022.png" style="width: 130px;" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <nav class="navbar float-end navbar-dark">
        <div class="">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</div>



            