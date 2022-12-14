<?php

namespace App\Http\Controllers\Dashboard;

// use Datatables;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
//                ->addColumn('action', function ($row) {
//                    return $btn = '
//                    <a href="' . route('dashboard.users.edit', $row->id) . '" class="edit btn btn-success btn-sm m-x-1" style="border-radius: 3px;" ><i class="fa fa-edit"></i></a><a
//                    id="deleteBtn" data-id="' . $row->id . '" class="edit btn btn-danger btn-sm" style="border-radius: 3px;" data-toggle="modal"
//                    data-target="#deleteModal"><i class="fa fa-trash"></i></a></div>';
//                })
                ->addColumn('action', function ($row) {
                    return $btn = '
                    <a href="' . route('dashboard.users.edit', $row->id) . '" class="edit btn btn-success btn-sm m-x-1" style="border-radius: 3px;" >
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
        return view('dashboard.users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|max:255|unique:users',
            'status' => 'nullable|string',
            'password' => 'required|min:8',
        ];

        $validated = $request->validate($rules);

        User::create($validated);
        return redirect()->route('dashboard.users.index');
    }

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
    public function edit(User $user)
    {
//        dd($user->toArray());
        $data['user'] = $user;
        return view('dashboard.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        //dd($request->all());
        if (is_numeric($request->id)) {
            User::where('id', $request->id)->delete();
        }
        return redirect()->route('dashboard.users.index');
    }

    /**
     * Get all users for yajra Datatable.
     * Not working now
     */
    public function getAllUsers(Request $request)
    {
        if ($request->ajax()) {
            $data = User::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }
}
