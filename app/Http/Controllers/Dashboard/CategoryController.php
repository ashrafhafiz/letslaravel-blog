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
                ->addColumn('name', function ($row) {
                    return $row->translate(app()->getLocale())->name;
                })
                ->addColumn('parent', function ($row) {
                    $parent_category = Category::find($row->parent_category_id);
                    return $row->parent_category_id == null ? "Major Category" : ($parent_category->translate(app()->getLocale())->name);
                })
                ->rawColumns(['action', 'name', 'parent'])
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
            'parent_category_id' => 'nullable',
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
     */
    public function edit(Category $category)
    {
        $data['category'] = $category;
        $data['categories'] = Category::all();
        return view('dashboard.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
//         dd(Category::find($request->id)->allChildren()->get());
        if (is_numeric($request->id)) {
            Category::find($request->id)->children()->delete();
            Category::find($request->id)->delete();
        }
        return redirect()->route('dashboard.categories.index');
    }
}
