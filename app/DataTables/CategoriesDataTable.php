<?php

namespace App\DataTables;

use App\Helpers\TranslationHelper;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;


class CategoriesDataTable extends DataTable
{
    protected static $count;
    
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
    */
    public function dataTable(QueryBuilder $query , Request $request)
    {   
        self::$count = $request->start == 0  ? 0 : (int)$request->start;
        return datatables()
                ->eloquent($query)
                ->editColumn('id', function (){
                    return self::$count += 1;
                })
                ->editColumn('title', function ($category) {
                    return $category->title;
                })
                ->editColumn('created_at', function ($category) {
                    return  $category->getCreatedAt();
                })
                ->addColumn('image', function ($category) {
                    return view('admin.pages.categories.datatable.image' , ['category' => $category]);
                })
                ->addColumn('actions', function ($category) {
                    return view('admin.pages.categories.datatable.action' , ['category' => $category]);
                })
                ->rawColumns(['actions', 'title','created_at','image']);
    }

    /**
     * Get the query source of dataTable.
    */
    public function query()
    {        
        return Category::filter(request()->all());
    }

    /**
     * Optional method if you want to use the html builder.
    */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->rowId('id')
            ->minifiedAjax()
            ->searching(false)
            ->parameters([
                "fnDrawCallback" => "function(oSettings) {
                    sendRequest()
                }",
                'scrollX'   =>  true,
                'dom'       => "<'table-responsive'<'d-flex mb-3'flr>t><'d-flex justify-content-between my-3'<''<'pagination'p>><''<'info'i>>>",
                "language"  => $this->getDataArrayArabic(),
            ]);
    }

    /**
     * Get the dataTable columns definition.
    */
    public function getColumns(): array
    {
        return [
            [
                'name'  => 'id',
                'data'  => 'id',
                'title' => '#'
            ],
            [
                'name'  => 'title',
                'data'  => 'title',
                'title' => TranslationHelper::translate('title' , 'admin') 
            ],
            [
                'name'  => 'image',
                'data'  => 'image',
                'title' => TranslationHelper::translate('image' , 'admin') ,
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false
            ],
            [
                'name'  => 'created_at',
                'data'  => 'created_at',
                'title' => TranslationHelper::translate('created_at' , 'admin') 
            ],
            [
                'name'       => 'actions',
                'data'       => 'actions',
                'title'      => TranslationHelper::translate('actions' , 'admin') ,  
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false
            ],
        ];
    }

    /**
     * Get the filename for export.
    */
    protected function filename(): string
    {
        return 'Categories_' . date('YmdHis');
    }
    
    private function getDataArrayArabic(){
        if(app()->getLocale()  == 'ar'){
            return    [
                    'sProcessing'   => 'جارٍ التحميل...',
                    'sLengthMenu'   => 'اعرض _MENU_ طلب',
                    'sZeroRecords'  => 'لم يعثر على أية سجلات',
                    'sInfo'         => 'عرض _START_ إلى _END_ من أصل _TOTAL_ طلب',
                    'sInfoEmpty'    => 'يعرض 0 إلى 0 من أصل 0 سجل',
                    'sLengthMenu'   => 'اعرض _MENU_ الاصناف',
                    'sZeroRecords'  => 'لم يعثر على أية الاصناف',
                    'sInfo'         => 'عرض _START_ إلى _END_ من أصل _TOTAL_ الاصناف',
                    'sInfoEmpty'    => 'يعرض 0 إلى 0 من أصل 0 صنف',
                    'sInfoFiltered' => '(منتقاة من مجموع _MAX_ مُدخل)',
                    'sInfoPostFix'  => '',
                    'sSearch'       => 'ابحث:',
                    'sUrl'          => '',
                    'oPaginate'     => [
                        'sFirst'    => 'الأول',
                        'sPrevious' => 'السابق',
                        'sNext'     => 'التالي',
                        'sLast'     => 'الأخير'
                    ],
                    'oAria' => [
                        'sSortAscending'  => ': تفعيل لترتيب العمود تصاعدياً',
                        'sSortDescending' => ': تفعيل لترتيب العمود تنازلياً'
                    ]
                ]; 
        }
        return  [] ;
    }
}
