<!-- Navbar Vertical -->
<aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
    <div class="navbar-vertical-container">
        <div class="navbar-vertical-footer-offset">
            <div class="navbar-brand-wrapper justify-content-between">
                <!-- Logo -->


                <a class="navbar-brand" href="../index.html" aria-label="Front">

                    <img class="navbar-brand-logo" src="{{asset('theme/front/assets/svg/logos/logo.svg')}}" alt="Logo">
                    <img class="navbar-brand-logo-mini" src="{{asset('theme/front/assets/svg/logos/logo-short.svg')}}" alt="Logo">
                </a>

                <!-- End Logo -->

                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                    <i class="tio-clear tio-lg"></i>
                </button>
                <!-- End Navbar Vertical Toggle -->
            </div>

            <!-- Content -->
            <div class="navbar-vertical-content">
                <ul class="navbar-nav navbar-nav-lg nav-tabs">
                    <!-- Dashboards -->
                    <li class="nav-item">
                        <small class="nav-subtitle" title="Layouts">Dashboard</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    <li class="nav-item active">
                        <a class="js-nav-tooltip-link nav-link active" href="layouts.html" title="Dashboard" data-placement="left">
                            <i class="tio-dashboard-vs-outlined nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Homepage</span>
                        </a>
                    </li>

                    <!-- End Dashboards -->

                    <li class="nav-item">
                        <small class="nav-subtitle" title="Products">Products</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>



                    <!-- Apps -->
                    <li class="navbar-vertical-aside-has-menu ">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Products">
                            <i class="tio-apps nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Products <span class="badge badge-info badge-pill ml-1">Hot</span></span>
                        </a>

                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                            <li class="nav-item">
                                <a class="nav-link " href="#" title="Product Stock & Pricing">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">Product Stock & Pricing</span>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <!-- End Apps -->







                    <li class="nav-item">
                        <div class="nav-divider"></div>
                    </li>

                    <li class="nav-item">
                        <small class="nav-subtitle" title="Documentation">Documentation</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link" href="../documentation/index.html" title="Documentation" data-placement="left">
                            <i class="tio-book-opened nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Documentation <span class="badge badge-primary badge-pill ml-1">v1.0</span></span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a class="js-nav-tooltip-link nav-link" href="../documentation/typography.html" title="Components" data-placement="left">
                            <i class="tio-layers-outlined nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Components</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    <!-- Front Builder -->
                    <li class="nav-item nav-footer-item ">
                        <a class="d-none d-md-flex js-hs-unfold-invoker nav-link nav-link-toggle" href="javascript:;"
                           data-hs-unfold-options='{
                   "target": "#styleSwitcherDropdown",
                   "type": "css-animation",
                   "animationIn": "fadeInRight",
                   "animationOut": "fadeOutRight",
                   "hasOverlay": true,
                   "smartPositionOff": true
                 }'>
                            <i class="tio-tune nav-icon"></i>
                        </a>
                        <a class="d-flex d-md-none nav-link nav-link-toggle" href="javascript:;">
                            <i class="tio-tune nav-icon"></i>
                        </a>
                    </li>
                    <!-- End Front Builder -->

                    <!-- Help -->
                    <li class="navbar-vertical-aside-has-menu nav-footer-item ">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle " href="javascript:;" title="Help">
                            <i class="tio-home-vs-1-outlined nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">Help</span>
                        </a>

                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub">
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="Resources &amp; tutorials">
                                    <i class="tio-book-outlined dropdown-item-icon"></i> Resources &amp; tutorials
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="Keyboard shortcuts">
                                    <i class="tio-command-key dropdown-item-icon"></i> Keyboard shortcuts
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="Connect other apps">
                                    <i class="tio-alt dropdown-item-icon"></i> Connect other apps
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="What's new?">
                                    <i class="tio-gift dropdown-item-icon"></i> What's new?
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" title="Contact support">
                                    <i class="tio-chat-outlined dropdown-item-icon"></i> Contact support
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- End Help -->


                </ul>
            </div>
            <!-- End Content -->

            <!-- Footer -->
            <div class="navbar-vertical-footer">
                <ul class="navbar-vertical-footer-list">
                    <li class="navbar-vertical-footer-list-item">
                        <!-- Unfold -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle" href="javascript:;"
                               data-hs-unfold-options='{
                    "target": "#styleSwitcherDropdown",
                    "type": "css-animation",
                    "animationIn": "fadeInRight",
                    "animationOut": "fadeOutRight",
                    "hasOverlay": true,
                    "smartPositionOff": true
                   }'>
                                <i class="tio-tune"></i>
                            </a>
                        </div>
                        <!-- End Unfold -->
                    </li>

                    <li class="navbar-vertical-footer-list-item">
                        <!-- Other Links -->
                        <div class="hs-unfold">
                            <a class="js-hs-unfold-invoker btn btn-icon btn-ghost-secondary rounded-circle" href="javascript:;"
                               data-hs-unfold-options='{
                    "target": "#otherLinksDropdown",
                    "type": "css-animation",
                    "animationIn": "slideInDown",
                    "hideOnScroll": true
                   }'>
                                <i class="tio-help-outlined"></i>
                            </a>

                            <div id="otherLinksDropdown" class="hs-unfold-content dropdown-unfold dropdown-menu navbar-vertical-footer-dropdown">
                                <span class="dropdown-header">Help</span>
                                <a class="dropdown-item" href="#">
                                    <i class="tio-book-outlined dropdown-item-icon"></i>
                                    <span class="text-truncate pr-2" title="Resources &amp; tutorials">Resources &amp; tutorials</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="tio-command-key dropdown-item-icon"></i>
                                    <span class="text-truncate pr-2" title="Keyboard shortcuts">Keyboard shortcuts</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="tio-alt dropdown-item-icon"></i>
                                    <span class="text-truncate pr-2" title="Connect other apps">Connect other apps</span>
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="tio-gift dropdown-item-icon"></i>
                                    <span class="text-truncate pr-2" title="What's new?">What's new?</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <span class="dropdown-header">Contacts</span>
                                <a class="dropdown-item" href="#">
                                    <i class="tio-chat-outlined dropdown-item-icon"></i>
                                    <span class="text-truncate pr-2" title="Contact support">Contact support</span>
                                </a>
                            </div>
                        </div>
                        <!-- End Other Links -->
                    </li>


                </ul>
            </div>
            <!-- End Footer -->
        </div>
    </div>
</aside>
<!-- End Navbar Vertical -->
