<?php

namespace Botble\RealEstate\Forms;

use Assets;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\RealEstate\Http\Requests\TestimonialsRequest;
use Botble\RealEstate\Models\Testimonials;
use Botble\RealEstate\Repositories\Interfaces\TestimonialsInterface;
use RealEstateHelper;

class TestimonialForm extends FormAbstract
{
    /**
     * @var CurrencyInterface
     */
    protected $testimonialsRepository;

    /**
     * PackageForm constructor.
     * @param CurrencyInterface $currencyRepository
     */
    public function __construct(TestimonialsInterface $testimonialsRepository)
    {
        parent::__construct();
        $this->TestimonialsRepository = $testimonialsRepository;
    }

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        Assets::addScripts(['input-mask']);
		
        $currencies = $this->TestimonialsRepository->pluck('description', 'id');
        $this
            ->setupModel(new Testimonials)
            ->setValidatorClass(TestimonialsRequest::class)
            ->withCustomFields()
            ->add('description', 'text', [
                'label'      => trans('core/base::forms.name'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('core/base::forms.name_placeholder'),
                    'data-counter' => 120,
                ],
            ])
            ->add('status', 'customSelect', [
                'label'      => trans('core/base::tables.status'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'class' => 'form-control select-full',
                ],
                'choices'    => BaseStatusEnum::labels(),
            ])
            ->setBreakFieldPoint('status');
    }
}
