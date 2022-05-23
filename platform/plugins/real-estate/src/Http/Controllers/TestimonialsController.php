<?php

namespace Botble\RealEstate\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\RealEstate\Repositories\Interfaces\TestimonialsInterface;
use Botble\Base\Http\Controllers\BaseController;
use Botble\RealEstate\Http\Requests\TestimonialsRequest;
use Illuminate\Http\Request;
use Exception;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\RealEstate\Forms\TestimonialForm;
use Botble\Base\Forms\FormBuilder;
use Botble\RealEstate\Tables\TestimonialTable;
use DB;

class TestimonialsController extends BaseController
{
    /**
     * @var PackageInterface
     */
    protected $testimonialsRepository;

    /**
     * PackageController constructor.
     * @param RequirementInterface $packageRepository
     */
    public function __construct(TestimonialsInterface $testimonialsRepository)
    {
        $this->TestimonialsRepository = $testimonialsRepository;
    }

    /**
     * @param PackageTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(TestimonialTable $table)
    {
        //page_title()->setTitle("Requuirement//");
		
       return $table->renderTable();
    
	}

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('testimonialad.create'));

        return $formBuilder->create(TestimonialForm::class)->renderForm();
    }

    /**
     * @param PackageRequest $request
     * @return BaseHttpResponse
     */
    public function store(TestimonialsRequest $request, BaseHttpResponse $response)
    {	
        $testimonial = $this->testimonialsRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(PACKAGE_MODULE_SCREEN_NAME, $request, $testimonial));

        return $response
            ->setPreviousUrl(route('testimonialad.index'))
            ->setNextUrl(route('testimonialad.edit', $testimonial->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $testimonial = $this->TestimonialsRepository->findOrFail($id);
	
		event(new BeforeEditContentEvent($request, $testimonial));

        page_title()->setTitle(trans('testimonialad.edit') . ' "' . $testimonial->id . '"');

        return $formBuilder->create(TestimonialForm::class, ['model' => $testimonial])->renderForm();
	}

    /**
     * @param $id
     * @param PackageRequest $request
     * @return BaseHttpResponse
     */
    public function update($id, TestimonialsRequest $request, BaseHttpResponse $response)
    {
        $testimonial = $this->TestimonialsRepository->findOrFail($id);
	
        $testimonial->fill($request->input());
		
		DB::table('testimonial')->where('id', $id)->update(array('description' => $testimonial['description'],'status' => $testimonial['status']));
        //$this->TestimonialsRepository->createOrUpdate($testimonial);

        event(new UpdatedContentEvent(PACKAGE_MODULE_SCREEN_NAME, $request, $testimonial));

		//DB::table('testimonial')->update($testimonial);
        return $response
            ->setPreviousUrl(route('testimonialad.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $package = $this->packageRepository->findOrFail($id);

            $this->packageRepository->delete($package);

            event(new DeletedContentEvent(PACKAGE_MODULE_SCREEN_NAME, $request, $package));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.cannot_delete'));
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $package = $this->packageRepository->findOrFail($id);
            $this->packageRepository->delete($package);
            event(new DeletedContentEvent(PACKAGE_MODULE_SCREEN_NAME, $request, $package));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
