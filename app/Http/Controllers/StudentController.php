<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use Auth;
class StudentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Display out followup student view
     */
    public function returnOutFollowUpView(){
        $users = User::all();
        $students = Student::all();
        return view('student.outfollowup', compact('students', 'users'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('student.add', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(auth::user()->role == 1){
            $student = new Student();
            $student->firstName = $request->firstName;
            $student->lastName = $request->lastName;
            $student->class = $request->class;

            $student->description = $request->description;
            $student->activeFollowup = 1;
            $student->user_id = $request->tutor;
            if ($request->hasfile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time(). ".".$extension;
                $file->move('img/', $filename);
                $student->picture = $filename;
                $student->save();
            }
            $result = redirect('/home');
        }else {
            $result = "Cannot add student";
        }
        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $comments = $student->comments;
        return view('student.detail', compact('student', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $users = User::all();
        return view('student.edit', compact('student', 'users'));
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
        if(auth::user()->role == 1){
            $student = Student::find($id);
            $student->firstName = $request->firstName;
            $student->lastName = $request->lastName;
            $student->class = $request->class;
            $student->description = $request->description;
            $student->user_id = $request->tutor;
            if ($request->hasfile('image')){
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time(). ".".$extension;
                $file->move('img/', $filename);
                $student->picture = $filename;
            }
            $student->save();
            $result = redirect('/home');
        }else {
            $result = "Cannot edit student";
        }
        return $result;
    }

    /**
     * out followup student
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function outOfFollowup($id)
    {
        $student = Student::find($id);
        $student->activeFollowup = 0;
        $student->save();
        return redirect('/returnOutFollowUpView');
    }
    public function backToFollowup($id)
    {
        if(auth::user()->role == 1){
            $student = Student::find($id);
            $student->activeFollowup = 1;
            $student->save();
            $result = redirect('/home');
        }else{
            $result = "Unauthorize user";
        }
        return $result;
    }
}
