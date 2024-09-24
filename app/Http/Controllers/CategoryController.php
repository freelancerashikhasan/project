<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\CategoryField;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Category::where('deleted_at', null)->orderBy('id', 'DESC')->newQuery();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d');
                })
                ->editColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('data', function ($row) {
                    $data = CategoryField::where('category_id', $row->id)->get();
                    $output = '<table class="table table-bordered">';

                    foreach ($data as $field) {
                        $output .= '<tr>';
                        $output .= '<td>' . htmlspecialchars($field->name) . '</td>';
                        $output .= '<td>' . htmlspecialchars($field['type']) . '</td>';
                        $output .= '</tr>';
                    }

                    $output .= '</table>';

                    return $output;
                })
                ->editColumn('description', function ($row) {
                    return strlen($row->description) > 30 ? mb_substr($row->description, 0, 30, 'UTF-8') . '...' : $row->description;
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
        return view('admin.category.index');
    }
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->created_by = Auth::user()->name ?? 'admin';
        $category->save();

        foreach ($request->rows as $row) {
            $categoryField = $category->fields()->create([
                'category_id' => $category->id,
                'name' => $row['fieldName'],
                'type' => $row['fieldType'],
            ]);

            if ($row['fieldType'] === 'select' && !empty($row['options'])) {
                foreach ($row['options'] as $option) {
                    $categoryField->selects()->create([
                        'category_id' => $category->id,
                        'category_field_select' => $categoryField['id'],
                        'name' => $option['name'],
                        'value' => $option['value'],
                    ]);
                }
            }
        }

        return response()->json($category);
    }
    public function getCategories()
    {
        $categories = Category::select('id', 'name')->where('deleted_at', null)->get();

        return response()->json($categories);
    }
    public function getCategory(string $id)
    {
        $category = Category::with(['fields', 'fields.selects'])->findOrFail($id);

        $categoryFields = $category->fields->map(function ($field) {
            return [
                'id' => $field->id,
                'name' => $field->name,
                'type' => $field->type,
                'selectOptions' => $field->selects
            ];
        });
        return response()->json(['categoryFields' => $categoryFields]);
    }
}
