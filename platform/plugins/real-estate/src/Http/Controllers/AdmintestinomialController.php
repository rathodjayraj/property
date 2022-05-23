<?php

namespace Botble\RealEstate\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\RealEstate\Repositories\Interfaces\PackageInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\RealEstate\Forms\PackageForm;
use Botble\Base\Forms\FormBuilder;
use DB;

class AdmintestinomialController extends BaseController
{
    public function index()
    {

        page_title()->setTitle("Testinomial");
		
		
		$data['data']  = DB::Table('testimonial')->orderBy('id','desc')->get();
		
        return view("admin_index");
   
    }
}
