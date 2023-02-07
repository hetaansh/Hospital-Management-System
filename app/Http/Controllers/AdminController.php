<?php

namespace App\Http\Controllers;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use App\Notifications\MyFirstNotification;
use App\Models\User;
use Illuminate\Support\Facades\Notification;


class AdminController extends Controller
{
    public function addview(){
        // if(Auth::id()){
        //     if(Auth::user()->usertype==1){
                return view('admin.add_doctor');
        //     }
            
        // }
        
    }

    public function upload(Request $request){
        $doctor = new doctor;
        $image=$request->file;
        $imagename=time().'.'.$image->getClientoriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;
        $doctor->name=$request->name;
        $doctor->phone=$request->number;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;
        $doctor->save();

        return redirect()->back()->with('message', 'Doctor record added successfully.');
    }

    public function showappointment(){
        $data=appointment::all();
        return view('admin.showappointment',compact('data'));
    }

    public function approved($id){
        $data=appointment::find($id);
        $data->status='approved';
        $data->save();
        return redirect()->back();
    }

    public function cancelled($id){
        $data=appointment::find($id);
        $data->status='cancelled';
        $data->save();
        return redirect()->back();
    }

    public function showdoctor(){
        $data=doctor::all();
        return view('admin.showdoctor',compact('data'));

    }

    public function deletedoctor($id){
            $data=doctor::find($id);
            $data->delete();

            return redirect()->back();  
    }

    public function updatedoctor($id){
        $data=doctor::find($id);
        return view('admin.updatedoctor',compact('data'));
    }

    public function editdoctor(Request $request,$id){
        $data=doctor::find($id);
        $data->name=$request->name;
        $data->phone=$request->phone;
        $data->speciality=$request->speciality; 
        $data->room=$request->room;
        

        $image=$request->file;

        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $data->image=$imagename;
    }
        $data->save();
 
        return redirect()->back();   
    }

    public function emailview(Request $request,$id){
        $data=appointment::find($id);
        

        return view('admin.emailview',compact('data'));
    }

    public function sendmail(Request $request,$id){
        $data=appointment::find($id);
        $details=[
            'greeting' => $request->greeting, 
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl
        ];

        Notification::sendnow($data,new MyFirstNotification($details));

        return redirect()->back();
    }

    public function exportpdf(){
        $data=doctor::all();
        $pdf = PDF::loadView('pdf.invoice', $data);
    return $pdf->download('invoice.pdf');
    }


}


