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
            'gender'=>'required',
            'password'=>'required',
            'confirm_password'=>'required|same:password'
    ]);

        $extension = $request->file('image')->extension();
        $path = $request->file('image')->storeAs('images',time().".".$extension);   
      
        $student = new Student();
        $student->studentname=$request->name;
        $student->email=$request->email;
        $student->contactno=$request->contactno;
        $student->dateofbirth=$request->dob;
        $student->gender=$request->gender;
        $student->password=md5($request->password); 
        $student->image=$path;

        //$student->confirm_password=md5($request->confirm_password) ;
        // $student->image=$request->file('image')->store('images');
        // $student-> image = $path;
        $student->save();

        return redirect('addstudent');
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
        $data = compact('data');
        return view('edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id )
    {
       
        $updatedata = Student::find($id);
       
    
        $updatedata->studentname=$request->name;
        $updatedata->email=$request->email;
        $updatedata->contactno=$request->contactno;
        $updatedata->dateofbirth=$request->dob;
        $updatedata->gender=$request->gender;
        $updatedata->image=$request->image;
        $updatedata->password=md5($request->password) ;
        
        $updatedata->save();

        return redirect('addstudent');

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
