@extends('plugins/real-estate::account.layouts.skeleton')
@section('content')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="themes/flex-home/css/auto_renew.css">
    <link rel="manifest" href="/manifest.json">
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700|Roboto:100,300,400,500,700|Poppins:300,700,500,400,600" rel="stylesheet">
	<link href="themes/flex-home/css/h.css" rel="stylesheet" type="text/css" />
	<style>
	#navbarSupportedContent
	{
	  margin-left: 150px !important;
	}
	</style>   
  <div class="dashboard crop-avatar">
		<section class="green-strip-wrapper" style="background-color: #29283a;">
    <div class="container">
      <div class="row">
    
		  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 page-title">
				<h1 class="font-nunito regular">Post Your Requirement </h1>
			  </div>
			  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 page-breadcumb hidden-sm hidden-xs" style="top: 23px;">
				<ul class="font-roboto regular">
					<li class="breadcrumb-item">
					<a href="{{ route('public.index') }}" title="Home">Home</a>
					</li>
					<li class="breadcrumb-item">
					<a href="{{ route('public.account.dashboard') }}">My Account</a>
					</li>
					<li class="breadcrumb-item">
						<a>Post Your Requirement  </a>
					</li>
				</ul>
			  </div>
			</div>
		  
	</section>
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 rhs-post brbottom-30">
   <div class="clearfix inner-border padding-15">
      <div id="msgBox" class="alert-danger " style="display:none"><button data-dismiss="alert" class="close" type="button">×</button><span>&nbsp;</span></div>
      <div class="row font-roboto regular brtop-10">
         <form class="form-horizontal validate err-static" role="form" method="post" action="#" title="" name="myform">
          @csrf
          <input type="hidden" name="id" value="<?php if(isset($data)){ ?>{{ $data[0]->id }}<?php } ?>">
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 field-wrap">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label class="text-uppercase el-required" for="propertyType">Property Type</label>
                  <select class="form-control mandatory" name="propertyType" id="propertyType">
                     <option value="">Property Type</option>
                      @foreach($requirements as $propertytype)
                          <option value="{{ $propertytype->id }}" <?php if(isset($data)){  if($data[0]->property_type == $propertytype->id ){ echo "selected";} } ?>>{{ $propertytype->name }}</option>
                      @endforeach
                  </select>
               </div>
            </div>
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 field-wrap">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label class="text-uppercase el-required" for="transactionType">Transaction Type</label>
                  <select class="form-control mandatory" name="transactionType" id="transactionType">
                     <option value="" >Select</option>
                     <option value="B" <?php if(isset($data)){  if($data[0]->transaction_type){ echo "selected";} } ?>>Buy</option>
                     <option value="R" <?php if(isset($data)){  if($data[0]->transaction_type){ echo "selected";} } ?>>Rent</option>
                  </select>
               </div>
            </div>
           
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12" style="float:left;">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field-wrap">
                  <label for="totalPrice" class="text-uppercase el-required" id="label-total-price">Total Price</label>
                  <input class="form-control mandatory" type="text" name="totalPrice" value="<?php if(isset($data)) echo $data[0]->total_price ?>">
                  
               </div>
            </div>
         
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 field-wrap" >
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label class="text-uppercase el-required" for="reqName">Title</label>
                  <input class="form-control mandatory" maxlength="200" type="text" name="reqName" id="reqName" value="<?php if(isset($data)) echo $data[0]->title ?>">
                
               </div>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label class="text-uppercase" for="reqDescription">Property Description</label>
                  <textarea class="form-control" rows="3" name="reqDescription" id="reqDescription" ><?php if(isset($data)) echo $data[0]->property_description ?></textarea>
                  <span class="font-roboto light field-info">( Max 1000 characters ) Required approval from Admin</span>
               </div>
            </div>
			
            <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 d-line" style="top: 15px;">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <label class="text-uppercase">Property Posted By</label><br>
                  <div class="col-lg-6 col-md-6 col-sm-6 checkbox checkbox" style="padding-top: 0px;">
                     <input id="propertyPostedByO" type="checkbox" value="owner" <?php if(isset($data)){  if($data[0]->property_posted_by == 'owner') echo "checked"; }?> name="propertyPostedBy[]" style="margin-left: 0px;">
                     <label for="propertyPostedByO" style="padding-left: 20px;"> Owner</label>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 checkbox checkbox" style="padding-top: 0px; margin-left: -80px;">
                     <input id="propertyPostedByB" type="checkbox" value="builder" <?php if(isset($data)){  if($data[0]->property_posted_by == 'builder') echo "checked"; }?> name="propertyPostedBy[]" >
                     <label for="propertyPostedByB">  Builder </label>
                  </div>
               </div>
            </div>
            <?php if(isset($data)){  $data2 = explode('-',$data[0]->built_area); }  ?> 
            <div class="clearfix"></div>
            <div id="details_fields">
               <h3 class="headingLine"><b>Details</b></h3>
               <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12" id="built">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <label class="text-uppercase">Covered / Built Area</label><br>
                     <div class="col-sm-4 nopadding-left field-wrap">
                        <input class="form-control integer" type="text" value="<?php if(isset($data)){ echo $data2[0]; }?> " name="builtAreaMin" id="builtAreaMin" maxlength="8" placeholder="From">
                        <div id="builtMin"></div>
                     </div>
                     <div class="col-sm-4 field-wrap">
                        <input class="form-control integer" type="text" value="<?php if(isset($data)){ echo $data2[1]; }?>" name="builtAreaMax" id="builtAreaMax" maxlength="8" placeholder="To">
                        <div id="builtMax"></div>
                     </div>
                     <div class="col-sm-4">
                        <select class="form-control" name="builtAreaUnit" id="builtAreaUnit">
                           <option value="SQT" <?php if(isset($data)){ if( $data2[2] == "SQT"){ echo "selected"; } }?>>Sq-ft</option>
                           <option value="SQM"  <?php if(isset($data)){ if( $data2[2] == "SQM"){ echo "selected"; } }?>>Sq-m</option>
                           <option value="SQD"  <?php if(isset($data)){ if( $data2[2] == "SQD"){ echo "selected"; } }?>>Sq-Yd</option>
                        </select>
                        <div id="builtArea"></div>
                     </div>
                  </div>
               </div>
              
               <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <label class="text-uppercase">No of Bedrooms</label><br>
                     <select class="form-control" name="bedrooms" id="bedrooms">
                        <option value="0">Select</option>
                        <option value="1" <?php if(isset($data[0])){ if($data[0]->number_bedrooms == 1){ echo "selected";} }?>>1</option>
                        <option value="2" <?php if(isset($data)){ if($data[0]->number_bedrooms == 2){ echo "selected";} }?>>2</option>
                        <option value="3" <?php if(isset($data)){ if($data[0]->number_bedrooms == 3){ echo "selected";} }?>>3</option>
                        <option value="4" <?php if(isset($data)){ if($data[0]->number_bedrooms == 4){ echo "selected";} }?>>4</option>
                        <option value="5" <?php if(isset($data)){ if($data[0]->number_bedrooms == 5){ echo "selected";} }?>>5</option>
                        <option value="6" <?php if(isset($data)){ if($data[0]->number_bedrooms == 6){ echo "selected";} }?>>6</option>
                        <option value="7" <?php if(isset($data)){ if($data[0]->number_bedrooms == 7){ echo "selected";} }?>>7</option>
                        <option value="8" <?php if(isset($data)){ if($data[0]->number_bedrooms == 8){ echo "selected";} }?>>8</option>
                        <option value="9" <?php if(isset($data)){ if($data[0]->number_bedrooms == 9){ echo "selected";} }?>>9</option>
                        <option value="10" <?php if(isset($data)){ if($data[0]->number_bedrooms == 10){ echo "selected";} }?>>10</option>
                     </select>
                     <div id="bedroom"></div>
                  </div>
               </div>
               <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <label class="text-uppercase">No of Bathrooms</label><br>
                     <select class="form-control" name="bathrooms" id="bathrooms">
                        <option value="0">Select</option>
                        <option value="1" <?php if(isset($data[0])){ if($data[0]->number_bathrooms == 1){ echo "selected";} }?>>1</option>
                        <option value="2" <?php if(isset($data)){ if($data[0]->number_bathrooms == 2){ echo "selected";} }?>>2</option>
                        <option value="3" <?php if(isset($data)){ if($data[0]->number_bathrooms == 3){ echo "selected";} }?>>3</option>
                        <option value="4" <?php if(isset($data)){ if($data[0]->number_bathrooms == 4){ echo "selected";} }?>>4</option>
                        <option value="5" <?php if(isset($data)){ if($data[0]->number_bathrooms == 5){ echo "selected";} }?>>5</option>
                        <option value="6" <?php if(isset($data)){ if($data[0]->number_bathrooms == 6){ echo "selected";} }?>>6</option>
                        <option value="7" <?php if(isset($data)){ if($data[0]->number_bathrooms == 7){ echo "selected";} }?>>7</option>
                        <option value="8" <?php if(isset($data)){ if($data[0]->number_bathrooms == 8){ echo "selected";} }?>>8</option>
                        <option value="9" <?php if(isset($data)){ if($data[0]->number_bathrooms == 9){ echo "selected";} }?>>9</option>
                        <option value="10" <?php if(isset($data)){ if($data[0]->number_bathrooms == 10){ echo "selected";} }?>>10</option>
                     </select>
                     <div id="bathroom"></div>
                  </div>
               </div>
               <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <label class="text-uppercase">Age of Construction</label><br>
                     <select class="form-control" name="propertyAge" id="propertyAge">
                        <option value="0">Select</option>
                        <option value="-1" <?php if(isset($data)){ if($data[0]->construction == -1){ echo "selected";} }?>>Under construction</option>
                        <option value="1" <?php if(isset($data)){ if($data[0]->construction == 1){ echo "selected";} }?>>Newly Constructed</option>
                        <option value="2" <?php if(isset($data)){ if($data[0]->construction == 2){ echo "selected";} }?>>2-5 years</option>
                        <option value="3" <?php if(isset($data)){ if($data[0]->construction == 3){ echo "selected";} }?>>5+ years</option>
                     </select>
                     <div id="propertyAges"></div>
                  </div>
               </div>
               <?php if(isset($data)){ $datas = explode('-',$data[0]->floor); }?> 
               <div class="form-group col-lg-6 col-md-6 col-sm-12 col-xs-12 field-wrap" id="floor">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <label class="text-uppercase">Floor Number</label><br>
                     <div class="col-sm-6 nopadding-left">
                        <select class="form-control" name="floorNoFrom[]" id="floorNoFrom">
                           <option value="">From</option>
                           <option value="-1" <?php if(isset($datas[0])){ if($datas[0] == "-1"){ echo "selected"; } }?>>Basement</option>
                           <option value="0" <?php if(isset($datas[0])){ if($datas[0] == "0"){ echo "selected"; } }?>>Ground Floor</option>
                           <option value="1" <?php if(isset($data)){ if($datas[0] == "1"){ echo "selected"; } }?>>1</option>
                           <option value="2" <?php if(isset($data)){ if($datas[0] == "2"){ echo "selected"; } }?>>2</option>
                           <option value="3" <?php if(isset($data)){ if($datas[0] == "3"){ echo "selected"; } }?>>3</option>
                           <option value="4" <?php if(isset($data)){ if($datas[0] == "4"){ echo "selected"; } }?>>4</option>
                           <option value="5" <?php if(isset($data)){ if($datas[0] == "5"){ echo "selected"; } }?>>5</option>
                           <option value="6" <?php if(isset($data)){ if($datas[0] == "6"){ echo "selected"; } }?>>6</option>
                           <option value="7" <?php if(isset($data)){ if($datas[0] == "7"){ echo "selected"; } }?>>7</option>
                           <option value="8" <?php if(isset($data)){ if($datas[0] == "8"){ echo "selected"; } }?>>8</option>
                           <option value="9" <?php if(isset($data)){ if($datas[0] == "9"){ echo "selected"; } }?>>9</option>
                           <option value="10" <?php if(isset($data)){ if($datas[0] == "10"){ echo "selected"; } }?>>10</option>
                           <option value="11" <?php if(isset($data)){ if($datas[0] == "11"){ echo "selected"; } }?>>11</option>
                           <option value="12" <?php if(isset($data)){ if($datas[0] == "12"){ echo "selected"; } }?>>12</option>
                           <option value="13" <?php if(isset($data)){ if($datas[0] == "13"){ echo "selected"; } }?>>13</option>
                           <option value="14" <?php if(isset($data)){ if($datas[0] == "14"){ echo "selected"; } }?>>14</option>
                           <option value="15" <?php if(isset($data)){ if($datas[0] == "15"){ echo "selected"; } }?>>15</option>
                           <option value="16" <?php if(isset($data)){ if($datas[0] == "16"){ echo "selected"; } }?>>16</option>
                           <option value="17" <?php if(isset($data)){ if($datas[0] == "17"){ echo "selected"; } }?>>17</option>
                           <option value="18" <?php if(isset($data)){ if($datas[0] == "18"){ echo "selected"; } }?>>18</option>
                           <option value="19" <?php if(isset($data)){ if($datas[0] == "19"){ echo "selected"; } }?>>19</option>
                           <option value="20" <?php if(isset($data)){ if($datas[0] == "20"){ echo "selected"; } }?>>20</option>
                           <option value="21" <?php if(isset($data)){ if($datas[0] == "21"){ echo "selected"; } }?>>21</option>
                           <option value="22" <?php if(isset($data)){ if($datas[0] == "22"){ echo "selected"; } }?>>22</option>
                           <option value="23" <?php if(isset($data)){ if($datas[0] == "23"){ echo "selected"; } }?>>23</option>
                           <option value="24" <?php if(isset($data)){ if($datas[0] == "24"){ echo "selected"; } }?>>24</option>
                           <option value="25" <?php if(isset($data)){ if($datas[0] == "25"){ echo "selected"; } }?>>25</option>
                        </select>
                        <div id="floorFrom"></div>
                     </div>
                     <div class="col-sm-6">
                        <select class="form-control" name="floorNoFrom[]" id="floorNoTo">
                           <option value="">To</option>
                           <option value="0" <?php if(isset($data)){ if($datas[1] == "0"){ echo "selected"; } }?>>Ground Floor</option>
                           <option value="1" <?php if(isset($data)){ if($datas[1] == "1"){ echo "selected"; } }?>>1</option>
                           <option value="2" <?php if(isset($data)){ if($datas[1] == "2"){ echo "selected"; } }?>>2</option>
                           <option value="3" <?php if(isset($data)){ if($datas[1] == "3"){ echo "selected"; } }?>>3</option>
                           <option value="4" <?php if(isset($data)){ if($datas[1] == "4"){ echo "selected"; } }?>>4</option>
                           <option value="5" <?php if(isset($data)){ if($datas[1] == "5"){ echo "selected"; } }?>>5</option>
                           <option value="6" <?php if(isset($data)){ if($datas[1] == "6"){ echo "selected"; } }?>>6</option>
                           <option value="7" <?php if(isset($data)){ if($datas[1] == "7"){ echo "selected"; } }?>>7</option>
                           <option value="8" <?php if(isset($data)){ if($datas[1] == "8"){ echo "selected"; } }?>>8</option>
                           <option value="9" <?php if(isset($data)){ if($datas[1] == "9"){ echo "selected"; } }?>>9</option>
                           <option value="10" <?php if(isset($data)){ if($datas[1] == "10"){ echo "selected"; } }?>>10</option>
                           <option value="11" <?php if(isset($data)){ if($datas[1] == "11"){ echo "selected"; } }?>>11</option>
                           <option value="12" <?php if(isset($data)){ if($datas[1] == "12"){ echo "selected"; } }?>>12</option>
                           <option value="13" <?php if(isset($data)){ if($datas[1] == "13"){ echo "selected"; } }?>>13</option>
                           <option value="14" <?php if(isset($data)){ if($datas[1] == "14"){ echo "selected"; } }?>>14</option>
                           <option value="15" <?php if(isset($data)){ if($datas[1] == "15"){ echo "selected"; } }?>>15</option>
                           <option value="16" <?php if(isset($data)){ if($datas[1] == "16"){ echo "selected"; } }?>>16</option>
                           <option value="17" <?php if(isset($data)){ if($datas[1] == "17"){ echo "selected"; } }?>>17</option>
                           <option value="18" <?php if(isset($data)){ if($datas[1] == "18"){ echo "selected"; } }?>>18</option>
                           <option value="19" <?php if(isset($data)){ if($datas[1] == "19"){ echo "selected"; } }?>>19</option>
                           <option value="20" <?php if(isset($data)){ if($datas[1] == "20"){ echo "selected"; } }?>>20</option>
                           <option value="21" <?php if(isset($data)){ if($datas[1] == "21"){ echo "selected"; } }?>>21</option>
                           <option value="22" <?php if(isset($data)){ if($datas[1] == "22"){ echo "selected"; } }?>>22</option>
                           <option value="23" <?php if(isset($data)){ if($datas[1] == "23"){ echo "selected"; } }?>>23</option>
                           <option value="24" <?php if(isset($data)){ if($datas[1] == "24"){ echo "selected"; } }?>>24</option>
                           <option value="25" <?php if(isset($data)){ if($datas[1] == "25"){ echo "selected"; } }?>>25</option>
                        </select>
                        <div id="floorTo"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                  <button type="button" id="submit_data" class="btn yellow-btn font-roboto regular">Post Requirement</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>

    <a href="#" class="scrollup " aria-label="Scroll to top"></a>
    <div class='hide'>
      <div class='overlayad' href="#overlayad_content" id='overlayad_content'></div>
    </div>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
          var url = "{{ route('postrequirement') }}";
          
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
 @endsection