<?php

namespace App\Http\Controllers;
use App\Models\Trainer;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        return view('trainerPage')->with('trainers', Trainer::all());
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $trainer = new Trainer;

        $trainer->name                    = $request->name;
        $trainer->email                   = $request->email;
        $trainer->specialization          = $request->specialization;
        $trainer->phone                   = $request->phone;

        $trainer->save();

        return redirect()->route('trainerPage')->with('success', 'New Trainer added successfully!');
    }

    public function show($id)
    {
        $trainer = Trainer::find($id);

        return view('show')->with('trainer', $trainer);
    }

    public function edit($id)
    {
        $trainer = Trainer::find($id);

        return view('editTrainer')->with('trainer', $trainer);
    }

    public function update(Request $request)
    {
        $trainer = Trainer::find($request->id);

        $trainer->name                    = $request->name;
        $trainer->email                   = $request->email;
        $trainer->specialization          = $request->specialization;
        $trainer->phone                   = $request->phone;

        $trainer->save();

        return redirect()->route('trainerPage')->with('success', 'Trainer updated successfully!');
    }

    public function destroy($id)
    {
        $trainer = Trainer::find($id);
        $trainer->delete();

        return redirect()->route('trainerPage')->with('success', 'Trainer deleted successfully!');
    }
}

