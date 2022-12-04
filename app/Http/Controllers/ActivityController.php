<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Activity;
use App\Models\Monitor;
use App\Models\CulturalRight;
use App\Models\Expertise;
use App\Models\Nac;
use Carbon\Carbon;
use Response;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::with(['monitor', 'cultural_right', 'nac', 'expertise'])->orderBy('updated_at', 'DESC')->get();

        return Inertia::render('Index', [
            'activities' => $activities,
        ]);
    }

    public function list()
    {
        $activities = Activity::with(['monitor', 'cultural_right', 'nac', 'expertise'])->orderBy('updated_at', 'DESC')->get();

        return $activities;
    }

    public function create()
    {
        $monitors = Monitor::orderBy('name', 'ASC')->get();
        $cultural_rights = CulturalRight::orderBy('name', 'ASC')->get();
        $expertises = Expertise::orderBy('name', 'ASC')->get();
        $nacs = Nac::orderBy('name', 'ASC')->get();

        $consecutive = Activity::latest()->first();

        return Inertia::render('Create', [
            'monitors' => $monitors,
            'cultural_rights' => $cultural_rights,
            'expertises' => $expertises,
            'nacs' => $nacs,
            'consecutive' => $consecutive->id + 1 ?? 1
        ]);
    }

    public function new()
    {
        $monitors = Monitor::orderBy('name', 'ASC')->get();
        $cultural_rights = CulturalRight::orderBy('name', 'ASC')->get();
        $expertises = Expertise::orderBy('name', 'ASC')->get();
        $nacs = Nac::orderBy('name', 'ASC')->get();

        $consecutive = Activity::latest()->first();

        return response()->json([
            'monitors' => $monitors,
            'cultural_rights' => $cultural_rights,
            'expertises' => $expertises,
            'nacs' => $nacs,
            'consecutive' => $consecutive->id + 1 ?? 1
        ]);
    }

    public function store()
    {
        return Request::all();

        Request::validate([
            'consecutive' => ['required', 'unique:activities'],
            'activity_name' => ['required', 'max:250'],
            'start_time' => ['required'],
            'cultural_right_id' => ['required'],
            'monitor_id' => ['required'],
            'expertise_id' => ['required'],
            'activity_date' => ['required'],
            'final_hour' => ['required'],
            'nac_id' => ['required']
        ]);

        $start_time = Carbon::createFromFormat('h:i A', Request::get('start_time')['hh'] . ':' . Request::get('start_time')['mm'] . ' ' . Request::get('start_time')['a']);
        $final_hour = Carbon::createFromFormat('h:i A', Request::get('final_hour')['hh'] . ':' . Request::get('final_hour')['mm'] . ' ' . Request::get('final_hour')['a']);

        if ($final_hour->lt($start_time)) {
            return;
        }

        Activity::create([
            'consecutive' => Request::get('consecutive'),
            'activity_name' => Request::get('activity_name'),
            'start_time' => $start_time->format('H:i:s'),
            'cultural_right_id' => Request::get('cultural_right_id'),
            'monitor_id' => Request::get('monitor_id'),
            'expertise_id' => Request::get('expertise_id'),
            'activity_date' => Request::get('activity_date'),
            'final_hour' => $final_hour->format('H:i:s'),
            'nac_id' => Request::get('nac_id')
        ]);

        return Redirect::route('activities')->with('success', 'La actividad ha sido creada correctamente.');
    }

    public function save()
    {
        Request::validate([
            'consecutive' => ['required', 'unique:activities'],
            'activity_name' => ['required', 'max:250'],
            'start_time' => ['required'],
            'cultural_right_id' => ['required'],
            'monitor_id' => ['required'],
            'expertise_id' => ['required'],
            'activity_date' => ['required'],
            'final_hour' => ['required'],
            'nac_id' => ['required']
        ]);

        $start_time = Carbon::createFromFormat('h:i A', Request::get('start_time')['hh'] . ':' . Request::get('start_time')['mm'] . ' ' . Request::get('start_time')['a']);
        $final_hour = Carbon::createFromFormat('h:i A', Request::get('final_hour')['hh'] . ':' . Request::get('final_hour')['mm'] . ' ' . Request::get('final_hour')['a']);

        if ($final_hour->lt($start_time)) {
            return;
        }

        Activity::create([
            'consecutive' => Request::get('consecutive'),
            'activity_name' => Request::get('activity_name'),
            'start_time' => $start_time->format('H:i:s'),
            'cultural_right_id' => Request::get('cultural_right_id'),
            'monitor_id' => Request::get('monitor_id'),
            'expertise_id' => Request::get('expertise_id'),
            'activity_date' => Request::get('activity_date'),
            'final_hour' => $final_hour->format('H:i:s'),
            'nac_id' => Request::get('nac_id')
        ]);
    }
}
