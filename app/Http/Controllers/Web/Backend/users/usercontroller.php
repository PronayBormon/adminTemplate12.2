<?php

namespace App\Http\Controllers\Web\Backend\users;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class usercontroller extends Controller
{
    public function userlist(Request $request)
    {
        if ($request->ajax()) {


            $query = User::query();

            // Join Date Filter
            if ($request->filled('from_date') && $request->filled('to_date')) {
                $query->whereBetween('created_at', [
                    $request->from_date . ' 00:00:00',
                    $request->to_date . ' 23:59:59'
                ]);
            }

            // dd(User::all());
            return DataTables::of($query)
                ->addColumn('role', fn($row) => ucfirst($row->role))
                ->addColumn('created_at', fn($row) => Carbon::parse($row->created_at)->format('M d, Y'))
                ->addColumn('status', function ($row) {
                    if ($row->status == 'active') {
                        return '<span class="badge bg-success">Active</span>';
                    } else {
                        return '<span class="badge bg-danger">Inactive</span>';
                    }
                })
                ->addColumn('action', function ($row) {
                    return '
                        <a href="' . route('admin.users.edit', $row->id) . '"
                        class="btn btn-sm btn-outline-primary me-1"
                        title="Edit">
                            <i class="ri-pencil-line"></i>
                        </a>

                        <button class="btn btn-sm btn-outline-danger delete-page"
                                data-id="' . $row->id . '"
                                title="Delete">
                            <i class="ri-delete-bin-7-line"></i>
                        </button>
                    ';
                })
                ->rawColumns(['action', 'status'])

                ->make(true);
        }

        return view('backend.layouts.users.list');
    }

    public function usercreate()
    {
        return view('backend.layouts.users.create');
    }

    public function useredit($id)
    {
        $user = User::find($id);
        return view('backend.layouts.users.edit', compact('user'));
    }


    public function userstore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index')->with('t-success', 'User created successfully.');
    }

    public function userupdate(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'role' => 'required',
        ]);

        $data = $request->only('name', 'email', 'role', 'status');

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('t-success', 'User updated successfully.');
    }
}
