	<!--begin::Aside menu-->
	<div class="aside-menu flex-column-fluid">
	    <!--begin::Aside Menu-->
	    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
	        <!--begin::Menu-->
	        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">

	            <div class="menu-item">
	                <div class="menu-content pb-2">
	                    <a href="{{ route('admin.index') }}">
	                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">
	                            {{ TranslationHelper::translate('dashboard' , 'admin') }}
	                        </span>
	                    </a>
	                </div>
	            </div>

	            @adminCanAny(['roles.read','roles.create','roles.edit','roles.delete',
	            'admins.read','admins.create','admins.edit','admins.delete',
	            'users.read','users.create','users.edit','users.delete'])

	            <div data-kt-menu-trigger="click" class="menu-item menu-accordion 
					{{ showLink('admin.user') }}
					{{ showLink('admin.admin') }}
					{{ showLink('admin.role') }}">

	                <span class="menu-link">
	                    <span class="menu-icon">
	                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
	                        <span class="svg-icon svg-icon-2">
	                            <i class="fas fa-users icon"></i>
	                            {{-- <img src="{{ asset('dashboard/assets/img/admin.png') }}" loading="lazy" width="20" height="20" alt=""> --}}
	                        </span>
	                        <!--end::Svg Icon-->
	                    </span>
	                    <span class="menu-title"> {{ TranslationHelper::translate('roles' , 'admin') }} </span>
	                    <span class="menu-arrow"></span>
	                </span>
	                <div class="menu-sub menu-sub-accordion menu-active-bg">

	                    @adminCanAny(['roles.read','roles.create','roles.edit','roles.delete'])
	                    <div class="menu-item">
	                        <a class="menu-link {{ activeLink('admin.role') }}" href="{{ route('admin.role.index') }}">
	                            <span class="menu-bullet">
	                                <span class="bullet bullet-dot"></span>
	                            </span>
	                            <span class="menu-title"> {{ TranslationHelper::translate('roles' , 'admin') }} </span>
	                        </a>
	                    </div>
	                    @endadminCanAny

	                    @adminCanAny(['admins.read','admins.create','admins.edit','admins.delete'])
	                    <div class="menu-item">
	                        <a class="menu-link {{ activeLink('admin.admin') }}" href="{{ route('admin.admin.index') }}">
	                            <span class="menu-bullet">
	                                <span class="bullet bullet-dot"></span>
	                            </span>
	                            <span class="menu-title"> {{ TranslationHelper::translate('admins' , 'admin') }} </span>
	                        </a>
	                    </div>
	                    @endadminCanAny

	                </div>
	            </div>
	            @endadminCanAny

	            @adminCanAny(['guides.read','guides.create','guides.edit','guides.delete'])
	            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
	                <div class="menu-item">
	                 	<a class="menu-link {{ activeLink('admin.company') }}" href="{{ route('admin.company.index') }}">
	                        <span class="menu-icon">
	                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
	                            <span class="svg-icon svg-icon-2">
	                                <i class="fas fa-road icon"></i>
	                            </span>
	                            <!--end::Svg Icon-->
	                        </span>
	                        <span class="menu-title"> {{ TranslationHelper::translate('guide' , 'admin') }} </span>
	                    </a>
	                </div>
	            </div>
	            @endadminCanAny

				
				@adminCanAny(['admin_country.read','admin_country.create','admin_country.edit','admin_country.delete'])
					<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
						<div class="menu-item">
							<a class="menu-link {{ activeLink('admin.admin_country') }}" href="{{ route('admin.admin.country.view') }}">
								<span class="menu-icon">
									<!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
									<span class="svg-icon svg-icon-2">
										<i class="fas fa-users icon"></i>
									</span>
									<!--end::Svg Icon-->
								</span>
								<span class="menu-title"> {{ TranslationHelper::translate('admin' , 'admin') }} </span>
							</a>
						</div>
					</div>
	            @endadminCanAny

				@adminCanAny(['ports.read','ports.create','ports.edit','ports.delete',
				'product_ships.read','product_ships.create','product_ships.edit','product_ships.delete',
				'ship_movements.read','ship_movements.create','ship_movements.edit','ship_movements.delete'])

	            <div data-kt-menu-trigger="click" class="menu-item menu-accordion 
					{{ showLink('admin.port') }}
					{{ showLink('admin.shipsProduct') }}
					{{ showLink('admin.ship') }}">

	                <span class="menu-link">
	                    <span class="menu-icon">
	                        <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm007.svg-->
	                        <span class="svg-icon svg-icon-2">
	                          	<i class="fas fa-ship icon"></i>
	                        </span>
	                        <!--end::Svg Icon-->
	                    </span>
	                    <span class="menu-title"> {{ TranslationHelper::translate('international_exchange' , 'admin') }} </span>
	                    <span class="menu-arrow"></span>
	                </span>
	                <div class="menu-sub menu-sub-accordion menu-active-bg">

	                    @adminCanAny(['ports.read','ports.create','ports.edit','ports.delete'])
	                    <div class="menu-item">
	                        <a class="menu-link {{ activeLink('admin.port') }}" href="{{ route('admin.port.index') }}">
	                            <span class="menu-bullet">
	                                <span class="bullet bullet-dot"></span>
	                            </span>
	                            <span class="menu-title"> {{ TranslationHelper::translate('ports' , 'admin') }} </span>
	                        </a>
	                    </div>
	                    @endadminCanAny

						@adminCanAny(['product_ships.read','product_ships.create','product_ships.edit','product_ships.delete'])
	                    <div class="menu-item">
	                        <a class="menu-link {{ activeLink('admin.shipsProduct') }}" href="{{ route('admin.shipsProduct.index') }}">
	                            <span class="menu-bullet">
	                                <span class="bullet bullet-dot"></span>
	                            </span>
	                            <span class="menu-title"> {{ TranslationHelper::translate('products_ships' , 'admin') }} </span>
	                        </a>
	                    </div>
	                    @endadminCanAny

						@adminCanAny(['ship_movements.read','ship_movements.create','ship_movements.edit','ship_movements.delete'])
	                    <div class="menu-item">
	                        <a class="menu-link {{ activeLink('admin.ship') }}" href="{{ route('admin.ship.index') }}">
	                            <span class="menu-bullet">
	                                <span class="bullet bullet-dot"></span>
	                            </span>
	                            <span class="menu-title"> {{ TranslationHelper::translate('ship_movement' , 'admin') }} </span>
	                        </a>
	                    </div>
	                    @endadminCanAny

	                </div>
	            </div>
	            @endadminCanAny


	            @adminCanAny(['notifications.read','notifications.create','notifications.edit','notifications.delete'])
	            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
	                <div class="menu-item">
	                    <a class="menu-link {{ activeLink('admin.notification') }}" href="{{ route('admin.notification.index') }}">
	                        <span class="menu-icon">
	                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
	                            <span class="svg-icon svg-icon-2">
	                                <i class="fas fa-bell icon"></i>
	                            </span>
	                            <!--end::Svg Icon-->
	                        </span>
	                        <span class="menu-title"> {{ TranslationHelper::translate('notifications' , 'admin') }} </span>
	                    </a>
	                </div>
	            </div>
	            @endadminCanAny

	            @adminCan('contact.read')
	            <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
	                <div class="menu-item">
	                    <a class="menu-link {{ activeLink('admin.contact') }}" href="{{ route('admin.contact.index') }}">
	                        <span class="menu-icon">
	                            <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
	                            <span class="svg-icon svg-icon-2">
	                                <i class="fas fa-envelope-square icon"></i>
	                            </span>
	                            <!--end::Svg Icon-->
	                        </span>
	                        <span class="menu-title"> {{ TranslationHelper::translate('technical_support' , 'admin') }} </span>
	                    </a>
	                </div>
	            </div>
	            @endadminCan

	            @adminCanAny(['setting.edit'])
				<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
					<div class="menu-item">
						<a class="menu-link {{ activeSingleLink('admin.setting.form.application') }}" href="{{ route('admin.setting.form.application') }}">
							<span class="menu-icon">
								<!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
								<span class="svg-icon svg-icon-2">
									<i class="fas fa-cogs icon"></i>
									{{-- <img src="{{ asset('dashboard/assets/img/settings.png') }}" loading="lazy" width="20" height="20" alt=""> --}}
								</span>
								<!--end::Svg Icon-->
							</span>
							<span class="menu-title"> {{ TranslationHelper::translate('app_setting' , 'admin') }} </span>
						</a>
					</div>
				</div>
	            @endadminCanAny

	            @adminCan('setting.edit')
	            {{-- <div data-kt-menu-trigger="click" class="menu-item menu-accordion 
					{{ showLink('admin.setting') }}
	            {{ showLink('admin.social') }}">

	            <span class="menu-link">
	                <span class="menu-icon">

	                    <span class="svg-icon svg-icon-2">
	                        <img src="{{ asset('dashboard/assets/img/settings.png') }}" width="20" height="20" alt="">
	                    </span>

	                </span>
	                <span class="menu-title"> {{ TranslationHelper::translate('website_settings' , 'admin') }} </span>
	                <span class="menu-arrow"></span>
	            </span>

	            <div class="menu-sub menu-sub-accordion menu-active-bg">
	                <div class="menu-item">
	                    <a class="menu-link {{ activeSingleLink('admin.setting.form.home') }}" href="{{ route('admin.setting.form.home') }}">
	                        <span class="menu-bullet">

	                            <span class="menu-bullet">
	                                <span class="bullet bullet-dot"></span>
	                            </span>
	                        </span>
	                        <span class="menu-title"> {{ TranslationHelper::translate('home_page' , 'admin') }} </span>
	                    </a>
	                </div>
	                <div class="menu-item">
	                    <a class="menu-link {{ activeSingleLinkRequest('admin/setting/setting/about') }}" href="{{ route('admin.setting.form.page','about') }}">
	                        <span class="menu-bullet">

	                            <span class="menu-bullet">
	                                <span class="bullet bullet-dot"></span>
	                            </span>
	                        </span>
	                        <span class="menu-title"> {{ TranslationHelper::translate('about_page' , 'admin') }} </span>
	                    </a>
	                </div>

	                <div class="menu-item">
	                    <a class="menu-link {{ activeSingleLink('admin.setting.form.social') }}" href="{{ route('admin.setting.form.social') }}">
	                        <span class="menu-bullet">
	                            <span class="bullet bullet-dot"></span>
	                        </span>
	                        <span class="menu-title"> {{ TranslationHelper::translate('social_setting' , 'admin') }} </span>
	                    </a>
	                </div>
	            </div>

	        	</div> --}}
	        	@endadminCan

	    </div>
	    <!--end::Menu-->
	</div>
	<!--end::Aside Menu-->
	</div>
	<!--end::Aside menu-->
