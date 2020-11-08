<!-- begin::Body -->
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
		<!-- BEGIN: Left Aside -->
		<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
			<i class="la la-close"></i>
		</button>
		<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
		@if(Auth::user()->hasRole('dev'))
			 <!-- BEGIN: Aside Menu -->
				<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500" >
					<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
						<li class="m-menu__item  m-menu__item--active" aria-haspopup="true" >
							<a  href="{{ url('/admin-dash') }}" class="m-menu__link ">
								<i class="m-menu__link-icon flaticon-apps"></i>
								<span class="m-menu__link-title">
									<span class="m-menu__link-wrap">
										<span class="m-menu__link-text">
											Dashboard
										</span>
									</span>
								</span>
							</a>
						</li>

						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
							<a  href="javascript:;" class="m-menu__link m-menu__toggle active">
								<i class="m-menu__link-icon flaticon-users"></i>
								<span class="m-menu__link-text">
									Staff
								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
										<span class="m-menu__link">
											<span class="m-menu__link-text">
												Staff
											</span>
										</span>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/all-users-dev') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												All Users
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/new-user-dev') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Add New
											</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
							<a  href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon fa fa-bank"></i>
								<span class="m-menu__link-text">
									Tenants
								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
										<span class="m-menu__link">
											<span class="m-menu__link-text">
												Branches
											</span>
										</span>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/all-branches-dev') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												All Branches
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/new-branch-dev') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Add New
											</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
							<a  href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon fa fa-tag"></i>
								<span class="m-menu__link-text">
									Products
								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
										<span class="m-menu__link">
											<span class="m-menu__link-text">
												Products
											</span>
										</span>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/all-products-dev') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												All Products
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/new-product-dev') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Add New
											</span>
										</a>
									</li>
								</ul>
							</div>
						</li>


						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
							<a  href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon la la-barcode"></i>
								<span class="m-menu__link-text">
									ItemCodes
								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
										<span class="m-menu__link">
											<span class="m-menu__link-text">
												ItemCodes
											</span>
										</span>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/all-itemcodes-dev') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												ItemCodes
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/new-itemcode-dev') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Create ItemCodes
											</span>
										</a>
									</li>

									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/verify-dev') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Vefify ItemCodes
											</span>
										</a>
									</li>

									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/checkout-dev') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Cashier Checkout
											</span>
										</a>
									</li>

									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/return-dev') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Return Item
											</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
							<a  href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon flaticon-graph"></i>
								<span class="m-menu__link-text">
									Reports
								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
										<span class="m-menu__link">
											<span class="m-menu__link-text">
												Reports
											</span>
										</span>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/reports') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Dashboard
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/branches-reports') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Branches
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/products-reports') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Products
											</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="m-menu__section ">
							<h4 class="m-menu__section-text">
								Settings
							</h4>
							<i class="m-menu__section-icon flaticon-more-v3"></i>
						</li>

						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
							<a href="{{ url('/logout') }}" class="m-menu__link m-menu__toggle"
								onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
								<i class="fa fa-sign-out m-menu__link-icon "></i>
								<span class="m-menu__link-text">
									Sign Out
								</span>
							</a>

							<form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</div>
				<!-- END: Aside Menu -->
			</div>
			<!-- END: Left Aside -->

		@elseif(Auth::user()->hasRole('admin'))
				<!-- BEGIN: Aside Menu -->
				<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="0" m-menu-dropdown-timeout="500" >
					<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
						<li class="m-menu__item" aria-haspopup="true" >
							<a  href="{{ url('/admin-dash') }}" class="m-menu__link ">
								<i class="m-menu__link-icon flaticon-apps"></i>
								<span class="m-menu__link-title">
									<span class="m-menu__link-wrap">
										<span class="m-menu__link-text">
											Dashboard
										</span>
									</span>
								</span>
							</a>
						</li>

						<li class="m-menu__item  m-menu__item--submenu " aria-haspopup="true"  m-menu-submenu-toggle="hover">
							<a  href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon flaticon-users"></i>
								<span class="m-menu__link-text">
									Staff
								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
										<span class="m-menu__link">
											<span class="m-menu__link-text">
												Staff
											</span>
										</span>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('all-users') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Staff
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('new-user') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Add New
											</span>
										</a>
									</li>
								</ul>
							</div>
                        </li>

                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
							<a  href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon fa fa-home"></i>
								<span class="m-menu__link-text">
									Units
								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
										<span class="m-menu__link">
											<span class="m-menu__link-text">
												Units
											</span>
										</span>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/all-units') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												All Units
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/new-unit') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Add New
											</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
							<a  href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon flaticon-users"></i>
								<span class="m-menu__link-text">
									Tenants
								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
										<span class="m-menu__link">
											<span class="m-menu__link-text">
												Tenants
											</span>
										</span>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/all-tenants') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												All Tenants
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/new-tenant') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Add New
											</span>
										</a>
									</li>
								</ul>
							</div>
						</li>


						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
							<a  href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon fa fa-car"></i>
								<span class="m-menu__link-text">
									Vehicles
								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
										<span class="m-menu__link">
											<span class="m-menu__link-text">
												Vehicles
											</span>
										</span>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/all-vehicles') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												All Vehicles
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/new-vehicle') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Add New
											</span>
										</a>
									</li>
								</ul>
							</div>
                        </li>


						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
							<a  href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon fa fa-tint"></i>
								<span class="m-menu__link-text">
									Water Readings
								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
										<span class="m-menu__link">
											<span class="m-menu__link-text">
												Water Readings
											</span>
										</span>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/readings') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												All Readings
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/new-reading') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Add New
											</span>
										</a>
									</li>
								</ul>
							</div>
                        </li>
						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
							<a  href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon fa fa-folder"></i>
								<span class="m-menu__link-text">
									Invoices
								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
										<span class="m-menu__link">
											<span class="m-menu__link-text">
												Invoices
											</span>
										</span>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/all-invoices') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												All Invoices
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/new-invoice') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Add New
											</span>
										</a>
									</li>
								</ul>
							</div>
                        </li>


                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
							<a  href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon fa fa-copy"></i>
								<span class="m-menu__link-text">
									Receipts
								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
										<span class="m-menu__link">
											<span class="m-menu__link-text">
												Receipts
											</span>
										</span>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/receipts') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												All Receipts
											</span>
										</a>
									</li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/new-receipt') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												New Receipt
											</span>
										</a>
									</li>
								</ul>
							</div>
                        </li>


                        <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  m-menu-submenu-toggle="hover">
							<a  href="javascript:;" class="m-menu__link m-menu__toggle">
								<i class="m-menu__link-icon fa fa-credit-card"></i>
								<span class="m-menu__link-text">
									Payments
								</span>
								<i class="m-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="m-menu__submenu ">
								<span class="m-menu__arrow"></span>
								<ul class="m-menu__subnav">
									<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
										<span class="m-menu__link">
											<span class="m-menu__link-text">
												Payments
											</span>
										</span>
                                    </li>
									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/all-payments') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												All Driver Payments
											</span>
										</a>
                                    </li>

									<li class="m-menu__item " aria-haspopup="true" >
										<a  href="{{ url('/new-payment') }}" class="m-menu__link ">
											<i class="m-menu__link-bullet m-menu__link-bullet--dot">
												<span></span>
											</i>
											<span class="m-menu__link-text">
												Account Balance
											</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

						<li class="m-menu__section ">
							<h4 class="m-menu__section-text">
								Settings
							</h4>
							<i class="m-menu__section-icon flaticon-more-v3"></i>
						</li>

						<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
							<a href="{{ url('/logout') }}" class="m-menu__link m-menu__toggle"
								onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
								<i class="fa fa-sign-out m-menu__link-icon "></i>
								<span class="m-menu__link-text">
									Sign Out
								</span>
							</a>

							<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
								{{ csrf_field() }}
							</form>
						</li>
					</ul>
				</div>
				<!-- END: Aside Menu -->
			</div>
			<!-- END: Left Aside -->

        @else
	    @endif
