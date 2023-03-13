<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();

        return view('member.index', [ 'members' => $members ]);
    }

    public function create()
    {
        return view('member.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'address' => ['required', 'string'],
            'phone' => ['required', 'digits_between:10,13'],
        ]);

        // INSERT INTO members(...) values (...)
        $member = new Member;
        $member->name = $request->name;
        $member->age = $request->age;
        $member->address = $request->address;
        $member->phone = $request->phone;
        $member->save();

        return redirect('/members');
    }

    public function edit($memberId)
    {
        $member = Member::find($memberId);

        return view('member.edit', ['member' => $member]);
    }

    public function update(Request $request, $memberId)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|integer',
            'address' => ['required', 'string'],
            'phone' => ['required', 'digits_between:10,20'],
        ]);

        $member = Member::find($memberId);
        $member->name = $request->name;
        $member->age = $request->age;
        $member->address = $request->address;
        $member->phone = $request->phone;
        $member->save();

        return redirect('/members');
    }

    public function delete($memberId)
    {
        $member = Member::find($memberId);
        $member->delete();

        return redirect('/members');
    }
}
