        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a href="{{ route('dashboard') }}" class="{{ request()->is('dasgboard') ? 'active' : '' }}" aria-expanded="false">
                            <i class="fas fa-home"></i>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li><a href="{{ route('users') }}" class="{{ request()->is('/users/*') ? 'active' : '' }}" aria-expanded="false">
                            <i class="fas fa-users"></i>
                            <span class="nav-text">Users</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('articles') }}" class="{{ request()->is('/articles/*') ? 'active' : '' }}" aria-expanded="false">
                            <i class="fas fa-hospital-user"></i>
                            <span class="nav-text">Articles</span>
                        </a>
                    </li>

                </ul>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
