<?php
namespace Admin\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Model\Schedule\ModelName as Schedule;
use Model\Channel\ModelName as Channel;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $channels = Channel::where('published','=','1')->get();

        setlocale(LC_TIME, 'ru_RU.CP1251', 'rus_RUS.CP1251', 'Russian_Russia.1251');

        $test = \Model\Schedule\ModelName::orderBy('created_at', 'desc')->first();

        $schedules = Schedule::orderBy('created_at', 'desc')->get();

        if(!empty($schedules)){

            $programs = array();

            foreach($schedules as $schedule){
                $program = json_decode($schedule->program);
                $programNew = array_add($program, 'date', $schedule->date);

                $programs[] =$programNew;
            }
        }

        $programs = array_reverse($programs);

        return view('Admin::schedule.index', [
            'schedules' => $schedules,
            'programs' => $programs,
            'channels' => $channels
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $channels = \Model\Channel\ModelName::where('published','=','1')->lists('display', 'id')->toArray();
        return view('Admin::schedule.create', [
            'schedule' => new Schedule,
            'channels' => $channels
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        setlocale(LC_TIME, 'ru_RU.CP1251', 'rus_RUS.CP1251', 'Russian_Russia.1251');

//        dd($request);

        $schedule = Schedule::create($request->except('owner_id','q'));

        $date = $request->date;

        $string = $request->extra;
//        dd($string);
        $new_string2 = array();

        $new_string = preg_split('/[\r\n#]+/', $string, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        foreach($new_string as $new_string1)
        {
            if(!(ctype_space($new_string1)))
                $new_string2[] = $new_string1;
        }

        $program = array();

        if($new_string2)
        {
            for($i=0; $i<count($new_string2); $i++)
            {
                for($j=0; $j<count($new_string2); $j++)
                {
                    if($j%2==0)
                    {
                        $program = array_add($program, $j/2, ['time' => $new_string2[$j], 'name' => $new_string2[$j+1]]);
                    }
                }
            }
        }

        $jsonProgram = json_encode($program);

        $schedule->date = $date;
        $schedule->program = $jsonProgram;
        $schedule->extra = $string;

        $schedule->save();

        return redirect()->route('admin.schedule.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Schedule $schedule)
    {
        $date = $schedule->date;
        $program = json_decode($schedule->program);

        return view('Admin::schedule.show', [
            'date' => $date,
            'program' => $program,
            'schedule' => $schedule
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $channels = \Model\Channel\ModelName::where('published','=','1')->lists('display', 'id')->toArray();
        $date = $schedule->date;
//        $program = json_decode($schedule->program);
        $extra = $schedule->extra;

        return view('Admin::schedule.edit', [
            'date' => $date,
            'extra' => $extra,
            'schedule' => $schedule,
            'channels' => $channels
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schedule $schedule)
    {
        $string = $request->extra;
        $new_string2 = array();

        $new_string = preg_split('/[\r\n#]+/', $string, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);


        foreach($new_string as $new_string1)
        {
            if(!(ctype_space($new_string1)))
                $new_string2[] = $new_string1;
        }

        $program = array();

        if($new_string2)
        {
            for($i=0; $i<count($new_string2); $i++)
            {
                for($j=0; $j<count($new_string2); $j++)
                {
                    if($j%2==0)
                    {
                        $program = array_add($program, $j/2, ['time' => $new_string2[$j], 'name' => $new_string2[$j+1]]);
                    }
                }
            }
        }

        $jsonProgram = json_encode($program);

        $schedule->date = $request->date;
        $schedule->program = $jsonProgram;
        $schedule->extra = $request->extra;

        $schedule->update();

        return redirect()->route('admin.schedule.show', $schedule);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('admin.schedule.index');
    }

    public  function channel($channel)
    {
        $schedules = Schedule::where('channel_id','=',$channel->id)->orderBy('date','asc')->get();
//        dd($schedules);

        return view('Admin::schedule.channel', [
            'schedules' => $schedules,
            'channel' => $channel,
        ]);
    }
}
