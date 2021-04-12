<?php

namespace App\Http\Controllers;

use App\User;
use App\Person;
use App\Schedule;
use App\Requests;
use App\Image;
use App\Girl;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Intervention\Image\ImageManagerStatic as ImageInt;


use App\Rules\maxpersons;
use App\Http\Requests\ScheduleRequest;
use App\Http\Requests\PersonRequest;
use App\Http\Requests\RequestRequest;

class GglController extends Controller
{
    public function index() {
        $images = Image::where('id_cat','=',1)->get();
        $girls = Girl::get();
        $replys = Image::where('id_cat','=',4)->get();
        $rasp = Schedule::where('active','=','1')->get();
        $schedules=$rasp->sortBy('date')->values()->all();
        $n=$rasp->count();
        for  ($i=0;$i<$n;$i++)
        {
           $s=$schedules[$i]->date;
           $h=Carbon::parse($s);
           $schedules[$i]->time=$h;    
        }   
        return view('pages.index',compact('images','girls','replys','schedules'));
    } //
    
    public function admin() {
        $dostup = 2;
        if ((Gate::denies('admin'))&&(Auth::check())) {
            $dostup=0;
        }        
        if ((!Auth::check())||($dostup==0)){          
           return view('admin.admin', compact('dostup'));
        }        
        else {
            $dostup = 1;
            $now = Carbon::now();
            $rasp = Schedule::where('active','=','1')->get();
            $n=$rasp->count();
            $schedules=$rasp->sortBy('date')->values()->all();
            $proglist = array();
            for  ($i=0;$i<$n;$i++)
            {
               $s=$schedules[$i]->date;
               $h=Carbon::parse($s);
               $schedules[$i]->time=$h;
               $j=$schedules[$i]->time->month;
               $schedules[$i]->rusmonth=$schedules[$i]->translate($j);  
               $proglist = Arr::add($proglist,$schedules[$i]->id , $schedules[$i]->name);     
            }   
            $proglist = Arr::add($proglist, '0', '');
            
            return view('admin.admin', compact('schedules','now','proglist','dostup'));
        }
    } //
    
    public function addSchedule(ScheduleRequest $request) {
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        $date = Carbon::create($request['year'],$request['month'],$request['day']);
        $schedule=new Schedule;
        $id_admin = Auth::User()->id;        
        $schedule->add($request['name'],$date,$request['places'],$request['active'],$id_admin);
        
        return redirect('admin');
    } //
    
    
    
     public function editSchedule(ScheduleRequest $request) {
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        $date = Carbon::create($request->year,$request->month,$request->day);
        $schedule=new Schedule;
        $id_admin = Auth::User()->id;                
        $schedule->edit($request->id, $request->name,$date,$request->places,$request->active,$id_admin);
        $rusmonth=$schedule->translate($request->month);
        
        $response = response()->json($rusmonth);
        $response->header('Content-Type', 'application/json');     
        return $response;
    } //
    
    
    
    public function delSchedule(Request $request) {
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        $schedule=new Schedule;
        $schedule->del($request['id']);
        
    } //
       
    
          
    public function addPerson(Request $request) {        
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        $validator = Validator::make($request->all(), [
            'id_schedule' => new maxpersons(NULL),
        ]);
        if ($validator->fails()) {
            return redirect('admin')
                        ->withErrors($validator)
                        ->with('status',1);
        }
        
        $person=new Person;
        $id_admin = Auth::User()->id;
        $person->add($request['id_schedule'],$request['name'],$request['surname'],$request['patronymic'],$request['phone'],$request['email'],$request['notice'],$id_admin);
        return redirect('admin')->with('status',1);
    } //
    
    
    public function editPerson(Request $request) {
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        $validator = Validator::make($request->all(), [
            'id_schedule' => new maxpersons($request->id),
        ]);
        
        if ($validator->fails()) { return response()->json($validator->messages()->first(), 200); }
        
        else {
        $id_admin = Auth::User()->id;
        $person=new Person;            
        $person->edit($request->id, $request->id_schedule, $request->name,$request->surname,$request->patronymic,$request->phone,$request->email,$request->notice,$id_admin);
        }
        
        
        
    } //
    
    
    
    public function delPerson(Request $request) {
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        $person=new Person;
        $person->del($request['id']);
        
    } //
    
    
    
    public function fullschedules() {
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        else {
            $dostup = 1;
            $rasp = Schedule::where('active','=','1')->get();
            $n=$rasp->count();
            $schedules=$rasp->sortBy('date')->values()->all();
            
            $rasp = Schedule::where('active','=','0')->get();
            $oldschedules=$rasp->sortBy('date')->values()->all();
            $oldn=$rasp->count();
            
            for  ($i=0;$i<$n;$i++)
            {
               $s=$schedules[$i]->date;
               $h=Carbon::parse($s);
               $schedules[$i]->time=$h;
               $j=$schedules[$i]->time->month;
               $schedules[$i]->rusmonth=$schedules[$i]->translate($j);   
            }   
            for  ($i=0;$i<$oldn;$i++)
            {
               $s=$oldschedules[$i]->date;
               $h=Carbon::parse($s);
               $oldschedules[$i]->time=$h;
               $j=$oldschedules[$i]->time->month;
               $oldschedules[$i]->rusmonth=$oldschedules[$i]->translate($j);   
            }
                                    
            return view('admin.fullschedules', compact('schedules','oldschedules','dostup'));
        }
    } //
    
    
    public function fullpersons() {
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        else {
            $rasp = Schedule::where('active','=','1')->get();
            $n=$rasp->count();
            $schedules=$rasp->sortBy('date')->values()->all();
            $proglist = array();
            for  ($i=0;$i<$n;$i++)
            {
               $proglist = Arr::add($proglist, $schedules[$i]->id, $schedules[$i]->name);     
            }  
            $proglist = Arr::add($proglist, '0', '');
            
            $persons=Person::get()->sortBy('surname')->values()->all();
            return view('admin.fullpersons', compact('persons','proglist'));
        }
    } //
    
    public function request() {
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        else {
            $peoples = Requests::get()->sortBy('created_at')->values()->all();
            
            return view('admin.requests', compact('peoples'));
        }
    } //
    
    public function addRequest(RequestRequest $request) {        
        
        $person=new Requests;
        $person->add($request['name'],$request['phone']);
        return back();
    } //
    
     public function delRequest(Request $request) {
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        $person=new Requests;
        
        $person->del($request['id']);
        
    } //
    
    public function images() {
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        else {
            $images = Image::where('id_cat','=',1)->get();
            return view('admin.images', compact('images'));
        }
    } //
    
    public function addImage(Request $request) {        
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        else {
            $validator = Validator::make($request->all(), [
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6048',
            ]);
            if ($validator->fails())
            {
                return back()->withErrors($validator);
            }            
            else
            {
                foreach ($request->image as $image) {                    
                    $filename = uniqid();
                    $extension = $image->getClientOriginalExtension();
                    $image_resize = ImageInt::make($image);      
                    $image_resize->save(public_path('images/all/' .$filename.'.'.$extension));            
                    $image_resize->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image_resize->save(public_path('images/all/' .$filename.'_mini.'.$extension));
                    $id_cat=1;
                    Image::add('images/all/'.$filename,$extension,$id_cat,null);                    
                }
                return back();
            }
        }
    } //
    
    public function delImage(Request $request) {
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        $image=new Image;
        
        $image->del($request['id']);
        
    } //
    
    public function girls() {
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        else {
            $girls = Girl::get();
            return view('admin.girls', compact('girls'));
        }
    } //
    
    public function addGirls(Request $request) {        
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        else {
            $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6048',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6048',
            ]);
            if ($validator->fails())
            {
                return back()->withErrors($validator);
            }            
            else
            {
                $id = Girl::add($request->name, $request->curses, $request->vk, $request->inst, $request->description);
                if($request->avatar)
                {
                    $filename = uniqid();
                    $extension = $request->avatar->getClientOriginalExtension();
                    $image_resize = ImageInt::make($request->avatar);    
                    $image_resize->resize(250, 250, function ($constraint) {
                    $constraint->aspectRatio();
                    });
                    $image_resize->save(public_path('images/girls/' .$filename.'.'.$extension));                              
                    $id_cat=2;
                    Image::add('images/girls/'.$filename,$extension,$id_cat,$id); 
                }
                
                                    
                if($request->image)
                {
                    foreach ($request->image as $image) {                    
                        $filename = uniqid();
                        $extension = $image->getClientOriginalExtension();
                        $image_resize = ImageInt::make($image);      
                        $image_resize->save(public_path('images/girls/' .$filename.'.'.$extension));            
                        $image_resize->resize(300, 300, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        $image_resize->save(public_path('images/girls/' .$filename.'_mini.'.$extension));
                        $id_cat=3;
                        Image::add('images/girls/'.$filename,$extension,$id_cat,$id);                    
                    }
                }
                
                return back();
            }
        }
    } //
    
    
    public function editGirls(Request $request) {
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        $validator = Validator::make($request->all(), [
        'id' => 'required',
        'name' => 'required',
        'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6048',
        'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6048',
        ]);
        
        if ($validator->fails())
        {
            return back()->withErrors($validator);
        }            
        else
        {
            $id = Girl::edit($request->id, $request->name, $request->curses, $request->vk, $request->inst, $request->description);
            $girl = Girl::find($request->id);
            $image=new Image();
            if($request->avatar)
            {                
                $image->del($girl->avatar->id);
                $filename = uniqid();
                $extension = $request->avatar->getClientOriginalExtension();
                $image_resize = ImageInt::make($request->avatar);    
                $image_resize->resize(250, 250, function ($constraint) {
                $constraint->aspectRatio();
                });
                $image_resize->save(public_path('images/girls/' .$filename.'.'.$extension));                              
                $id_cat=2;
                Image::add('images/girls/'.$filename,$extension,$id_cat,$id); 
            }
            else if (!$request['cavatar'])
            {
                $image->del($girl->avatar->id);
            }
            $i=0;
            foreach ($girl->images as $image) {
                if (!isset($request->cimage[$i]))
                {
                    $image->del($image->id);
                }
                $i++;
            }          
            if($request->image)
            {
                foreach ($request->image as $image) {                    
                    $filename = uniqid();
                    $extension = $image->getClientOriginalExtension();
                    $image_resize = ImageInt::make($image);      
                    $image_resize->save(public_path('images/girls/' .$filename.'.'.$extension));            
                    $image_resize->resize(300, 300, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image_resize->save(public_path('images/girls/' .$filename.'_mini.'.$extension));
                    $id_cat=3;
                    Image::add('images/girls/'.$filename,$extension,$id_cat,$id);                    
                }
            }
            return back();
        }
    }
        
        
    public function delGirls(Request $request) {
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }  
        $girl=Girl::find($request->id);
        $image=new Image();
        $image->del($girl->avatar->id);
        foreach ($girl->images as $image) {
            $image->del($image->id);
        }      
        $girl->del($request->id);
        return 1;
    } //
    
    
    
    public function reply() {
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        else {
            $images = Image::where('id_cat','=',4)->get();
            return view('admin.reply', compact('images'));
        }
    } //
    
    public function addReply(Request $request) {        
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        else {
            $validator = Validator::make($request->all(), [
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6048',
            ]);
            if ($validator->fails())
            {
                return back()->withErrors($validator);
            }            
            else
            {
                $id_dop=Image::where('id_cat','=','4')->max('id_dop') + 1;
                foreach ($request->image as $image) {                    
                    $filename = uniqid();
                    $extension = $image->getClientOriginalExtension();
                    $image_resize = ImageInt::make($image);      
                    $image_resize->save(public_path('images/all/' .$filename.'.'.$extension));            
                    $image_resize->resize(400, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                    $image_resize->save(public_path('images/all/' .$filename.'_mini.'.$extension));
                    $id_cat=4;                    
                    Image::add('images/all/'.$filename,$extension,$id_cat,$id_dop);                    
                }
                return back();
            }
        }
    } //
    
    public function delReply(Request $request) {
        if (Gate::denies('admin')) {
            return redirect('/admin');
        }
        $image=new Image;
        
        $image->del($request['id']);
        
    } //
}
