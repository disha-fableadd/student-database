<?php

namespace App\Http\Controllers;
use App\Models\student;

use Illuminate\Http\Request;
use Route;

class studentcontroller extends Controller
{
    public function display()
    {
        $students = student::all();
        return view('student.display', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }
    public function destroy($id)
    {
        $student = student::findOrFail($id);
        $student->delete();
        return redirect()->route('student.display')->with('success', 'Student record deleted successfully.');
    }

        public function edit($id)
        {
            $student = student::findOrFail($id); 
            return view('student.edit', compact('student')); 
        }
        
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required|string|max:255',
            'image' => 'required|mimes:jpg,jpeg,png,webp|max:2048',
            'email' => 'required|email|max:255|unique:student,email',
            'contact' => 'required|digits:10',
            'course' => 'required|string',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:500',
            'hobbies' => 'required|array|min:1',
            'password' => 'required|string|min:6',
           
        ]);

        // Save the image and get the path
        $imagePath = $request->file('image')->store('uploads', 'public');

        $validated['image'] = $imagePath;
        $validated['hobbies'] = implode(', ', $request->input('hobbies'));

        // Hash the password before saving
        $validated['password'] = bcrypt($validated['password']);

        // Save student data
        student::create($validated);

        return redirect()->route('student.display');
    }

    public function update($id , Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required|string|max:255',
            'email' => 'required|email',
            'contact' => 'required|digits:10',
            'course' => 'required|string',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string',
            'hobbies' => 'required|array',
            'hobbies.*' => 'string',
        ]);
    
        $student = student::findOrFail($id);  // Retrieve the student instance
    
        $student->update($validated);  // Update the student instance
        
        return redirect(route('student.display'))->with('success','Product updated successfully');
    }
    

}
