  <!--begin::Header-->
  <div id="kt_header" style="" class="header align-items-stretch">
      <!--begin::Container-->
      <div class="container-fluid d-flex align-items-stretch justify-content-between">

          <!--begin::Aside mobile toggle-->
          <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
              <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_aside_mobile_toggle">
                  <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                  <span class="svg-icon svg-icon-2x mt-1">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                          <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                          <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                      </svg>
                  </span>
                  <!--end::Svg Icon-->
              </div>
          </div>
          <!--end::Aside mobile toggle-->

          <!--begin::Mobile logo-->
          <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
              <a href="#" class="d-lg-none">
                  <img alt="Logo" src="{{ setting('site_logo') }}" class="h-30px" />
              </a>
          </div>
          <!--end::Mobile logo-->

          <!--begin::Wrapper-->
          <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
              <!--begin::Navbar-->
              <div class="d-flex align-items-center" id="kt_header_nav">
                @if (auth('admin')->user()->country_id != null)
                    <span> {{ TranslationHelper::translate('this_account_related_to' , 'admin') }} </span>  
                @endif
                @if (auth('admin')->user()->country_id == 1)
                   <img src="{{ asset('dashboard/assets/media/flags/egypt.svg') }}" style="width: 30px;height:30px ;margin: auto 5px" alt="">
                @elseif(auth('admin')->user()->country_id == 2)   
                   <img src="{{ asset('dashboard/assets/media/flags/saudi-arabia.svg') }}" style="width: 30px;height:30px ;margin: auto 5px" alt="">
                @elseif(auth('admin')->user()->country_id == 3)   
                   <img src="{{ asset('dashboard/assets/media/flags/united-arab-emirates.svg') }}" style="width: 30px;height:30px ;margin: auto 5px" alt="">
                @endif
              </div>
              <!--end::Navbar-->
              <!--begin::Topbar-->
              <div class="d-flex align-items-stretch flex-shrink-0">
                  <!--begin::Toolbar wrapper-->
                  <div class="d-flex align-items-stretch flex-shrink-0">

                      <!--begin::Notifications-->
                      <div class="d-flex align-items-center ms-1 ms-lg-3">
                          <!--begin::Menu- wrapper-->
                          <div class="btn btn-icon btn-active-light-primary position-relative w-30px h-30px w-md-40px h-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                              <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                              <span><i class="fas fa-bell fa-2x"></i></span>
                              <!--end::Svg Icon-->
                          </div>
                          <!--begin::Menu-->
                          <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true"></div>

                          <!--end::Menu-->
                          <!--end::Menu wrapper-->
                      </div>
                      <!--end::Notifications-->

                      <!--begin::User-->
                      <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                          <!--begin::Menu wrapper-->
                          <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                              <img src="{{ auth()->user()->getAvatar() }}" alt="logo" />
                          </div>
                          <!--begin::Menu-->
                          <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                  <div class="menu-content d-flex align-items-center px-3">
                                      <!--begin::Avatar-->
                                      <div class="symbol symbol-50px me-5">
                                          <img alt="Logo" src="{{ auth()->user()->getAvatar() }}" />
                                      </div>
                                      <!--end::Avatar-->
                                      <!--begin::Username-->
                                      <div class="d-flex flex-column">
                                          <div class="fw-bolder d-flex align-items-center fs-5">{{ auth()->user()->name }}
                                              {{-- <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span> --}}
                                          </div>
                                          <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                                      </div>
                                      <!--end::Username-->
                                  </div>
                              </div>
                              <!--end::Menu item-->

                              <!--begin::Menu separator-->
                              {{-- <div class="separator my-2"></div>
                              <!--end::Menu item-->
                              <div class="menu-item px-5">
                                  <a class="menu-link px-5" href="#\">
                                      profile
                                  </a>
                              </div> --}}

                              <!--begin::Menu separator-->
                              <div class="separator my-2"></div>
                              <!--end::Menu separator-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-5" data-kt-menu-trigger="hover" data-kt-menu-placement="left-start" data-kt-menu-flip="bottom, top">
                                  <a href="#" class="menu-link px-5">
                                      <span class="menu-title position-relative">
                                          {{ TranslationHelper::translate('language' , 'admin') }}
                                          <span class="fs-8 rounded bg-light px-3 py-2 position-absolute translate-middle-y top-50 end-0">{{ config('language')[app()->getLocale()] }}
                                              <img class="w-15px h-15px rounded-1 ms-2" src="{{ asset(config('flags')[app()->getLocale()])  }}" alt="" /></span></span>
                                  </a>
                                  <!--begin::Menu sub-->
                                  <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                      @foreach(config('language') as $keyLang => $lang)
                                      <div class="menu-item px-3">
                                          <a href="{{ LaravelLocalization::getLocalizedURL($keyLang) }}" class="menu-link d-flex px-5 {{ app()->getLocale() == $keyLang ? 'active' : '' }}">
                                              <span class="symbol symbol-20px me-4">
                                                  <img class="rounded-1" src="{{ asset(config('flags')[$keyLang]) }}" alt="" />
                                              </span>{{$lang}}</a>
                                      </div>
                                      @endforeach
                                  </div>
                                  <!--end::Menu sub-->
                              </div>

                              <!--begin::Menu separator-->
                              <div class="separator my-2"></div>
                              <!--end::Menu separator-->
                              <!--begin::Menu item-->
                              <div class="menu-item px-5">
                                  <a class="menu-link px-5" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      {{ TranslationHelper::translate('sign_out' , 'admin') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                      @csrf
                                  </form>
                              </div>
                              <!--end::Menu item-->

                              <!--begin::Menu separator-->
                              <div class="separator my-2"></div>
                              <!--end::Menu separator-->

                          </div>
                          <!--end::Menu-->
                          <!--end::Menu wrapper-->
                      </div>
                      <!--end::User -->
                  </div>
                  <!--end::Toolbar wrapper-->
              </div>
              <!--end::Topbar-->
          </div>
          <!--end::Wrapper-->

      </div>
      <!--end::Container-->
  </div>
  <!--end::Header-->
