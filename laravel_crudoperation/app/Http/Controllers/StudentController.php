<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentdata = Student::all();
        return view('index',['data'=>$studentdata]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required',
            'email'=>'required|email|unique:students',
            'contactno'=>'required|numeric|digits:10|unique:students',
            'dob'=>'required',
            'password'=>'required',
            'confirm_password'=>'required|same:password'
    ]);
        
        $student = new Student();
        $student->studentname=$request->name;
        $student->email=$request->email;
        $student->contactno=$request->contactno;
        $student->dateofbirth=$request->dob;
        $student->gender=$request->gender;
        $student->image=$request->image;
        $student->password=md5($request->password) ;
        //$student->confirm_password=md5($request->confirm_password) ;
        $student->save();

        return redirect('show');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $studentdata = Student::all();
        return view('index',['data'=>$studentdata]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data =  Student::find($id);
        return view('display',['data'=>$data]);
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
    public function destroy($id)
    {
        $studentdata = Student::find($id);
        $studentdata->delete();
        return redirect('addstudent');
    }
}
