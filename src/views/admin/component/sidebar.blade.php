<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ BASE_URL_ADMIN }}dashboard"
                    aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                        class="hide-menu">Dashboard</span></a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ BASE_URL_ADMIN }}statistics" aria-expanded="false">
                        <i data-feather="bar-chart" class="feather-icon"></i>
                        <span class="hide-menu">Thống kê</span>
                    </a>
                </li>

                <li class="list-divider"></li>

                <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i><span class="hide-menu">Article</span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="{{ BASE_URL_ADMIN }}article-list" class="sidebar-link"><span
                                    class="hide-menu"> All Articles
                                </span></a>
                        </li>
                        <li class="sidebar-item"><a href="{{ BASE_URL_ADMIN }}article-form-add"
                                class="sidebar-link"><span class="hide-menu"> Add
                                    Article
                                </span></a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                            class="hide-menu">User </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="<?php echo BASE_URL_ADMIN; ?>user-list" class="sidebar-link"><span
                                    class="hide-menu"> All User
                                </span></a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link has-arrow" href="javascript:void(0)"
                        aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                            class="hide-menu">Category </span></a>
                    <ul aria-expanded="false" class="collapse  first-level base-level-line">
                        <li class="sidebar-item"><a href="<?php echo BASE_URL_ADMIN; ?>category-list" class="sidebar-link"><span
                                    class="hide-menu"> All Category
                                </span></a>
                        </li>
                    </ul>
                </li>

                <li class="list-divider"></li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ BASE_URL_ADMIN }}profile" aria-expanded="false">
                        <i data-feather="user" class="feather-icon"></i>
                        <span class="hide-menu">Profile</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link sidebar-link" href="{{ BASE_URL_ADMIN }}logout"
                    aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                        class="hide-menu">Logout</span></a></li>
            </ul>
        </nav>
    </div>
</aside>