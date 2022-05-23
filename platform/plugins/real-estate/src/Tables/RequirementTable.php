<?php

namespace Botble\RealEstate\Tables;

use Auth;
use BaseHelper;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\RealEstate\Repositories\Interfaces\RequirementInterface;
use Botble\Table\Abstracts\TableAbstract;
use Html;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;
use DB;

class RequirementTable extends TableAbstract
{

    /**
     * @var bool
     */
    protected $hasActions = true;

    /**
     * @var bool
     */
    protected $hasFilter = true;

    /**
     * PackageTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param PackageInterface $packageRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlGenerator, RequirementInterface $packageRepository)
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
            
			->editColumn('property_type', function ($item) {
               
                return  get_re_categories_name($item->property_type);
            })
            ->editColumn('checkbox', function ($item) {
                // return clean($item->property_type);
            })
            ->editColumn('transaction_type', function ($item) {
                 return clean($item->transaction_type);
            })
			->editColumn('total_price', function ($item) {
                 return clean($item->total_price);
            })
            ->editColumn('status', function ($item) {
                return clean($item->status->toHtml());
            })
            ->addColumn('operations', function ($item) {
                return $this->getOperations('', 'requirement.destroy', $item);
            });
            // ->addColumn('operations', function ($item) {
            //     return $this->getOperations('requirement.edit', 'requirement.destroy', $item);
            // });
			
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
            'property_type',
            'transaction_type',
            'total_price',
            'title',
            'property_description',
            'property_posted_by',
            'built_area',
            'number_bedrooms',
            'number_bathrooms',
            'construction',
            'floor',
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
            'property_type' => [
                'title' => trans('property_type'),
                'width' => '50px',
            ],
            'transaction_type' => [
                'title' => trans('transaction_type'),
                'width' => '100px',
            ],
            'total_price' => [
                'title' => trans('total_price'),
                'width' => '100px',
            ],
            'title' => [
                'title' => trans('title'),
                'width' => '100px',
            ],
            'property_description' => [
                'title' => trans('property_description'),
                'width' => '100px',
            ],
            'property_posted_by' => [
                'title' => trans('property_posted_by'),
                'width' => '100px',
            ],
            'built_area' => [
                'title' => trans('built_area'),
                'width' => '100px',
            ],
            'number_bedrooms' => [
                'title' => trans('number_bedrooms'),
                'width' => '100px',
            ],
            'number_bathrooms' => [
                'title' => trans('number_bathrooms'),
                'width' => '100px',
            ],
            'construction' => [
                'title' => trans('construction'),
                'width' => '100px',
            ],
            'floor' => [
                'title' => trans('floor'),
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
