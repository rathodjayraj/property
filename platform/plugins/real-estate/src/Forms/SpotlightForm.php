<?php

namespace Botble\RealEstate\Forms;

use Assets;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Forms\FormAbstract;
use Botble\RealEstate\Http\Requests\SpotlightRequest;
use Botble\RealEstate\Models\Spotlight;
use Botble\RealEstate\Repositories\Interfaces\SpotlightInterface;
use RealEstateHelper;

class SpotlightForm extends FormAbstract
{
    /**
     * @var CurrencyInterface
     */
    protected $testimonialsRepository;

    /**
     * PackageForm constructor.
     * @param CurrencyInterface $currencyRepository
     */
    public function __construct(SpotlightInterface $testimonialsRepository)
    {
        parent::__construct();
        $this->SpotlightRepository = $testimonialsRepository;
    }

    /**
     * @return mixed|void
     * @throws \Throwable
     */
    public function buildForm()
    {
        Assets::addScripts(['input-mask']);
		
        $currencies = $this->SpotlightRepository->pluck('description', 'id');
        $this
            ->setupModel(new Spotlight)
            ->setValidatorClass(SpotlightRequest::class)
            ->withCustomFields()
            ->add('title', 'text', [
                'label'      => trans('core/base::forms.title'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('Title'),
                ],
            ])
			 ->add('description', 'textarea', [
                'label'      => trans('core/base::forms.description'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('description'),
                ],
            ])
			 ->add('images[]', 'mediaImages', [
                'label'      => trans('plugins/real-estate::property.form.images'),
                'label_attr' => ['class' => 'control-label'],
                'values'     => $this->getModel()->id ? $this->getModel()->images : [],
            ])
			->add('number', 'number', [
                'label'      => trans('Mobile Number'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('Mobile Number'),
                ],
            ])
			->add('lunch_date', 'text', [
                'label'      => trans('Launch Date'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('Launch Date'),
                ],
            ])
			->add('floor_area', 'text', [
                'label'      => trans('Floor Area'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('Floor Area'),
                ],
            ])
			->add('price', 'text', [
                'label'      => trans('Price'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('Price'),
                ],
            ])
			->add('project_Location', 'text', [
                'label'      => trans('Project Location'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('Project Location'),
                ],
            ])
			->add('project_area', 'text', [
                'label'      => trans('Project Area'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('Project Area'),
                ],
            ])
			
			->add('total_no_of_tower', 'text', [
                'label'      => trans('Total No Of Tower'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('Total No Of Tower'),
                ],
            ])
			->add('total_no_of_floors', 'text', [
                'label'      => trans('Total No Of Floors'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('Total No Of Floors'),
                ],
            ])
			->add('total_available_units', 'text', [
                'label'      => trans('Total & Available Units'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('Total & Available Units'),
                ],
            ])
			->add('authority_approved', 'text', [
                'label'      => trans('Authority Approved'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('Authority Approved'),
                ],
            ])
			->add('occupancy_certificate', 'text', [
                'label'      => trans('Occupancy Certificate'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('Occupancy Certificate'),
                ],
            ])
			->add('commencement_certificate', 'text', [
                'label'      => trans('Commencement Certificate'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('Commencement Certificate'),
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
