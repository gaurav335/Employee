<?php

namespace App\DataTables;

use App\Models\Department;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DepartmentDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action',  function($data){
                $result = "";
                if($data->status == 1) {
                    $result .= '<button type="button" class="btns btn-outline-danger btn-sm changeStatus" status="0" title="click to Inactivate Department" department_id="'.$data->id.'"><i class="fa fa-unlock"></i></button> ';
                } else {
                    $result .= '<button type="button" class="btns btn-outline-secondary btn-sm changeStatus" status="1" title="click to Activate Department" department_id="'.$data->id.'"><i class="fa fa-lock"></i></button> ';
                }
                $result .= '<button class="btns btn-outline-primary btn-sm" title="Edit Department" data-toggle="modal" data-target="#department_edit_modal" data-id="'.$data->id.'"><i class="fa fa-edit"></i></button> 
                             <button type="button" id="department_delete" class="btns btn-sm btn-outline-danger" title="delete Department" department_id="'.$data->id.'"><i class="fa fa-trash"></i></button> ';

                return $result;
            })
            ->editColumn('status',function($data) {
                if($data->status == 0) {
                    return '<span class="badges badge-danger">Inactive</span>';
                } else {
                    return '<span class="badges badge-success">Active</span>';
                }
            })
            ->rawColumns(['action', 'status'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Department $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Department $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('department-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('no')->data('DT_RowIndex')->searchable(false)->orderable(false),
            Column::make('id')->hidden(true),
            Column::make('name')->title('Department Name'),
            Column::make('status')->title('Status'),
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Department_' . date('YmdHis');
    }
}
