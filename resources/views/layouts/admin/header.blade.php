<!-- BEGIN: Header -->
<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
	<div class="m-container m-container--fluid m-container--full-height">
		<div class="m-stack m-stack--ver m-stack--desktop">

			<!-- BEGIN: Brand -->
			<div class="m-stack__item m-brand  m-brand--skin-light ">
				<div class="m-stack m-stack--ver m-stack--general m-stack--fluid">
					<div class="m-stack__item m-stack__item--middle m-brand__logo">
					<a href="{{route('home.index')}}" class="m-brand__logo-wrapper">
						logo
					</a>
					</div>
					<div class="m-stack__item m-stack__item--middle m-brand__tools">
						<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-left m-dropdown--align-push"
							m-dropdown-toggle="click" aria-expanded="true">
							<a href="#"
								class="dropdown-toggle m-dropdown__toggle btn btn-outline-metal m-btn  m-btn--icon m-btn--pill">
								<span>Dashboard</span>
							</a>
							<div class="m-dropdown__wrapper">
								<span
									class="m-dropdown__arrow m-dropdown__arrow--left m-dropdown__arrow--adjust"></span>
								<div class="m-dropdown__inner">
									<div class="m-dropdown__body">
										<div class="m-dropdown__content">
											<ul class="m-nav">
												<li class="m-nav__section m-nav__section--first m--hide">
													<span class="m-nav__section-text">Quick Menu</span>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-share"></i>
														<span class="m-nav__link-text">Human Resources</span>
													</a>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-chat-1"></i>
														<span class="m-nav__link-text">Customer Relationship</span>
													</a>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-info"></i>
														<span class="m-nav__link-text">Order Processing</span>
													</a>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-lifebuoy"></i>
														<span class="m-nav__link-text">Accounting</span>
													</a>
												</li>
												<li class="m-nav__separator m-nav__separator--fit">
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-chat-1"></i>
														<span class="m-nav__link-text">Customer Relationship</span>
													</a>
												</li>
												<li class="m-nav__item">
													<a href="" class="m-nav__link">
														<i class="m-nav__link-icon flaticon-info"></i>
														<span class="m-nav__link-text">Order Processing</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- BEGIN: Responsive Aside Left Menu Toggler -->
						<a href="javascript:;" id="m_aside_left_offcanvas_toggle"
							class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
							<span></span>
						</a>

						<!-- END -->

						<!-- BEGIN: Topbar Toggler -->
						<a id="m_aside_header_topbar_mobile_toggle" href="javascript:;"
							class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
							<i class="flaticon-more"></i>
						</a>

						<!-- BEGIN: Topbar Toggler -->
					</div>
				</div>
			</div>

			<!-- END: Brand -->
			<div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

				<!-- BEGIN: Topbar -->
				<div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general">
					<div class="m-stack__item m-topbar__nav-wrapper">
						<ul class="m-topbar__nav m-nav m-nav--inline">
							<li class="m-nav__item m-topbar__user-profile  m-dropdown m-dropdown--medium m-dropdown--arrow  m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
								m-dropdown-toggle="click">
								<a href="#" class="m-nav__link m-dropdown__toggle">
									@if(!empty(Auth::user()->avatar))
										<span class="m-topbar__userpic">
											<img src="{{asset( 'storage/' . Auth::user()->avatar)}}" class="m--img-rounded m--marginless m--img-centered" alt="" />
										</span>
									@else
										<span class="m-nav__link-icon m-topbar__usericon">
											<span class="m-nav__link-icon-wrapper"><i class="flaticon-user-ok"></i></span>
										</span>
										<span class="m-topbar__username">{{Auth::user()->name}}</span>
									@endif
								</a>
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__header m--align-center" style="background: url({{ asset('admin-theme/app/media/img/misc/user_profile_bg.jpg')}}); background-size: cover;">
											<div class="m-card-user m-card-user--skin-light">
												<div class="m-card-user__pic">
													<img src="{{asset( 'storage/' . Auth::user()->avatar)}}" class="m--img-rounded m--marginless" alt="" />
												</div>
												<div class="m-card-user__details">
													@if(Auth::check())
														<span class="m-card-user__name m--font-weight-500">{{Auth::user()->name}}</span>
													@else
														<span class="m-card-user__name m--font-weight-500">Mark Andre</span>
													@endif
													<a href="javascript:;" class="m-card-user__email m--font-weight-300 m-link">{{Auth::user()->email}}</a>
												</div>
											</div>
										</div>
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav m-nav--skin-light">
													<li class="m-nav__section m--hide">
														<span class="m-nav__section-text">Section</span>
													</li>
													<li class="m-nav__item">
														<a href="{{route('user.edit', ['id' => Auth::user()->id])}}" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-user m--font-accent"></i>
															<span class="m-nav__link-title">
																<span class="m-nav__link-wrap">
																	<span class="m-nav__link-text">Thông Tin Tài Khoản</span>
																	<!-- <span class="m-nav__link-badge"><span
																			class="m-badge m-badge--success">2</span></span> -->
																</span>
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="{{route('home.index')}}" class="m-nav__link">
															<i class="m-nav__link-icon la la-home m--font-success"></i>
															<span class="m-nav__link-text">Trang Chủ</span>
														</a>
													</li>
													<li class="m-nav__separator m-nav__separator--fit">
													</li>
													<li class="m-nav__item">
														<a href="{{route('logout')}}" class="btn m-btn--pill btn-outline-danger m-btn m-btn--custom">Logout</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>

				<!-- END: Topbar -->
			</div>
		</div>
	</div>
</header>

<!-- END: Header -->