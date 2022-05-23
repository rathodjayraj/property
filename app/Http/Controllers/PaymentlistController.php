<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use make;
use Validator;
use DB;
use Auth;
use split;

class PaymentlistController extends Controller
{
   public function Payment_list()
    { 
        $userid=auth('account')->user()->id;
		$data['data'] = DB::table('payments')->where('customer_id' ,'=', $userid)->orderBy('id', 'DESC')->get();
		 return view('Payment_list', array('data' => $data['data']));
    }

}
