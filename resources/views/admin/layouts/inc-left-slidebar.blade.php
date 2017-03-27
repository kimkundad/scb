<style>

ul.nav-main > li.nav-expanded > a {
  box-shadow: 2px 0 0 #602dab inset;
}
html.no-overflowscrolling .nano > .nano-pane > .nano-slider {
    background: #602dab;
}
.page-header h2 {
    border-bottom-color: #602dab;
}
</style>
<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">

					<div class="sidebar-header">
						<div class="sidebar-title">
							Navigation
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar" ></i>
						</div>
					</div>

					<div class="nano">
						<div class="nano-content">
							<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">
									<li {{ (Request::is('admin/dashboard*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/dashboard/')}}"  >
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
									</li>
									<li {{ (Request::is('admin/user*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/user/')}}" >
											<i class="fa fa-male" aria-hidden="true"></i>
											<span>UserRegister</span>
										</a>
									</li>

                  <li {{ (Request::is('admin/group*') ? 'class=nav-expanded' : '') }} >
										<a href="{{url('admin/group/')}}" >
											<i class="fa fa-external-link" aria-hidden="true"></i>
											<span>Groups</span>
										</a>
									</li>



								</ul>



							</nav>



							<hr class="separator" />


						</div>

					</div>

				</aside>
				<!-- end: sidebar -->
