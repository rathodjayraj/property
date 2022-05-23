
<style>
.dashboardmenu ul
{
  display: block !important;
}
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
  border: ;
  background-color: white;
}
.themecolornew
{
  background-color: #29283a;
}
.btn_header{
border-radius: 25px !important;
font-size: 15px !important;
margin-bottom: .8rem !important;
margin-left: 20px !important;
margin-top: .8rem !important;
padding: 10px 15px !important;
white-space: nowrap !important;
height: 50px !important;
background-color: #29283a !important;
width: 170px !important;
}

.nav{
    background-color: #29283a;
}

.font{
    color: aliceblue;
}
.home{
    margin-left: 70%;
}

.MAoverview{
    border: solid 1px #e1e1e1;
    background: #f9f9f9;
    height: 500px;
}
.nav-2{
    size: 50%;
}

.MAoverview ul{
    list-style: none;
    text-align:start;
    padding: 0;
    margin: 0;
}

.MAoverview li{
    margin-top: 22px;
}
.list{
    margin-left: 10%;
}

.name2{
    margin-top: -72%;
    margin-left: 26%;
}

.lastlogin h5{

    font-weight: 400;
}

.box2{
    border: solid 1px #e1e1e1;
    background: #f9f9f9;
    margin-top: -2%;
    margin-left: 27%;
    height: 345px;
    width: 408px;
}

.box2 h5{
    font-weight: 200;
    font-size: 1vw;
}

.rathod h4{
    margin-left: 100px;
}

.number ul{
    list-style: none;
    text-align: center;
    padding: 20px;
    margin: 0;
    
}

.number li{
    display: inline-block;
    margin-right: 25px;
    padding-top: 30px;
}


</style>
<style>
.dropbtn {
  color: white;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
/*  background-color: #2980B9;*/
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
  margin-top:30px;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

  .show {display: block;}
  </style>


    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700|Roboto:100,300,400,500,700|Poppins:300,700,500,400,600" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<nav class="navbar navbar-expand-md navbar-light bg-white bb b--black-10" >
  <div class="container">

        @if (theme_option('logo'))
          <a href="{{ url('/') }}"><img src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" alt="{{ theme_option('site_title') }}" height="100"></a>
        @else
          <div class="brand-container tc mr2 br2">
            <a class="navbar-brand b white ma0 pa0 dib w-100" href="{{ url('/') }}" title="{{ theme_option('site_title') }}">{{ ucfirst(mb_substr(theme_option('site_title'), 0, 1, 'utf-8')) }}</a>
          </div>
        @endif

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    
    <div class="collapse navbar-collapse center" id="navbarSupportedContent" > 
    <!-- Right Side Of Navbar -->
      <ul class="navbar-nav ml-auto my-2">
        <!-- Authentication Links -->
        @if (!auth('account')->check())
          <li>
            <a class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db" style="text-decoration: none; line-height: 32px;" href="{{ route('public.account.login') }}">
                <i class="fas fa-sign-in-alt"></i> {{ trans('plugins/real-estate::dashboard.login-cta') }}
            </a>
          </li>
          <li>
            <a class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db" style="text-decoration: none; line-height: 32px;" href="{{ route('public.account.register') }}">
                <i class="fas fa-user-plus"></i> {{ trans('plugins/real-estate::dashboard.register-cta') }}
            </a>
            </li>
        @else
          <!--li>
            <a class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db mr2" style="text-decoration: none; line-height: 32px;" href="{{ route('public.account.dashboard') }}" title="{{ trans('plugins/real-estate::dashboard.header_profile_link') }}">
              <span>
                <img src="{{ auth('account')->user()->avatar->url ? RvMedia::getImageUrl(auth('account')->user()->avatar->url, 'thumb') : auth('account')->user()->avatar_url }}" class="br-100 v-mid mr1" alt="{{ auth('account')->user()->name }}" style="width: 30px;">
                <span>{{ auth('account')->user()->name }}</span>
              </span>
            </a>
          </li !-->
          <!--<li>
              <a class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db mr2" style="text-decoration: none; line-height: 32px;" href="{{ route('public.account.settings') }}" title="{{ trans('plugins/real-estate::dashboard.header_settings_link') }}">
                  <i class="fas fa-cogs mr1"></i>{{ trans('plugins/real-estate::dashboard.header_settings_link') }}
              </a>
          </li !-->
          @if (RealEstateHelper::isEnabledCreditsSystem())
              <li>
                  <a class="btn btn-primary  btn_header" style="text-decoration: none; line-height: 32px;" href="{{ route('public.account.packages') }}" title="{{ trans('plugins/real-estate::account.credits') }}">
                      <i class="fa fa-credit-card mr1"></i>{{ trans('plugins/real-estate::account.buy_credits') }} <span class="badge badge-info">{{ auth('account')->user()->credits }} {{ trans('plugins/real-estate::account.credits') }}</span>
                  </a>
              </li>
          @endif

          {!! apply_filters(ACCOUNT_TOP_MENU_FILTER, null) !!}

          <li>  
              <a class="btn btn-primary  btn_header"  href="/postyourrequirement">
                  Post your Requirement
              </a>
          </li>
      
              @if (auth('account')->user()->canPost())
              <li>
                  <!--a class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db mr2" style="text-decoration: none; line-height: 32px;" href="{{ route('public.account.properties.create') }}" title="{{ trans('plugins/real-estate::account-property.write_property') }}">
                      <i class="far fa-edit mr1"></i>{{ trans('plugins/real-estate::account-property.write_property') }}
                  </a>-->
                  <a class="btn btn-primary  btn_header"   title="{{ trans('plugins/real-estate::account-property.properties') }}" href="/"><i class="fa fa-plus-circle"></i> Add Property</a>

              </li>
              <li>
              <div  class="dropdown">
              <button onclick="myFunction2()" class="dropbtn btn btn-primary  btn_header">
              <div id="myDropdown" class="dropdown-content" style="background-color:white;">
                  <a href="/account/dashboard" >{{ auth('account')->user()->name }}</a>
                  <a href="{{ route('public.account.settings') }}">My Account</a>
                  <a href="/account/properties">My Properties </a>
                  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout  </a>
                  <form id="logout-form" action="{{ route('public.account.logout') }}" method="POST" style="display: none;">
                          @csrf
                        </form>
              </div>    
              <img src="{{ auth('account')->user()->avatar->url ? RvMedia::getImageUrl(auth('account')->user()->avatar->url, 'thumb') : auth('account')->user()->avatar_url }}" class="br-100 v-mid mr1" alt="{{ auth('account')->user()->name }}" style="width: 30px;">
                {{ auth('account')->user()->name }} <i class="fa fa-caret-down" aria-hidden="true"></i></button>
            
              </div>
              <div  class="dropdown" >
									  <button onclick="myFunction()" class="dropbtn" style="background-color:white;">
											<div id="myDropdown2" class="dropdown-content dashboardmenu" style="background-color: white;">
									

												{!!
																Menu::renderMenuLocation('main-menu', [
																	'options' => ['class' => 'navbar-nav justify-content-end menu menu--mobile'],
																	'view'    => 'main-menu',
																])
															!!}
											</div>    <i class="fas fa-align-justify fa-2x"  onclick="myFunction()"  style="color: black;" aria-hidden="true"></i></button>
												
									</div>
            
            
            </li>
              @endif
          <!--li>
            <a class="no-underline mr2 black-50 hover-black-70 pv1 ph2 db" style="text-decoration: none; line-height: 32px;" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="{{ trans('plugins/real-estate::dashboard.header_logout_link') }}">
              <i class="fas fa-sign-out-alt mr1"></i><span class="dn-ns">{{ trans('plugins/real-estate::dashboard.header_logout_link') }}</span>
            </a>
            <form id="logout-form" action="{{ route('public.account.logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
           
          </li !-->
        @endguest
      </ul>
      
    </div>
  </div>
</nav>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown2").classList.toggle("show");
}
function myFunction2()
{
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
<script src="{{ asset('vendor/core/plugins/real-estate/js/app.js') }}"></script>
