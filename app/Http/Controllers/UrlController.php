<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\DataRequest;
use App\Http\Requests\urlRequest;
use App\Models\Category;
use App\Models\Data;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class UrlController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Url::where('deleted_at', null)->orderBy('id', 'DESC');

            $data = $data->newQuery();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($row) {
                    return $row->created_at->format('Y-m-d');
                })
                ->editColumn('original_url', function ($row) {
                    return $row->original_url ?? '';
                })
                ->editColumn('short_url', function ($row) {
                    $fullUrl = url('/') . '/' . $row->short_url;
                    return '<a href="' . $fullUrl . '" target="_blank">' . $fullUrl . '</a>';
                })
                ->rawColumns(['short_url'])
                ->make(true);
        }
        return view('url.index');
    }
    public function store(UrlRequest $request)
    {
        $request->validate([
            'original_url' => 'required|url',
        ]);
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < 7; $i++) {
            $randomString .= $characters[random_int(0, strlen($characters) - 1)];
        }
        do {
            $shortUrl = $randomString;
        } while (Url::where('short_url', $shortUrl)->exists());

        $data = new Url();
        $data->original_url = $request->original_url;
        $data->short_url = $shortUrl;
        $data->save();

        return response()->json($data);
    }
    public function redirect($short_code)
    {
        $data = Url::where('short_url', $short_code)->first();
        if ($data) {
            return redirect()->to($data->original_url);
        }
        return redirect()->route('url.index');
    }
}
