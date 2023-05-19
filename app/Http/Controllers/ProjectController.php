<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use App\Models\TaskProject;

class ProjectController extends Controller
{
    public function project($id){
        $projects = Project::get(); 
        return view('project')->with(['projects' => $projects, 'id' => $id]);
    }
    
    public function createProject(Request $request){
        $validator = Validator::make($request->all(),[
            'project_name' => 'required|string|max:255',
        ]);
        if ($validator->fails())
        {
            return response(["status" =>"error",'message'=>$validator->errors()->all()], 422);
        }
     
        Project::create($request->toArray());
        return redirect()->back()->with('success', "Project created successfully!");
    }


    public function addToProject(Request $request){

        TaskProject::create($request->toArray());
        return redirect('/')->with('success', "Task is add to the project! successfully!");
    }
}
