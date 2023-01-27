<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return view('memberPage')->with('members', Member::all());
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $member = new Member;

        $member->name                    = $request->name;
        $member->email                   = $request->email;
        $member->membership_type         = $request->membership_type;
        $member->membership_expiration   = $request->membership_expiration;
        $member->trainer_id              = $request->trainer_id;

        $member->save();

        return redirect()->route('memberPage')->with('success', 'New member added successfully!');
    }

    public function show($id)
    {
        $member = Member::find($id);

        return view('show')->with('member', $member);
    }

    public function edit($id)
    {
        $member = Member::find($id);

        return view('editMember')->with('member', $member);
    }

    public function update(Request $request)
    {
        $member = Member::find($request->id);

        $member->name                    = $request->name;
        $member->email                   = $request->email;
        $member->membership_type         = $request->membership_type;
        $member->membership_expiration   = $request->membership_expiration;

        $member->save();

        return redirect()->route('memberPage')->with('success', 'Member updated successfully!');
    }

    public function destroy($id)
    {
        $member = Member::find($id);
        $member->delete();

        return redirect()->route('memberPage')->with('success', 'Member deleted successfully!');
    }
}
