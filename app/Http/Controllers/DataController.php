<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class DataController extends Controller
{
    public function index()
    {
        $datas = Data::get();
        return view('datatable.index', compact('datas'));
    }
    public function create()
    {
        return view('datatable.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:data',
            'phone' => 'required',
            'image' => 'required',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image'), $imageName);
        $student = new Data();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->image = $imageName;
        $student->save();
        return redirect()->route('student.index')->withCreate('Data inserted successfully!');
    }
    public function edit($id)
    {
        $student = Data::where('id', $id)->first();
        return view('datatable.edit', [
            'student' => $student
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'nullable',
        ]);
        $student = Data::where('id', $id)->first();
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image'), $imageName);
            // After updaing the old image should delete from the public folder
            if ($student->image && file_exists(public_path('image/' . $student->image))) {
                unlink(public_path('image/' . $student->image));
            }
            $student->image = $imageName;
        }
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();
        return redirect()->route('student.index')->withUpdate('Data updated successfully!');
    }
    public function destroy($id)
    {
        $student = Data::where('id', $id)->first();
        // Also delete the image from the public folder
        if ($student->image && file_exists(public_path('image/' . $student->image))) {
            unlink(public_path('image/' . $student->image));
        }
        $student->delete();
        return back()->withDelete('Data deleted successfully!');
    }
}
