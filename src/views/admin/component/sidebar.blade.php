<aside class="left-sidebar" data-sidebarbg="skin6">
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ BASE_URL_ADMIN }}dashboard"
                    aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                        class="hide-menu">Dashboard</span></a>
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

                
            </ul>
        </nav>
    </div>
</aside>