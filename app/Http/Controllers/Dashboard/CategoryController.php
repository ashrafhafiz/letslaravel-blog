<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $btn = '
                    <a href="' . route('dashboard.categories.edit', $row->id) . '" class="edit btn btn-success btn-sm m-x-1" style="border-radius: 3px;" >
                        <i class="fa fa-edit"></i>
                    </a>
                    <a id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm" style="border-radius: 3px;" data-toggle="modal"
                    data-target="#deleteModal">
                        <i class="fa fa-trash"></i>
                    </a>';
                })
                ->addColumn('status', function ($row) {
                    return $row->status == null ? "Inactive" : ucwords($row->status);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::all();
        return view('dashboard.categories.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'image' => 'nullable|mimes:jpg,jpeg,bmp,png|max:2048',
        ];

        foreach (config('app.languages') as $key => $value) {
            $rules[$key.'*.name'] = 'nullable|string';
            $rules[$key.'*.desc'] = 'nullable|string';
        }

        $validated = $request->validate($rules);
        Log::info("Category attributes have been validated: " . __METHOD__ ." at ".__LINE__);

        $category = Category::create($validated);
        Log::info("Category record has been created: " . __METHOD__ ." at ".__LINE__);

        if($request->file('image')) {
            $fileName = time() . '_image_' . $request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('uploads/categories/images', $fileName, 'public');
            $image = '/storage/' . $filePath;
            $category->update(['image' => $image]);
            Log::info("Category image has been added: " . __METHOD__ ." at ".__LINE__);
        }

        return redirect()->route('dashboard.categories.index');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
