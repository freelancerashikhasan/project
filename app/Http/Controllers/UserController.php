<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = User::orderBy('id', 'DESC')->newQuery();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d');
                })
                ->editColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('email', function ($row) {
                    return $row->email;
                })
                ->editColumn('access_type', function ($row) {
                    return $row->access_type;
                })
                ->addColumn('actions', function ($row) {
                    return '
                    <button class="btn btn-sm btn-warning" onclick="editCategory(' . $row->id . ')">Edit</button>
                    <button class="btn btn-sm btn-danger" onclick="deleteCategory(' . $row->id . ')">Delete</button>
                ';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return view('admin.user.index');
    }
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name ?? '';
        $user->email = $request->email;
        $user->access_type = $request->access_type;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json($user);
    }
}
