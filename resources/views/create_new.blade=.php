
@include('plugins/real-estate::account.layouts.skeleton')
<link href="{{ url('/') }}/themes/flex-home/css/h.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="{{ url('/') }}/themes/flex-home/css/auto_renew.css">
<link rel="shortcut icon" href="https://assets.helloaddress.com/ui/build/images/favicon.ico" />
<link rel="manifest" href="/manifest.json">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700|Roboto:100,300,400,500,700|Poppins:300,700,500,400,600" rel="stylesheet">
 
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
section.postWrapper img{
height: 50px;

}
.pv4-ns
{
	display: none;
}
#navbarSupportedContent
	{
	  margin-left: 100px !important;
	}
</style>



@section('content')

<section class="green-strip-wrapper" style="background-color: #29283a;padding: 0px 0;margin-top: 15px;">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 page-title">
            <h1 class="font-nunito regular">Property Info</h1>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 page-breadcumb hidden-sm hidden-xs">
            <br>
			<ul class="font-roboto regular">
              <li class="breadcrumb-item"><a href="{{ route('public.index') }}" title="Home">Home</a></li>
              <li class="breadcrumb-item"><a href="/account/dashboard">My Account</a></li>
              <li class="breadcrumb-item"><a>Property Info</a></li>
            </ul>
          </div>
        </div>
      </div>
</section>

<section class="postWrapper clearfix ">
      <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 brtop-30 brbottom-30">
          <div class="clearfix lhs-post-links border-radius-3">
            <div class="clearfix col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="clearfix brtop-20">
                <h3 class="font-nunito semi-bold text-uppercase">Completion Status</h3>
              </div>
              <div class="progress">
                <div class="progress-bar property-step-progress-bar" role="progressbar" style="width: 14%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">14%</div>
              </div>
              <p class="font-roboto light clearfix brtop-10"><span class="progress-info-ico"></span><span class="progress-info">Please Complete your profile for more response</span></p>
            </div>
            <div class="expand text-center col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <a href="#" class="font-roboto regular "> Navigation</a>
            </div>
            <div class="clearfix col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="row swMain">
                <ul class="font-roboto light">
                  <li>
                    <a href="#" onclick="toggle_visibility('step-1');" >
                    <span class="post-link-ico"></span>
                    Basic       
                    <span class="completed-tick"></span>  </a>
                  </li>
                  <li>
                    <a href="#" onclick="toggle_visibility('step-2');">
                    <span class="post-link-ico"></span>
                    Location                                                                                            </a>
                  </li>
                  <li >
                    <a href="#" onclick="toggle_visibility('step-3');">
                    <span class="post-link-ico"></span>
                    Profile                                                                                            </a>
                  </li>
                  <li>
                    <a href="#" onclick="toggle_visibility('step-4');">
                    <span class="post-link-ico"></span>
                    Details                                                                                            </a>
                  </li>
                  <li>
                    <a href="#" onclick="toggle_visibility('step-5');">
                    <span class="post-link-ico"></span>
                    Amenities                                                                                            </a>
                  </li>
                  <li >
                    <a href="#" onclick="toggle_visibility('step-6');">
                    <span class="post-link-ico"></span>
                    Distance From                                                                                            </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div  id="step-1" class="col-lg-9 col-md-8 col-sm-12 col-xs-12 rhs-post brtop-30 brbottom-30" >
          <h3 class="font-nunito regular brbottom-40">Basic Info</h3>
          <div class="row font-roboto regular">
            <form role="form" name="myform" id="form-basic-info" autocomplete="off" method="post" action="" class="form" enctype="multipart/form-data">
              <input type="hidden"  name="csrf-token" value="{{ csrf_token() }}">
              @csrf
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field-wrap">
                <label class="text-uppercase brbottom-20 el-required">Post Property In</label><br>
                <div class="radio radio-inline">
                  <input type="radio" class="radioInline" value="EN" name="language" id="languageEN" data-el-name="language"
                    checked="checked">
                  <label for="languageEN">English</label>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 brtop-30 field-wrap property-type-list">
                <label class="text-uppercase el-required">Property Type</label><br>
                <div class="row">
                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 brtop-20">
                    <div class="property-type border-radius-3 clearfix text-center hover-click " data-el-name="property-type">
                      <input class="hide" type="radio" value="8" id="propertyTypeRA" name="propertyType" required>
                      <a href="javascript:void(0);"></a>
                      <img src="images/h1.svg" alt="Residential Apartment" style="width:50px;">
                      <p class="font-roboto light">Residential Apartment</p>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 brtop-20">
                    <div class="property-type border-radius-3 clearfix text-center hover-click " data-el-name="property-type">
                      <input class="hide" type="radio" value="9" id="propertyTypeRH" name="propertyType" >
                      <a href="javascript:void(0);"></a>
                      <img src="images/h2.svg" style="width:50px;" alt="Residential House/Villa">
                      <p class="font-roboto light">Residential House/Villa</p>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 brtop-20">
                    <div class="property-type border-radius-3 clearfix text-center hover-click " data-el-name="property-type">
                      <input class="hide" type="radio" value="10" id="propertyTypeRL" name="propertyType" >
                      <a href="javascript:void(0);"></a>
                      <img src="images/h3.svg" style="width:50px;" alt="Residential Land">
                      <p class="font-roboto light">Residential Land</p>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 brtop-20">
                    <div class="property-type border-radius-3 clearfix text-center hover-click " data-el-name="property-type">
                      <input class="hide" type="radio" value="11" id="propertyTypeRO" name="propertyType">
                      <a href="javascript:void(0);"></a>
                      <img src="images/h4.svg" style="width:50px;" alt="Residential Other">
                      <p class="font-roboto light">Residential Other</p>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 brtop-20">
                    <div class="property-type border-radius-3 clearfix text-center hover-click " data-el-name="property-type">
                      <input class="hide" type="radio" value="12" id="propertyTypeCS" name="propertyType">
                      <a href="javascript:void(0);"></a>
                      <img src="images/h5.svg" style="width:50px;" alt="Commercial Shop">
                      <p class="font-roboto light">Commercial Shop</p>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 brtop-20">
                    <div class="property-type border-radius-3 clearfix text-center hover-click " data-el-name="property-type">
                      <input class="hide" type="radio" value="13" id="propertyTypeCF" name="propertyType">
                      <a href="javascript:void(0);"></a>
                      <img src="images/h6.svg" style="width:50px;" alt="Commercial Office">
                      <p class="font-roboto light">Commercial Office</p>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 brtop-20">
                    <div class="property-type border-radius-3 clearfix text-center hover-click " data-el-name="property-type">
                      <input class="hide" type="radio" value="14" id="propertyTypeCL" name="propertyType">
                      <a href="javascript:void(0);"></a>
                      <img src="images/h7.svg" style="width:50px;" alt="Commercial Land">
                      <p class="font-roboto light">Commercial Land</p>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 brtop-20">
                    <div class="property-type border-radius-3 clearfix text-center hover-click " data-el-name="property-type">
                      <input class="hide" type="radio" value="15" id="propertyTypeCB" name="propertyType">
                      <a href="javascript:void(0);"></a>
                      <img src="images/h6.svg" style="width:50px;" alt="Commercial Building">
                      <p class="font-roboto light">Commercial Building</p>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 brtop-20">
                    <div class="property-type border-radius-3 clearfix text-center hover-click " data-el-name="property-type">
                      <input class="hide" type="radio" value="16" id="propertyTypeCO" name="propertyType">
                      <a href="javascript:void(0);"></a>
                      <img src="images/h8.svg" style="width:50px;" alt="Commercial Other">
                      <p class="font-roboto light">Commercial Other</p>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 brtop-20">
                    <div class="property-type border-radius-3 clearfix text-center hover-click " data-el-name="property-type">
                      <input class="hide" type="radio" value="17" id="propertyTypeIB" name="propertyType">
                      <a href="javascript:void(0);"></a>
                      <img src="images/h10.svg" style="width:50px;" alt="Industrial Building">
                      <p class="font-roboto light">Industrial Building</p>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 brtop-20">
                    <div class="property-type border-radius-3 clearfix text-center hover-click " data-el-name="property-type">
                      <input class="hide" type="radio" value="18" id="propertyTypeIL" name="propertyType">
                      <a href="javascript:void(0);"></a>
                      <img src="images/h10.svg" style="width:50px;" alt="Industrial Land">
                      <p class="font-roboto light">Industrial Land</p>
                    </div>
                  </div>
                  <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 brtop-20">
                    <div class="property-type border-radius-3 clearfix text-center hover-click " data-el-name="property-type">
                      <input class="hide" type="radio" value="19" id="propertyTypeAL" name="propertyType">
                      <a href="javascript:void(0);"></a>
                      <img src="images/h11.svg" style="width:50px;" alt="Agricultural Land">
                      <p class="font-roboto light">Agricultural Land</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 brtop-30">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 brtop-20 field-wrap">
                    <label class="text-uppercase brbottom-20 el-required">Transaction Type</label><br>
                    <div class="radio radio-inline">
                      <input type="radio" value="S" id="transactionTypeS" name="transactionType" data-el-name="transaction-type" class="required">
                      <label for="transactionTypeS">Sell</label>
                    </div>
                    <div class="radio radio-inline">
                      <input type="radio" value="R" id="transactionTypeR" name="transactionType" data-el-name="transaction-type" class="required">
                      <label for="transactionTypeR">Rent</label>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 brtop-20 field-wrap">
                    <div class="form-group mb-3">
                      <label for="auto_renew" class="control-label">Renew automatically (you will be charged again in 45 days)?</label>
                      <div class="onoffswitch">
                        <label class="switch">
                        <input type="hidden" name="auto_renew"  class="onoffswitch-checkbox required"value="0">
                        <input type="checkbox" name="auto_renew" class="onoffswitch-checkbox required" value="1">
                        <span class="slider round"></span>
                        </label> 
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 brtop-30">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 brtop-20" data-el-name="section-price">
                    <label class="text-uppercase brbottom-20 el-required" for="totalPrice">Property Title</label><br>
                    <div class="form-group field-wrap">
                      <input type="text"  class="form-control"  id="property_title" name="property_title" />
                    </div>
				        </div>
				
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 brtop-20" data-el-name="section-price">
                    <label class="text-uppercase brbottom-20 el-required"  for="totalPrice">Price</label><br>
                    <div class="form-group field-wrap">
					            <input type="text"  class="form-control"  id="totalPrice" name="totalPrice" placeholder="Enter Only Number"onkeypress="return isNumber(event)" />
                    </div>
                  </div>
               </div>
				
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 brtop-20">
                <div class="form-group field-wrap">
                  <label class="text-uppercase brbottom-10 el-required" for="propertyDescription">
                  Property Description                                        </label>
                  <textarea class="form-control verticalResize" rows="7" id="propertyDescription" name="propertyDescription"></textarea>
                  <span class="font-roboto light field-info">
                  Minimum 50 and Maximum 2000 characters </span>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="button" id="submit-data_1" onclick="toggle_visibility('step-2')"  class="btn btn-large yellow-btn font-roboto light brbottom-30">Save &amp; Continue</button>
              </div>
              {{-- 
            </form>
            --}}
          </div>
        </div>
        <div id="step-2" class="col-lg-9 col-md-8 col-sm-12 col-xs-12 rhs-post brtop-30 brbottom-30" style="display:none;">
          <h3 class="font-nunito regular brbottom-40">Location</h3>
          <div class="row font-roboto regular">
           
			  <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
			    <div class="form-group col-lg-8 col-md-8 col-sm-12 col-xs-12 field-wrap">
				  <label class="text-uppercase" for="street"> Street </label>
				  <input type="text"  class="form-control"  id="autocomplete" namae="mapvalue" oninput="DES1(this)" />
				  <input type="hidden" id="pickuplatitude" name="pickuplatitude" value="">
				  <input type="hidden" id="pickuplongitude" name="pickuplongitude" value="">
				</div>

      
        <?php $citylist = get_citylist();   ?> 
				<div class="form-group col-lg-4 col-md-4 col-sm-12 col-xs-12 field-wrap">
                  <label class="text-uppercase el-required" for="districtId">City</label>
                  <select class="form-control" name="district"  data-el-name="district" data-gmap-addr-donator="3">
					        <option value="">-- Select --</option>
                  <?php
                        foreach($citylist as $city)
                        { ?>
              
                         <option value="<?php  echo $city->id;  ?>" selected="selected"><?php  echo $city->name;  ?>  </option>
                  <?php } ?>
				  </select>
				</div>
			  </div>		
			  
										
				<div class="col-sm-12" id="map1" > 
								<div class="form-group">
                                
								    <div id="googleMap" style="width:100%;height:300px;"></div>
								</div>
				</div>		
							
             
              <div class="form-group mb-3" style="display:inline-flex;">
                <label for="images" class="control-label">
                  Images<br>
                  <p>Only 5 image select *</p>
                </label>
                <input id='files' name="image[]" type='file' style="border-bottom: none;" multiple/>
                <output id='result' />
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 brtop-20">
                <button type="button" onclick="toggle_visibility('step-3')" class="btn btn-large yellow-btn font-roboto light brbottom-30">Save &amp; Continue</button>
              </div>
            
          </div>
        </div>
     
        <div id="step-3" class="col-lg-9 col-md-8 col-sm-12 col-xs-12 rhs-post brtop-30 brbottom-30" style="display:none;">
          <h3 class="font-nunito regular brbottom-40">Profile</h3>
          <div class="row font-roboto regular">
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 field-wrap">
                <label class="text-uppercase el-required" for="emailAddress">Email Address</label>
                <input class="form-control" type="text" id="emailAddress" name="emailAddress" value="<?php if(isset(auth('account')->user()->email)){echo auth('account')->user()->email;} ?>" readonly>
              </div>
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                 <label class="text-uppercase el-required" for="emailAddress">Mobile Number</label>
                  <input class="form-control" type="text"value="<?php if(isset( auth('account')->user()->phone)){ echo auth('account')->user()->phone; } ?>" id="mobile1" name="mobile1">
              </div>

              <h3 class="font-nunito regular brbottom-40">Other Extra Detail</h3>

             <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 <div class="row err-static">
                    <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 field-wrap">
                      <label class="text-uppercase el-required" for=""> Email Address</label>
                      <input class="form-control" type="text" value="" id="confirmEmailAddress" name="confirmEmailAddress">
                    </div>
                    
                  </div>
                <div class="row err-static">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="row">
                      <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3">
                        <input class="form-control" maxlength="3" type="text" value="91" id="mobile2CountryCode" name="mobile2CountryCode">
                      </div>
                      <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 field-wrap">
                        <input class="form-control" type="text" value="" id="mobile2" name="mobile2">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 brtop-10 brbottom-20">
                        <div class="radio radio-inline">
                          <input type="radio" value="MOBILE2" name="primaryMobile" id="primaryMobile2">
                          <label for="primaryMobile2">SMS</label>
                        </div>
                       
                      </div>
                    </div>
                  </div>
                </div>
               
              </div>
            
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="button" onclick="toggle_visibility('step-4')" class="btn btn-large yellow-btn font-roboto light brbottom-30">Save &amp; Continue</button>
              </div>
           
          </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 rhs-post brtop-30 brbottom-30" id="step-4" style="display:none;">
          <h3 class="font-nunito regular brbottom-40">Details</h3>
          <div class="row font-roboto regular">
            {{--  
            <form role="form"  id="form-res-details" autocomplete="off" method="post" action="" novalidate="novalidate">
              --}}
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 field-wrap">
                <label class="text-uppercase el-required" for="builtArea">Built Area</label>
                <input class="form-control" type="text" value="" id="builtArea" name="builtArea">                                
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 field-wrap">
                <label class="text-uppercase el-required" for="builtAreaUnit">Built Area Unit</label>
                <select class="form-control" id="builtAreaUnit" name="builtAreaUnit">
                  <option value="">-- Select --</option>
                  <option value="SQT">Sq-ft</option>
                  <option value="SQM">Sq-m</option>
                  <option value="SQD">Sq-Yrd</option>
                </select>
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 field-wrap">
                <label class="text-uppercase el-required" for="plotArea">Plot Area</label>
                <input class="form-control" type="text" value="" id="plotArea" name="plotArea">
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 field-wrap">
                <label class="text-uppercase el-required" for="plotAreaUnit">Plot Area Unit</label>
                <select class="form-control" id="plotAreaUnit" name="plotAreaUnit">
                  <option value="">-- Select --</option>
                  <option value="SQT">Sq-ft</option>
                  <option value="SQM">Sq-m</option>
                  <option value="SQD">Sq-Yrd</option>
                  <option value="ACR">Acre</option>
                  <option value="BHA">Bigha</option>
                  <option value="HCR">Hectare</option>
                  <option value="MRL">Marla</option>
                  <option value="KNL">Kanal</option>
                  <option value="BW1">Biswa1</option>
                  <option value="BW2">Biswa2</option>
                  <option value="GRD">Ground</option>
                  <option value="AKM">Aankadam</option>
                  <option value="ROD">Rood</option>
                  <option value="CTK">Chatak</option>
                  <option value="KOH">Kottah</option>
                  <option value="CNT">Cent</option>
                  <option value="PRH">Perch</option>
                  <option value="GNA">Guntha</option>
                  <option value="ARE">Are</option>
                </select>
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 field-wrap">
                <label class="text-uppercase el-required" for="bedrooms">Bedrooms</label>
                <select class="form-control" id="bedrooms" name="bedrooms">
                  <option value="">-- Select --</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label class="text-uppercase" for="bathrooms">Bathrooms</label>
                <select class="form-control" id="bathrooms" name="bathrooms">
                  <option value="">-- Select --</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                </select>
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 field-wrap">
                <label class="text-uppercase el-required" for="constructedYear">Constructed Year</label>
                <select class="form-control" id="constructedYear" name="constructedYear" data-el-name="constructed-year">
                  <option value="">-- Select --</option>
                  <option value="1">Under Construction</option>
                  <option value="1950">1950</option>
                  <option value="1951">1951</option>
                  <option value="1952">1952</option>
                  <option value="1953">1953</option>
                  <option value="1954">1954</option>
                  <option value="1955">1955</option>
                  <option value="1956">1956</option>
                  <option value="1957">1957</option>
                  <option value="1958">1958</option>
                  <option value="1959">1959</option>
                  <option value="1960">1960</option>
                  <option value="1961">1961</option>
                  <option value="1962">1962</option>
                  <option value="1963">1963</option>
                  <option value="1964">1964</option>
                  <option value="1965">1965</option>
                  <option value="1966">1966</option>
                  <option value="1967">1967</option>
                  <option value="1968">1968</option>
                  <option value="1969">1969</option>
                  <option value="1970">1970</option>
                  <option value="1971">1971</option>
                  <option value="1972">1972</option>
                  <option value="1973">1973</option>
                  <option value="1974">1974</option>
                  <option value="1975">1975</option>
                  <option value="1976">1976</option>
                  <option value="1977">1977</option>
                  <option value="1978">1978</option>
                  <option value="1979">1979</option>
                  <option value="1980">1980</option>
                  <option value="1981">1981</option>
                  <option value="1982">1982</option>
                  <option value="1983">1983</option>
                  <option value="1984">1984</option>
                  <option value="1985">1985</option>
                  <option value="1986">1986</option>
                  <option value="1987">1987</option>
                  <option value="1988">1988</option>
                  <option value="1989">1989</option>
                  <option value="1990">1990</option>
                  <option value="1991">1991</option>
                  <option value="1992">1992</option>
                  <option value="1993">1993</option>
                  <option value="1994">1994</option>
                  <option value="1995">1995</option>
                  <option value="1996">1996</option>
                  <option value="1997">1997</option>
                  <option value="1998">1998</option>
                  <option value="1999">1999</option>
                  <option value="2000">2000</option>
                  <option value="2001">2001</option>
                  <option value="2002">2002</option>
                  <option value="2003">2003</option>
                  <option value="2004">2004</option>
                  <option value="2005">2005</option>
                  <option value="2006">2006</option>
                  <option value="2007">2007</option>
                  <option value="2008">2008</option>
                  <option value="2009">2009</option>
                  <option value="2010">2010</option>
                  <option value="2011">2011</option>
                  <option value="2012">2012</option>
                  <option value="2013">2013</option>
                  <option value="2014">2014</option>
                  <option value="2015">2015</option>
                  <option value="2016">2016</option>
                  <option value="2017">2017</option>
                  <option value="2018">2018</option>
                  <option value="2019">2019</option>
                  <option value="2020">2020</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                </select>
              </div>
              <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <label class="text-uppercase" for="readyToMove">Ready To Move</label><br>
                <div class="radio radio-inline">
                  <input type="radio" value="Yes" name="readyToMove" id="readyToMoveY" data-el-name="ready-to-move" checked="checked">
                  <label for="readyToMoveY">Yes</label>
                </div>
                <div class="radio radio-inline">
                  <input type="radio" value="No" name="readyToMove" id="readyToMoveN" data-el-name="ready-to-move" >
                  <label for="readyToMoveN">No</label>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="button" onclick="toggle_visibility('step-5')"  class="btn btn-large yellow-btn font-roboto light brbottom-30">Save &amp; Continue</button>
              </div>
              {{-- 
            </form>
            --}}
          </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 rhs-post brtop-30 brbottom-30" id="step-5" style="display:none;">
          <h3 class="font-nunito regular brbottom-40">Amenities</h3>
          <div class="row font-roboto regular">
            {{-- 
            <form role="form" id="form-amenities" autocomplete="off" method="post" action="https://www.helloaddress.com/nc/user/property/910448/amenities" novalidate="novalidate">
              --}}
              <?php  $Amenities=getfacilitylist(); 
              
              foreach($Amenities as $facility){
              $facility_id=$facility->id;  
              $name=$facility->name;
              $reference_type=$facility->reference_type;
              $meta_value=json_decode($facility->meta_value);
                
              if($reference_type == "Botble\RealEstate\Models\Feature")
              {
              ?>

              <div class="col-lg-4 col-md-6 col-sm-6 col-xs-6 brbottom-20">
                <div data-el-name="amenity" class="amenities-block clearfix border-radius-3 hover-click">
                  <input class="hide" type="checkbox" value="<?php echo $facility_id; ?>" name="features[]" id="electricityBackup" >
                  <a href="javascript:void(0);"></a>
                  <p class="font-roboto regular">
                    <img src="<?php echo URL::to('/').'/storage/'.$meta_value[0];?>" alt="<?php echo $name; ?>">  <?php echo $name; ?>                        
                  </p>
                </div>
              </div>
              <?php } } ?>

            
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <button type="button" onclick="toggle_visibility('step-6')" class="btn btn-large yellow-btn font-roboto light brbottom-30">Save &amp; Continue</button>
              </div>
              {{-- 
            </form>
            --}}
          </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 rhs-post brtop-30 brbottom-30" id="step-6" style="display:none;">
          <h3 class="font-nunito regular brbottom-40">Distance</h3>
          <div class="row font-roboto regular">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 brtop-20 distance-info">
              {{--  
              <form role="form" id="form-distance-from" autocomplete="off" method="post" action="https://www.helloaddress.com/nc/user/property/910448/distance-facilities" novalidate="novalidate">
                --}}

                 
                <?php  $facility_distance=getfacility(); 
              
              foreach($facility_distance as $distance){
              $facility_id=$distance->id;  
              $name=$distance->name;
              $reference_type=$distance->reference_type;
              $meta_value=json_decode($distance->meta_value);
                
              if($reference_type == "Botble\RealEstate\Models\Facility")
              { ?>


                <div class="row brbottom-30">
                  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center" >
                    <span title="<?php echo $name; ?>" ></span>
                    <img src="<?php echo URL::to('/').'/storage/'.$meta_value[0];?>" height="80">
                  </div>
                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
                    <input class="distance-range hide" type="text" data-el-name="distance" data-el-ref="<?php echo $name; ?>" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="0" style="display: none;" data="value: '0'" value="3">
                    <input class="distance-range hide" type="text" name="school[]" value="<?php echo $facility_id; ?>">
                    <input type="hidden" id="<?php echo $name; ?>" name="range[]" data-el-name="from-school" value="0">
                    <label><?php echo $name; ?></label>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <span class="distance-value" data-el-name="<?php echo $name; ?>">NIL </span>
                  </div>
                </div>


                <?php  } } ?>
    <div class="row brbottom-30">
                  <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 text-center" >
                    <span title="<?php echo $name; ?>" ></span>
                    <img src="<?php echo URL::to('/').'/storage/'.$meta_value[0];?>" height="80">
                  </div>
                  <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
                    <input class="distance-range hide" type="text" data-el-name="distance" data-el-ref="ss" data-slider-min="0" data-slider-max="100" data-slider-step="1" data-slider-value="50" style="display: none;" data="value: '50'" value="3">
                    <input class="distance-range hide" type="text" name="school[]" value="2">
                    <input type="hidden" id="<?php echo $name; ?>" name="range[]" data-el-name="from-school" value="50">
                    <label>"sdsds"</label>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <span class="distance-value" data-el-name="50">50</span>
                  </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <button type="button" id="submit_data" class="btn btn-large yellow-btn font-roboto light brbottom-30">Save &amp; Continue</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <a href="#" class="scrollup " aria-label="Scroll to top"></a>
    <div class='hide'>
      <div class='overlayad' href="#overlayad_content" id='overlayad_content'></div>
    </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHTzQTglvvz4cJyniIJoDw6NG0EDY7El0&libraries=places"></script>
    <script type="text/javascript">
      function toggle_visibility(id) {
             
        $("#step-1").css("display","none");
        $("#step-2").css("display","none");
        $("#step-3").css("display","none");
        $("#step-4").css("display","none");
        $("#step-5").css("display","none");
        $("#step-6").css("display","none");
         
        var e = document.getElementById(id);
        e.style.display = 'block';
       }
              
    </script>
    <script type="text/javascript" src="https://assets.helloaddress.com/ui/build/scripts/lib/library-82c12d7cb2.js"></script>
    <script type="text/javascript" src="https://assets.helloaddress.com/ui/build/scripts/lib/transliteration-73281adcf4.I.js"></script>
    <script type="text/javascript" src="https://assets.helloaddress.com/ui/build/scripts/property/manageProperty-7d125f00e6.js"></script>
    <script type="text/javascript" src="https://sdk.mmonline.io/js/lens-helloaddress.1.0-latest.js"></script>
    <script>
      $('#submit_data').on('click', function (e)
      {
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        
          var form = document.myform;
          var formData = new FormData(form);
          var url = "{{ route('create_new_property') }}";
          
          $.ajax({
              type: 'POST',
              url: url,
              processData: false,
              contentType: false,
              dataType: 'json',
              data: formData,
              dataSrc: "",
              success: function(data)
              {
                
              }
          });
      });
    </script>
    <script type="text/javascript" src="themes/flex-home/js/amenities.js"></script>
    <script type="text/javascript" src="themes/flex-home/js/multi_image.js"></script>
      
    <script>
      var input = document.getElementById('autocomplete');
      var autocomplete = new google.maps.places.Autocomplete(input);
	  
	  
	  
 $(document).ready(function(){
	  
var geocoder = new google.maps.Geocoder();
var address = $('#autocomplete').val();

var pickuplatitude = $("#pickuplatitude").val();
var pickuplongitude = $("#pickuplongitude").val();
  

var locations = [
      [  address , pickuplatitude, pickuplongitude]];

    var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 10,
      center: new google.maps.LatLng(pickuplatitude, pickuplongitude),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i <= locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

     	  
    }	 
});
	  
function DES1(val) {
 
var geocoder = new google.maps.Geocoder();
var address = $('#autocomplete').val();
var pickuplatitude = $("#pickuplatitude").val();
var pickuplongitude = $("#pickuplongitude").val();
  
var locations = [
      [  address , pickuplatitude, pickuplongitude]
    ];

    var map = new google.maps.Map(document.getElementById('googleMap'), {
      zoom: 10,
      center: new google.maps.LatLng(pickuplatitude, pickuplongitude),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i <= locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map
      });

      google.maps.event.addListener(marker, 'load', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
}	



function initialize() {
	 
var pickuplatitude = $("#pickuplatitude").val();
var pickuplongitude = $("#pickuplongitude").val();

      var myLatlng = new google.maps.LatLng(pickuplatitude, pickuplongitude);
      var myOptions = {
        zoom: 4,
        center: myLatlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      var map = new google.maps.Map(document.getElementById("googleMap"), myOptions);
	  var marker = new google.maps.Marker({position:myLatlng});
	marker.setMap(map);

    }

    function loadScript() {
      var script = document.createElement("script");
      script.type = "text/javascript";
      script.src = "http://maps.google.com/maps/api/js?sensor=false&callback=initialize&key=AIzaSyAHTzQTglvvz4cJyniIJoDw6NG0EDY7El0";
      document.body.appendChild(script);
    }

    window.onload = loadScript;


function myMap(site_latitude,site_longitude) {
var mapEl= document.getElementById('googleMap');	
var location=new google.maps.LatLng(site_latitude, site_longitude);
 var mapOpt = {
   zoom: 16,
   center:location,
    mapTypeId:google.maps.MapTypeId.ROADMAP
 }
var map = new google.maps.Map(mapEl, mapOpt);

var marker=new google.maps.Marker({
   position:location,
   map: map
	
  });

}	


google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('autocomplete'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
				var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();
				$("#pickuplatitude").val(latitude);
				$("#pickuplongitude").val(longitude);
		});
});


  
    </script>
	<script>
function isNumber(evt)
{
	evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}
</script>
  </body>
</html>