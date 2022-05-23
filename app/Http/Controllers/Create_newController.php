<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use make;
use Validator;
use DB;
use Auth;
use split;

class Create_newController extends Controller
{
   
    public function create_new()
    {   
      
        return view('create_new');
        
    }

    public function create_new_property(Request $request)
    {

        $userid = auth('account')->user()->id;
     
        $input = $request->all();
        $images=array();
        $array=array();

        if($files=$request->file('image')){
            $i=1;
            foreach($files as $file){
                $name=$file->getClientOriginalName();
                $file->move('./storage/properties/new/',$name);
                $array[$i]='/properties/new/'.$name;
                $i++;
            }
        }
        
        $images = json_encode($array);

        $re_properties = array(
            'name' => $request->property_title,
            'number_bedroom' => $request->bedrooms,
            'number_bathroom' => $request->bathrooms,
            'price' => $request->totalPrice,
            'type' => $request->transactionType,
            'description' => $request->propertyDescription,
            'city_id' => $request->townId,
            'author_id' =>  $userid,
            'square' => $request->builtArea.' '.$request->builtAreaUnit,
            'plot_area' => $request->plotArea.' '.$request->plotAreaUnit,
            'constructed_year' => $request->constructedYear,
            'images'=>  $images,
            'auto_renew' => $request->auto_renew,
            'ready_move' => $request->readyToMove,
            'location'  => $request->mapvalue,
            'latitude'  => $request->pickuplatitude,
            'longitude' => $request->pickuplongitude,
            'other_email' => $request->confirmEmailAddress,
            'mobile_2' => $request->mobile2,
            'mobile_sms' => $request->primaryMobile2,
        );

        if (!isset($request->id)) 
        {
            $report = DB::table('re_properties')->insert($re_properties);
             $lastID = DB::table('re_properties')->orderBy('id', 'desc')->first(); 
             $lastID =  $lastID->id;
        }
        else
        {
            $id = $request->id;
            DB::table('re_properties')->where('id', $request->id)->update($re_properties);
            $users = DB::delete('delete from re_property_features where  property_id = ?',[$id]);
            $users = DB::delete('delete from re_facilities_distances where  reference_id = ?',[$id]);
            $lastID = $id;
        }
            
        $features= $request->features;
        
        foreach ($features as $features_value)
        {
            $re_features = array(
                'property_id' => $lastID,
                'feature_id' => $features_value,
            );
            
             DB::table('re_property_features')->insert($re_features);
            
        }

        $distance = $request->range;
        $facility = $request->school;

        foreach ($distance as $index => $distance_value) 
        {   
            $re_facilities_distances = array(
                'reference_id' => $lastID,
                'facility_id' => $facility[$index],
                'distance' => $distance_value,
                'reference_type' => $request->reference_type ?? 'Botble\RealEstate\Models\Property',
            );

            DB::table('re_facilities_distances')->insert($re_facilities_distances);
            
        }  

        $propertytype = array(
            'property_id' => $lastID,
            'category_id' => $request->propertyType,
        );

        if (!isset($request->id)) 
        {
          DB::table('re_property_categories')->insert($propertytype);
        }
        else
        {
            DB::table('re_property_categories')->where('property_id', $request->id)->update($propertytype);
        }
        // dd($request->all());
        return response()->json(['status' =>true, 'message' => 'successfully insert']);
    }
	
	 public function testimonial()
    {   
        $userid = auth('account')->user()->id;
		$data['data']  = DB::Table('testimonial')->where('user_id',$userid)->orderBy('id','desc')->get();
		
        return view('testimonial', array('result' => $data['data']));
    }

    public function save(Request $request)
    {
        $userid = auth('account')->user()->id;
        $testimonal = array(
            'description' => $request->testimonials_description,
            'status' => "Pending",
            'user_id' => $userid,
        );
		
        DB::table('testimonial')->insert($testimonal);
        $data['data']  = DB::Table('testimonial')->where('user_id',$userid)->orderBy('id','desc')->get();
		
		return view('/testimonial', array('result' => $data['data']));
    }

    public function delete($id)
    {   
        $userid = auth('account')->user()->id;
        DB::delete('delete from testimonial where id = ?',[$id]);
        
        $data['data']  = DB::Table('testimonial')->where('user_id',$userid)->orderBy('id','desc')->get();
		
		return view('testimonial', array('result' => $data['data']));
    }
	

}
