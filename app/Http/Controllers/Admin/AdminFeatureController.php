<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class AdminFeatureController extends Controller
{
    public function index()
    {
        $features = Feature::get();
        return view('admin.feature_view',compact('features'));
    }   
    
    public function add()
    {
        return view('admin.feature_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'heading' => 'required',
        ]);
    
        $obj = new Feature();
        $obj->icon = $request->icon;
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->save();

        return redirect()->back()->with('success', 'Feature information is added successlly');
    }

    public function edit($id)
    {
         $feature_data = Feature::where('id', $id)->first();
         return view('admin.feature_edit', compact('feature_data'));
    }

    public function delete($id)
    {
        $obj = Feature::where('id', $id)->first();
        $obj->delete();
        return redirect()->back()->with('success', 'Feature information is deleted successlly');
    }

    public function update(Request $request, $id)
    {
        $obj = Feature::where('id', $id)->first();
       
            $request->validate([
                'icon' => 'required',
                'heading' => 'required',
                'text' => 'required',
            ]);
        $obj->icon = $request->icon;
        $obj->heading = $request->heading;
        $obj->text = $request->text;
        $obj->update();
        return redirect()->back()->with('success', 'Feature information is updated successlly');
    }
}
