<?php

namespace Botble\RealEstate\Tables;

use Auth;
use BaseHelper;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\RealEstate\Repositories\Interfaces\TestimonialsInterface;
use Botble\Table\Abstracts\TableAbstract;
use Html;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;
use DB;

class TestimonialTable extends TableAbstract
{

    /**
     * @var bool
     */
    //protected $hasActions = true;

    /**
     * @var bool
     */
    //protected $hasFilter = true;

    /**
     * PackageTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param PackageInterface $packageRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlGenerator, TestimonialsInterface $packageRepository)
    {
        parent::__construct($table, $urlGenerator);

        $this->repository = $packageRepository;

        if (!Auth::user()->hasAnyPermission(['requirement.edit', 'requirement.destroy'])) {
            $this->hasOperations = false;
            $this->hasActions = false;
        }
    }

    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     * @since 2.1
     */
    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            
			->editColumn('description', function ($item) {
                return clean($item->description);
            })
            ->editColumn('checkbox', function ($item) {
                return clean($item->checkbox);
            })
           
			->editColumn('date', function ($item) {
				$date =  date('d-M-Y',strtotime($item->date));
                return clean($date);
            })
            ->editColumn('status', function ($item) {
				
                return clean($item->status->toHtml());
            })
             ->addColumn('operations', function ($item) {
                return $this->getOperations('testimonialad.edit', 'requirement.destroy', $item);
            });
			
        return $this->toJson($data);
    }

    /**
     * Get the query object to be processed by table.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     * @since 2.1
     */
    public function query()
    {    
        $query = $this->repository->getModel()->select([
            'id',
			'user_id',
			'description',
			'status',
			'date',
        ]);

        return $this->applyScopes($query);
    }

    /**
     * @return array
     * @since 2.1
     */
    public function columns()
    {
        return [
            'id' => [
                'title' => trans('id'),
                'width' => '20px',
            ],
            'description' => [
                'title' => trans('description'),
                'width' => '50px',
            ],
            'status' => [
                'title' => trans('status'),
                'width' => '100px',
            ],
            'date' => [
                'title' => trans('date'),
                'width' => '100px',
            ],

        ];
    }

    /**
     * @return array
     * @since 2.1
     * @throws \Throwable
     */
    // public function buttons()
    // {
    //     return $this->addCreateButton(route('requirement.create'), 'requirement.create');
    // }

    /**
     * @return array
     * @throws \Throwable
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('requirement.deletes'), 'requirement.destroy', parent::bulkActions());
    }

    /**
     * @return array
     */
    public function getBulkChanges(): array
    {
        return [
            'name' => [
                'title'    => trans('core/base::tables.name'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'status' => [
                'title'    => trans('core/base::tables.status'),
                'type'     => 'select',
                'choices'  => BaseStatusEnum::labels(),
                'validate' => 'required|in:' . implode(',', BaseStatusEnum::values()),
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type'  => 'date',
            ],
			'property_type' => [
                'title' => trans('property_type'),
                'type'  => 'date',
            ],
        ];
    }
}
