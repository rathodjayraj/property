<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class PostrequirementController extends Controller
{
    public function postyourrequirement(Request $request)
    {   
       
        if(!auth('account')->check()) 
        {
            return redirect('login');
        }
        else
        {
            $requirements = DB::select('select id, name from re_categories');
            return view('postyourproperty', array('requirements' => $requirements));
        }  
       
      
    }

    public function postrequirement(Request $request)
    {
       
        $userid = auth('account')->user()->id;
        
        $propertyPostedBy = $request->propertyPostedBy;
        $floor = $request->floorNoFrom;

        $post_property = array(
            'user_id' => $userid,
            'property_type' => $request->propertyType,
            'transaction_type' => $request->transactionType ,
            'total_price' => $request->totalPrice,
            // 'total_price' => $request->budgetMin.'-'.$request->budgetMax,
            'title' => $request->reqName,
            'property_description' => $request->reqDescription,
            'property_posted_by' => implode('-', $propertyPostedBy),
            'built_area' => $request->builtAreaMin.'-'.$request->builtAreaMax.'-'.$request->builtAreaUnit,
            'number_bedrooms' => $request->bedrooms,
            'number_bathrooms' => $request->bathrooms,
            'construction' => $request->propertyAge,
            'floor' => implode('-', $floor),
        );
        
        
        $id = $request->id;

        if($id == null)
        {
            $report = DB::table('post_requirement')->insert($post_property);
        }
        else
        {
            DB::table('post_requirement')->where('id', $id)->update($post_property);
        }

    }

    public function myrequirements(Request $request)
    {   
        $id = auth('account')->user()->id;
        $users = DB::select('SELECT post_requirement.*,re_categories.name FROM post_requirement INNER JOIN re_categories ON post_requirement.property_type = re_categories.id  where user_id = ?',[$id]);
			
        return view('myrequirements', array('data' => $users));
    }

    public function requirements_delete($id)
    {   
        $users = DB::delete('delete from post_requirement where  id = ?',[$id]);
        $id = auth('account')->user()->id;
         $users = DB::select('SELECT post_requirement.*,re_categories.name FROM post_requirement INNER JOIN re_categories ON post_requirement.property_type = re_categories.id  where user_id = ?',[$id]);
        return view('myrequirements', array('data' => $users));
    }

    public function detail(Request $request)
    {   
      
        $id = $request->id;   
        $users = DB::select('select * from post_requirement where id = ?',[$id]);
        
        $requirements = DB::select('select id, name from re_categories');

        return view('postyourproperty', array('data' => $users,'requirements' => $requirements)); 
    }
   


}
