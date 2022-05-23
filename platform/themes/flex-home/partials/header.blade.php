

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport"/>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Fonts-->
      <link href="https://fonts.googleapis.com/css?family={{ urlencode(theme_option('primary_font', 'Nunito Sans')) }}:300,600,700,800" rel="stylesheet" type="text/css">
      <!-- CSS Library-->
      <style>
         :root {
         --primary-color: {{ theme_option('primary_color', '#1d5f6f') }};
         --primary-color-rgb: {{ hex_to_rgba(theme_option('primary_color', '#1d5f6f'), 0.8) }};
         --primary-color-hover: {{ theme_option('primary_color_hover', '#063a5d') }};
         --primary-font: '{{ theme_option('primary_font', 'Nunito Sans') }}';
         }
      </style>
      {!! Theme::header() !!}
   </head>
   <body @if (BaseHelper::siteLanguageDirection() == 'rtl') dir="rtl" @endif>
   {!! apply_filters(THEME_FRONT_BODY, null) !!}
   <div id="alert-container"></div>
   <div class="bravo_topbar d-none d-sm-block">
      <div class="container-fluid w90">
         <div class="row">
            <div class="col-12">
               <div class="content">
                  <div class="topbar-left">
                     @if (theme_option('social_links'))
                     <div class="top-socials">
                        @foreach(json_decode(theme_option('social_links'), true) as $socialLink)
                        @if (count($socialLink) == 3)
                        <a href="{{ $socialLink[2]['value'] }}"
                           title="{{ $socialLink[0]['value'] }}">
                        <i class="{{ $socialLink[1]['value'] }}"></i>
                        </a>
                        @endif
                        @endforeach
                     </div>
                     <span class="line"></span>
                     @endif
                     <a href="mailto:{{ theme_option('email') }}">{{ theme_option('email') }}</a>
                  </div>
                  <div class="topbar-right">
                     @if (is_plugin_active('real-estate'))
                     <ul class="topbar-items">
                        <li><a href="{{ route('public.wishlist') }}"><i class="fas fa-heart"></i> {{ __('Wishlist') }}(<span class="wishlist-count">0</span>)</a></li>
                     </ul>
                     @php $currencies = get_all_currencies(); @endphp
                     @if (count($currencies) > 1)
                     <div class="language currency-switcher">
                        <div class="language-switcher-wrapper">
                           <div class="dropdown d-inline-block">
                              <button class="btn btn-secondary dropdown-toggle btn-select-language" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              {{ get_application_currency()->title }}
                              </button>
                              <ul class="dropdown-menu language_bar_chooser">
                                 @foreach ($currencies as $currency)
                                 <li>
                                    <a href="{{ route('public.change-currency', $currency->title) }}" @if (get_application_currency_id() == $currency->id) class="active" @endif><span>{{ $currency->title }}</span></a>
                                 </li>
                                 @endforeach
                              </ul>
                           </div>
                        </div>
                     </div>
                     @endif
                     @endif
                     {!! Theme::partial('language-switcher') !!}
                     @if (is_plugin_active('real-estate') && RealEstateHelper::isRegisterEnabled())
                     <ul class="topbar-items">
                        @if (auth('account')->check())
                        <li class="login-item"><a href="{{ route('public.account.dashboard') }}" rel="nofollow"><i class="fas fa-user"></i> <span>{{ auth('account')->user()->name }}</span></a></li>
                        <li class="login-item"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" rel="nofollow"><i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</a></li>
                        @else
                        <li class="login-item">
                           <a href="{{ route('public.account.login') }}"><i class="fas fa-sign-in-alt"></i>  {{ __('Login') }}</a>
                        </li>
                        @endif
                     </ul>
                     @if (auth('account')->check())
                     <form id="logout-form" action="{{ route('public.account.logout') }}" method="POST" style="display: none;">
                        @csrf
                     </form>
                     @endif
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <?php 
      if (Route::getCurrentRoute()->uri() == '/')
      {
          // You're on the root route
      }
      else
      { ?>
   <div class="row">
      <div class="col-12">
         <nav class="navbar navbar-expand-lg navbar-light">
            @if (theme_option('logo'))
            <a class="navbar-brand" href="{{ route('public.single') }}">
            <img src="{{ RvMedia::getImageUrl(theme_option('logo')) }}"
               class="logo" height="120" alt="{{ theme_option('site_name') }}">
            </a>
            @endif
            <button class="navbar-toggler" type="button" data-toggle="collapse"
               id="header-waypoint"                   data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
               aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end animation" id="navbarSupportedContent">
               <div class="main-menu-darken"></div>
               <div class="main-menu-content">
                  <div class="d-lg-none bg-primary p-2">
                     <span class="text-white">{{ __('Menu') }}</span>
                     <span class="float-right toggle-main-menu-offcanvas text-white">
                     <i class="far fa-times-circle"></i>
                     </span>
                  </div>
                  <div class="main-menu-nav d-lg-flex" style="margin-right: 65px;">
                     <!--  {!!
                        Menu::renderMenuLocation('main-menu', [
                            'options' => ['class' => 'navbar-nav justify-content-end menu menu--mobile'],
                            'view'    => 'main-menu',
                        ])
                        !!}-->
                     @if (is_plugin_active('real-estate') && RealEstateHelper::isRegisterEnabled())
                     <a class="btn btn-primary add-property" href="{{ route('public.account.properties.index') }}">
                     <i class="fas fa-plus-circle"></i> Post Your Property
                     </a>
                     <a class="btn btn-primary add-property" href="/postyourrequirement">
                     <i class="fas fa-plus-circle"></i> Post Your Requirement
                     </a>
                     <div  class="dropdowns" style="margin-top: 10px;" >
                        <button onclick="myFunction()" class="dropbtn btn ">
                           <div id="myDropdown" class="dropdown-content" >
                              {!!
                              Menu::renderMenuLocation('main-menu', [
                              'options' => ['class' => 'navbar-nav justify-content-end menu menu--mobile'],
                              'view'    => 'main-menu',
                              ])
                              !!}
                           </div>
                           <i class="fas fa-align-justify fa-2x"  onclick="myFunction()"  style="color: black;" aria-hidden="true"></i>
                        </button>
                     </div>
                     @endif
                     <div class="d-sm-none">
                        <div>
                           @if (is_plugin_active('real-estate'))
                           <ul class="topbar-items d-block">
                              <li class="login-item">
                                 <a href="{{ route('public.wishlist') }}"><i class="fas fa-heart"></i> {{ __('Wishlist') }}(<span class="wishlist-count">0</span>)</a>
                              </li>
                           </ul>
                           @if (count($currencies) > 1)
                           <div class="language">
                              <div class="language-switcher-wrapper">
                                 <div class="d-inline-block language-label">
                                    {{ __('Currencies') }}:
                                 </div>
                                 <div class="dropdown d-inline-block">
                                    <button class="btn btn-secondary dropdown-toggle btn-select-language" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    {{ get_application_currency()->title }}
                                    </button>
                                    <ul class="dropdown-menu language_bar_chooser">
                                       @foreach ($currencies as $currency)
                                       <li>
                                          <a href="{{ route('public.change-currency', $currency->title) }}" @if (get_application_currency_id() == $currency->id) class="active" @endif><span>{{ $currency->title }}</span></a>
                                       </li>
                                       @endforeach
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           @endif
                           @endif
                           {!! Theme::partial('language-switcher') !!}
                           @if (is_plugin_active('real-estate'))
                           <ul class="topbar-items d-block">
                              @if (auth('account')->check())
                              <li class="login-item"><a href="{{ route('public.account.dashboard') }}" rel="nofollow"><i class="fas fa-user"></i> <span>{{ auth('account')->user()->name }}</span></a></li>
                              <li class="login-item"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" rel="nofollow"><i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</a></li>
                              @else
                              <li class="login-item">
                                 <a href="{{ route('public.account.login') }}"><i class="fas fa-sign-in-alt"></i>  {{ __('Login') }}</a>
                              </li>
                              @endif
                           </ul>
                           @if (is_plugin_active('real-estate') && auth('account')->check())
                           <form id="logout-form" action="{{ route('public.account.logout') }}" method="POST" style="display: none;">
                              @csrf
                           </form>
                           @endif
                           @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </nav>
      </div>
   </div>
   <?php 
      } ?>
   <!--<div @if (theme_option('enable_sticky_header', 'yes') == 'yes') id="header-waypoint" @endif class="main-header">
      <div class="container-fluid w90">
          <div class="row">
              <div class="col-12">
                  <nav class="navbar navbar-expand-lg navbar-light">
                      @if (theme_option('logo'))
                          <a class="navbar-brand" href="{{ route('public.single') }}">
                              <img src="{{ RvMedia::getImageUrl(theme_option('logo')) }}"
                                   class="logo" height="40" alt="{{ theme_option('site_name') }}">
                          </a>
                      @endif
                      <button class="navbar-toggler" type="button" data-toggle="collapse"
                              id="header-waypoint"                   data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                              aria-expanded="false" aria-label="Toggle navigation">
                          <span class="fas fa-bars"></span>
                      </button>
      
                      <div class="collapse navbar-collapse justify-content-end animation" id="navbarSupportedContent">
                          <div class="main-menu-darken"></div>
                          <div class="main-menu-content">
                              <div class="d-lg-none bg-primary p-2">
                                  <span class="text-white">{{ __('Menu') }}</span>
                                  <span class="float-right toggle-main-menu-offcanvas text-white">
                                      <i class="far fa-times-circle"></i>
                                  </span>
                              </div>
                              <div class="main-menu-nav d-lg-flex">
                                  {!!
                                      Menu::renderMenuLocation('main-menu', [
                                          'options' => ['class' => 'navbar-nav justify-content-end menu menu--mobile'],
                                          'view'    => 'main-menu',
                                      ])
                                  !!}
                                  @if (is_plugin_active('real-estate') && RealEstateHelper::isRegisterEnabled())
                                      <a class="btn btn-primary add-property" href="{{ route('public.account.properties.index') }}">
                                          <i class="fas fa-plus-circle"></i> {{ __('Add Property') }}
                                      </a>
                                  @endif
      
                                  <div class="d-sm-none">
                                      <div>
                                          @if (is_plugin_active('real-estate'))
                                              <ul class="topbar-items d-block">
                                                  <li class="login-item">
                                                      <a href="{{ route('public.wishlist') }}"><i class="fas fa-heart"></i> {{ __('Wishlist') }}(<span class="wishlist-count">0</span>)</a>
                                                  </li>
                                              </ul>
                                              @if (count($currencies) > 1)
                                                  <div class="language">
                                                      <div class="language-switcher-wrapper">
                                                          <div class="d-inline-block language-label">
                                                              {{ __('Currencies') }}:
                                                          </div>
                                                          <div class="dropdown d-inline-block">
                                                              <button class="btn btn-secondary dropdown-toggle btn-select-language" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                                  {{ get_application_currency()->title }}
                                                              </button>
                                                              <ul class="dropdown-menu language_bar_chooser">
                                                                  @foreach ($currencies as $currency)
                                                                      <li>
                                                                          <a href="{{ route('public.change-currency', $currency->title) }}" @if (get_application_currency_id() == $currency->id) class="active" @endif><span>{{ $currency->title }}</span></a>
                                                                      </li>
                                                                  @endforeach
                                                              </ul>
                                                          </div>
                                                      </div>
                                                  </div>
                                              @endif
                                          @endif
                                          {!! Theme::partial('language-switcher') !!}
                                          @if (is_plugin_active('real-estate'))
                                              <ul class="topbar-items d-block">
                                                  @if (auth('account')->check())
                                                      <li class="login-item"><a href="{{ route('public.account.dashboard') }}" rel="nofollow"><i class="fas fa-user"></i> <span>{{ auth('account')->user()->name }}</span></a></li>
                                                      <li class="login-item"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" rel="nofollow"><i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</a></li>
                                                  @else
                                                      <li class="login-item">
                                                          <a href="{{ route('public.account.login') }}"><i class="fas fa-sign-in-alt"></i>  {{ __('Login') }}</a>
                                                      </li>
                                                  @endif
                                              </ul>
                                              @if (is_plugin_active('real-estate') && auth('account')->check())
                                                  <form id="logout-form" action="{{ route('public.account.logout') }}" method="POST" style="display: none;">
                                                      @csrf
                                                  </form>
                                              @endif
                                          @endif
                                      </div>
                                  </div>
                              </div>
                          </div>
      
                      </div>
                  </nav>
              </div>
          </div>
      </div>
      </div !-->
   @php
   $page = Theme::get('page');
   @endphp
   @if (is_plugin_active('real-estate') && url()->current() == route('public.single') || ($page && $page->template === 'homepage'))
   @php
   $categories = get_property_categories(['indent' => '↳', 'conditions' => ['status' => \Botble\Base\Enums\BaseStatusEnum::PUBLISHED]]);
   @endphp
   <div class="home_banner" style="background-image: url({{ theme_option('home_banner') ? RvMedia::getImageUrl(theme_option('home_banner')) : Theme::asset()->url('images/banner.jpg') }})">
      <div class="row">
         <div class="col-12">
            <nav class="navbar navbar-expand-lg navbar-light">
               @if (theme_option('logo'))
               <a class="navbar-brand" href="{{ route('public.single') }}">
               <img src="{{ RvMedia::getImageUrl(theme_option('logo')) }}"
                  class="logo" height="150" alt="{{ theme_option('site_name') }}">
               </a>
               @endif
               <button class="navbar-toggler" type="button" data-toggle="collapse"
                  id="header-waypoint"                   data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                  aria-expanded="false" aria-label="Toggle navigation">
               <span class="fas fa-bars"></span>
               </button>
               <div class="collapse navbar-collapse justify-content-end animation" id="navbarSupportedContent">
                  <div class="main-menu-darken"></div>
                  <div class="main-menu-content">
                     <div class="d-lg-none bg-primary p-2">
                        <span class="text-white">{{ __('Menu') }}</span>
                        <span class="float-right toggle-main-menu-offcanvas text-white">
                        <i class="far fa-times-circle"></i>
                        </span>
                     </div>
                     <div class="main-menu-nav d-lg-flex" style="margin-right: 65px;">
                        <!--  {!!
                           Menu::renderMenuLocation('main-menu', [
                               'options' => ['class' => 'navbar-nav justify-content-end menu menu--mobile'],
                               'view'    => 'main-menu',
                           ])
                           !!}-->
                        @if (is_plugin_active('real-estate') && RealEstateHelper::isRegisterEnabled())
                        <a class="btn btn-primary add-property" href="{{ route('public.account.properties.index') }}">
                        <i class="fas fa-plus-circle"></i> Post Your Property
                        </a>
                        <a class="btn btn-primary add-property" href="/postyourrequirement">
                        <i class="fas fa-plus-circle"></i> Post Your Requirement
                        </a>
                        <div  class="dropdowns" style="margin-top: 10px;" >
                           <button onclick="myFunction()" class="dropbtn btn ">
                              <div id="myDropdown" class="dropdown-content" >
                                 {!!
                                 Menu::renderMenuLocation('main-menu', [
                                 'options' => ['class' => 'navbar-nav justify-content-end menu menu--mobile'],
                                 'view'    => 'main-menu',
                                 ])
                                 !!}
                              </div>
                              <i class="fas fa-align-justify fa-2x"  onclick="myFunction()"  style="color: black;" aria-hidden="true"></i>
                           </button>
                        </div>
                        @endif
                        <div class="d-sm-none">
                           <div>
                              @if (is_plugin_active('real-estate'))
                              <ul class="topbar-items d-block">
                                 <li class="login-item">
                                    <a href="{{ route('public.wishlist') }}"><i class="fas fa-heart"></i> {{ __('Wishlist') }}(<span class="wishlist-count">0</span>)</a>
                                 </li>
                              </ul>
                              @if (count($currencies) > 1)
                              <div class="language">
                                 <div class="language-switcher-wrapper">
                                    <div class="d-inline-block language-label">
                                       {{ __('Currencies') }}:
                                    </div>
                                    <div class="dropdown d-inline-block">
                                       <button class="btn btn-secondary dropdown-toggle btn-select-language" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                       {{ get_application_currency()->title }}
                                       </button>
                                       <ul class="dropdown-menu language_bar_chooser">
                                          @foreach ($currencies as $currency)
                                          <li>
                                             <a href="{{ route('public.change-currency', $currency->title) }}" @if (get_application_currency_id() == $currency->id) class="active" @endif><span>{{ $currency->title }}</span></a>
                                          </li>
                                          @endforeach
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              @endif
                              @endif
                              {!! Theme::partial('language-switcher') !!}
                              @if (is_plugin_active('real-estate'))
                              <ul class="topbar-items d-block">
                                 @if (auth('account')->check())
                                 <li class="login-item"><a href="{{ route('public.account.dashboard') }}" rel="nofollow"><i class="fas fa-user"></i> <span>{{ auth('account')->user()->name }}</span></a></li>
                                 <li class="login-item"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" rel="nofollow"><i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}</a></li>
                                 @else
                                 <li class="login-item">
                                    <a href="{{ route('public.account.login') }}"><i class="fas fa-sign-in-alt"></i>  {{ __('Login') }}</a>
                                 </li>
                                 @endif
                              </ul>
                              @if (is_plugin_active('real-estate') && auth('account')->check())
                              <form id="logout-form" action="{{ route('public.account.logout') }}" method="POST" style="display: none;">
                                 @csrf
                              </form>
                              @endif
                              @endif
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </nav>
         </div>
      </div>
      <div class="topsearch">
         @if (theme_option('home_banner_description'))
         <h1 class="text-center text-white mb-4 banner-text-description">{{ theme_option('home_banner_description') }}</h1>
         @endif
         <form @if (theme_option('enable_search_projects_on_homepage_search', 'yes') == 'yes') action="{{ route('public.projects') }}" @else action="{{ route('public.properties') }}" @endif method="GET" id="frmhomesearch">
         <div class="typesearch" id="hometypesearch">
            @if (theme_option('enable_search_projects_on_homepage_search', 'yes') == 'yes')
            <a href="javascript:void(0)" class="active" rel="project" data-url="{{ route('public.projects') }}">{{ __('Projects') }}</a>
            @endif
            <a href="javascript:void(0)" rel="sale" @if (theme_option('enable_search_projects_on_homepage_search', 'yes') != 'yes') class="active" @endif data-url="{{ route('public.properties') }}">Buy</a>
            <a href="javascript:void(0)" rel="rent" data-url="{{ route('public.properties') }}">{{ __('Rent') }}</a>
            <a href="javascript:void(0)" rel="lease" data-url="{{ route('public.properties') }}">Lease</a>
            <a href="javascript:void(0)" rel="vacation_property" data-url="{{ route('public.properties') }}">Vacation Property</a>
         </div>
         <div class="input-group input-group-lg">
            <input type="hidden" name="type" @if (theme_option('enable_search_projects_on_homepage_search', 'yes') == 'yes') value="project" @else value="sale" @endif id="txttypesearch">
            <div class="input-group-prepend">
               <span class="input-group-text"><i class="far fa-search"></i></span>
            </div>
            <div class="keyword-input">
               <input type="text" class="form-control" name="k" placeholder="{{ __('Enter keyword...') }}" id="txtkey" autocomplete="off">
               <div class="spinner-icon">
                  <i class="fas fa-spin fa-spinner"></i>
               </div>
            </div>
            <div class="input-group-prepend">
               <span class="input-group-text"><i class="far fa-location"></i></span>
            </div>
            <div class="location-input" data-url="{{ route('public.ajax.cities') }}">
               <input type="hidden" name="city_id">
               <input class="select-city-state form-control" name="location" value="{{ request()->input('location') }}" placeholder="{{ __('City, State') }}" autocomplete="off">
               <div class="spinner-icon">
                  <i class="fas fa-spin fa-spinner"></i>
               </div>
               <div class="suggestion">
               </div>
            </div>
            <div class="input-group-append search-button-wrapper">
               <button class="btn btn-orange" type="submit">{{ __('Search') }}</button>
            </div>
            <div class="advanced-search d-sm-block">
               <!-- a href="#" class="advanced-search-toggler">{{ __('Advanced') }} <i class="fas fa-caret-down"></i></a>
                  !-->                      
               <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#advanceexampleModal">
               Advance search                                                             
               </button>
               <div class="advanced-search-content property-advanced-search">
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-3 col-sm-6 pr-md-1">
                           {!! Theme::partial('real-estate.filters.categories', compact('categories')) !!}
                        </div>
                        <div class="col-md-3 col-sm-6 px-md-1">
                           {!! Theme::partial('real-estate.filters.bedroom') !!}
                        </div>
                        <div class="col-md-3 col-sm-6 px-md-1">
                           {!! Theme::partial('real-estate.filters.bathroom') !!}
                        </div>
                        <div class="col-md-3 col-sm-6 pl-md-1">
                           {!! Theme::partial('real-estate.filters.floor') !!}
                        </div>
                        <div class="col-md-6">
                           {!! Theme::partial('real-estate.filters.price') !!}
                        </div>
                     </div>
                  </div>
               </div>
               <div class="advanced-search-content  project-advanced-search">
                  <div class="form-group">
                     <div class="row">
                        <div class="col-md-4 col-sm-6 pr-md-1">
                           {!! Theme::partial('real-estate.filters.categories', compact('categories')) !!}
                        </div>
                        <div class="col-md-4 col-sm-6 px-md-1">
                           {!! Theme::partial('real-estate.filters.bedroom') !!}
                        </div>
                        <div class="col-md-4 col-sm-6 px-md-1">
                           {!! Theme::partial('real-estate.filters.bathroom') !!}
                        </div>
                        <div class="col-md-6 col-sm-6 pl-md-1">
                           {!! Theme::partial('real-estate.filters.floor') !!}
                        </div>
                        <!-- div class="col-md-4">
                           {!! Theme::partial('real-estate.filters.categories', compact('categories')) !!}
                           </div !-->
                        <div class="col-md-6">
                           {!! Theme::partial('real-estate.filters.price') !!}
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="listsuggest">
         </div>
         </form>

                                        


      </div>
   </div>
   

    

<div class="modal fade" id="advanceexampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
   <div class="modal-content">
      <form @if (theme_option('enable_search_projects_on_homepage_search', 'yes') == 'yes') action="{{ route('public.projects') }}" @else action="{{ route('public.properties') }}" @endif method="GET" id="frmhomesearch">
      <div class="modal-header">
         <h5 class="modal-title" id="exampleModalLabel">Advance Searchbox</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
      </div>
      <div class="col-md-12">
         <label for= "sel1" class="form-label">Property type</label>
         <select class="form-control" id="type" name="type">
            <option value="sale">Sale</option>
            <option value="rent">Rent</option>
            <option value="lease">lease</option>
            <option value="vacation_property">Vacation Property</option>
         </select>
      </div>
      <div class="col-md-12">
         <label for="sel1" class="form-label">Search</label>
         <input type="text" class="form-control" name="k" placeholder="{{ __('Enter keyword...') }}" id="txtkey" autocomplete="off">
      </div>
      <div class="col-md-12">
         <label for="sel1" class="form-label">City</label>
         <div class="location-input" data-url="{{ route('public.ajax.cities') }}">
            <input type="hidden" name="city_id">
            <input class="select-city-state form-control" name="location" value="{{ request()->input('location') }}" placeholder="{{ __('City, State') }}" autocomplete="off">
            <div class="spinner-icon">
               <i class="fas fa-spin fa-spinner"></i>
            </div>
            <div class="suggestion">
            </div>
         </div>
      </div>
      <div class="col-md-12">
         {!! Theme::partial('real-estate.filters.bedroom') !!}
      </div>
      <div class="col-md-12">
         {!! Theme::partial('real-estate.filters.bathroom') !!}
      </div>
      <div class="col-md-12">
         {!! Theme::partial('real-estate.filters.floor') !!}
      </div>
      <div class="col-md-12">
         {!! Theme::partial('real-estate.filters.price') !!}
      </div>
      <div class="col-md-12" >
         <label class="text-uppercase  font-roboto regular">Posted Within</label>
         <select class="form-control" name="createdOn">
            <option value="">Select</option>
            <option value="1">Today</option>
            <option value="2">This week</option>
            <option value="8">This month</option>
            <option value="9">Last 3 Months</option>
            <option value="10">Last 6 Months</option>
         </select>
      </div>
      <div class="col-md-12" style="margin-top:10px;margin-bottom:10px;">
         <label for="select-type" class="control-label">
         Square range
         </label>
         <div class="dropdown">
            <button type="button" id="dropdownMenuSquare" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-secondary dropdown-toggle">
            <span>All squares</span>
            </button> 
            <div aria-labelledby="dropdownMenuSquare" class="dropdown-menu" style="min-width: 20em; position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, -2px, 0px);" x-placement="top-start">
               <div class="dropdown-item">
                  <div data-calc="[{&quot;number&quot;:0,&quot;label&quot;:&quot;__value__ m\u00b2&quot;}]" data-all="All squares" class="form-group min-max-input">
                     <div class="row">
                        <div class="col-5 pr-1">
                           <label for="min_square" class="control-label">Square from</label> 
                           <input type="number" name="min_square" id="min_square" value="" placeholder="From" step="10" min="0" class="form-control min-input"> 
                           <span class="position-absolute min-label"></span>
                        </div>
                        <div class="col-5 px-1">
                           <label for="max_square" class="control-label">Square to</label>
                           <input type="number" name="max_square" id="max_square" value="" placeholder="To" step="10" min="0" class="form-control max-input"> 
                           <span class="position-absolute max-label"></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <div class="input-group-append search-button-wrapper">
               <button class="btn btn-orange" type="submit">{{ __('Search') }}</button>
            </div>
         </div>
      </div>
   </div>
</div>

                   
s



   </div>


   


   @endif
   </header>
   <!-- Modal -->

   
   <script>
      /* When the user clicks on the button, 
      toggle between hiding and showing the dropdown content */
      function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
      }
      
      // Close the dropdown if the user clicks outside of it
      window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
          var dropdowns = document.getElementsByClassName("dropdown-content");
          var i;
          for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
              openDropdown.classList.remove('show');
            }
          }
        }
      }
   </script>
<!--<div></div>
    -->