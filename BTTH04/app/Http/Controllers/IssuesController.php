<?php

namespace App\Http\Controllers;

use App\Models\Computers;
use App\Models\Issues;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    public function index(){
        $issues = Issues::with('computer')->paginate(10);
        return view('issues.index',compact('issues'));
    }
    public function create(){
        $computers = Computers::all();
        return view('issues.create', compact('computers'));
    }
    public function store(Request $request){
        $request->validate([
            'computer_id'=> 'required|exists:computers,id',
            'reported_by'=> 'required|max:255',
            'reported_date'=> 'required',
            'urgency'=>'required|max:255',
           
            'status'=>'required|max:255',
        ]);
        Issues::create($request->all());
        return redirect()->route('issues.index')->with('success','Thêm mới vấn đề thành công!');
    }
    public function edit($id){
        $issues=Issues::findOrFail($id);
        $computers = Computers::all();
        return view('issues.edit',compact('issues','computers'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'computer_id'=>'required|exists:computers,id',
            'reported_by'=>'required|max:255',
            'reported_date'=>'required',
            'urgency'=>'required|max:255',    
            'status'=>'required|max:255',
        ]);
        $issues=Issues::find($id);
        $issues->update($request->all());
        return redirect()->route('issues.index')->with('success','Đã cập nhật lại vấn đề thành công!');
    }
    public function destroy($id){
        $issues=Issues::findOrFail($id);
        $issues->delete();
        return redirect()->route('issues.index')->with('success','Đã xóa vấn đề thành công!');
    }
}
