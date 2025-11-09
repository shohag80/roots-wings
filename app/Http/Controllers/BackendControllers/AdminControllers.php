<?php

namespace App\Http\Controllers\BackendControllers;

use App\Http\Controllers\Controller;
use App\Mail\AdminsEmail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AdminControllers extends Controller
{
    public function admin()
    {
        $admin_data = Admin::all();
        return view('Backend.Pages.Profiles.Admin.Admins', compact('admin_data'));
    }

    public function admin_profile()
    {
        return view('Backend.Pages.Profiles.Admin.single_view');
    }

    public function update($id)
    {
        // dd('Hello admin');
        $update = Admin::find($id);
        return view('Backend.Pages.Profiles.Admin.Update', compact('update'));
    }

    public function update_store(Request $request, $id)
    {
        $admin_update = Admin::find($id);

        $file_name = $admin_update->photo;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $file_name = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/', $file_name);
        }

        $admin_update->update([
            'name' => $request->name,
            'role' => $request->role,
            'phone' => $request->phone,
            'email' => $request->email,
            'photo' => $file_name,
        ]);

        return redirect()->route('Admins');
    }

    public function delete($id)
    {
        $admin_delete = Admin::find($id);
        if ($admin_delete) {
            $admin_delete->delete();
        }
        return redirect()->route('Admins');
    }

    public function form()
    {
        return view('Backend.Pages.Profiles.Admin.Add');
    }

    public function store(Request $request)
    {
        $valitator = Validator::make($request->all(), [
            'name'      => 'required',
            'role'      => 'required',
            'phone'     => 'required|min:11|max:11',
            'email'     => 'required|email|unique:admins',
            'password'  => 'required|min:6',
        ]);

        if ($valitator->fails()) {
            notify()->error('Please, Input your valid data.');
            return redirect()->back()->withErrors($valitator)->withInput();
        }

        $file_name = null;
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $file_name = date('Ymdhis') . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/', $file_name);
        }

        $admin_data = Admin::create([
            'name'      => $request->name,
            'role'      => $request->role,
            'phone'     => $request->phone,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'photo'     => $file_name,
            'status'    => $request->status ? 1 : 0,
        ]);

        Mail::to($admin_data->email)->queue(new AdminsEmail($admin_data));
        notify()->success('Registration successfully Completed!');
        return redirect()->route('Admins');
    }

    public function admin_status($id)
    {
        $admin_info = Admin::find($id);
        $admin_info->update(['status' => $admin_info->status == 1 ? 0 : 1]);
        return redirect()->back();
    }
}
