<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Event;
use App\User;
use Auth;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $events = [];
        $data = Event::where(['user_id'=>$id])->get();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                 [
                     'color' => '#3490dc',
                     'url' => '/update/' . $value->id,
                 ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return view('home', compact('calendar'));
    }

    public function create()
    {
        return view('create');
    }

    public function save(Request $request)
    {
        $event = new Event;

        $event->title = $request->title;
        $event->user_id = Auth::user()->id;
        $event->start_date = $request->start;
        $event->end_date = $request->end;

        $event->save();

        return view('create')->with('success', true);
    }

    public function details($id)
    {
        $event = Event::find($id);
        return view('edit', compact('event'));
    }

    public function update(Request $request)
    {
        $event = Event::find($request->id);

        $event->title = $request->title;
        $event->start_date = $request->start;
        $event->end_date = $request->end;
        
        $event->save();

        return redirect()->route('details', ['id' => $request->id]);
    }

    public function delete($id)
    {
        $event = Event::find($id);
        $event->delete();

        $id = Auth::user()->id;
        $events = [];
        $data = Event::where(['user_id'=>$id])->get();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                 [
                     'color' => '#3490dc',
                     'url' => '/update/' . $value->id,
                 ]
                );
            }
        }
        $calendar = Calendar::addEvents($events);
        return redirect("/");
    }

    public function users()
    {
        $id = Auth::user()->id;
        $users = User::where('id', '!=', $id)->get();
        return view('users', compact('users'));
    }

    public function profile($id)
    {
        $events = [];
        $data = Event::where(['user_id'=>$id])->get();
        if($data->count()) {
            foreach ($data as $key => $value) {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.' +1 day'),
                    null,
                    // Add color and link on event
                 [
                     'color' => '#3490dc',
                     'url' => '',
                 ]
                );
            }
        }
        $name = User::find($id)->name;
        $calendar = Calendar::addEvents($events);
        return view('profile', compact('calendar'))->with(['name'=>$name]);
    }
}
