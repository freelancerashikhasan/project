<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\DataRequest;
use App\Models\Category;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DataController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Data::where('deleted_at', null)->orderBy('id', 'DESC');
            if (Auth::user()->access_type == 'user') {
                $data = $data->where('user_id', Auth::user()->id);
            }
            if (!empty(request()->category_id)) {
                $data = $data->where('category_id', request()->category_id);
            }
            $data = $data->newQuery();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d');
                })
                ->editColumn('user', function ($row) {
                    return $row->user->name ?? '';
                })
                ->editColumn('category', function ($row) {
                    return $row->category->name ?? '';
                })
                ->editColumn('data', function ($row) {
                    $data = json_decode($row->data, true);
                    $output = '<table class="table table-bordered">';

                    foreach ($data as $field) {
                        $output .= '<tr>';
                        $output .= '<td>' . htmlspecialchars($field['field_name']) . '</td>';
                        $output .= '<td>' . htmlspecialchars($field['value']) . '</td>';
                        $output .= '</tr>';
                    }

                    $output .= '</table>';

                    return $output;
                })
                ->addColumn('actions', function ($row) {
                    return '
                    <button class="btn btn-sm btn-warning" onclick="editCategory(' . $row->id . ')">Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="deleteCategory(' . $row->id . ')">Delete</button>
                ';
                })
                ->rawColumns(['actions', 'data'])
                ->make(true);
        }
        return view('user.data.index');
    }
    public function store(DataRequest $request)
    {
        // dd($request->all());
        $categoryId = $request->category_id;
        $userId = Auth::user()->id;

        $fieldsData = [];

        foreach ($request->data as $fieldName => $fieldData) {
            $fieldsData[] = [
                'field_id' => $fieldData['field_id'],
                'field_name' => $fieldName,
                'value' => $fieldData['value'],
            ];
        }

        $data = new Data();
        $data->category_id = $categoryId;
        $data->user_id = $userId;
        $data->data = json_encode($fieldsData);
        $data->save();

        return response()->json($data);
    }
}
