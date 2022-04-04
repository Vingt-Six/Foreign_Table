<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Member;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Gender::all();
        return view('pages.member.createmember', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'src' => 'required',
            'genre' => 'required',
            'name' => 'required|min:2',
            'age' => 'required|integer|min:1|max:100'
        ]);

        $store = new Member();
        $store->src = $request->file('src')->hashName();
        Storage::put('public/', $request->file('src'));
        $store->genre = $request->genre;
        $store->name = $request->name;
        $store->age = $request->age;
        $store->save();
        return redirect('/')->with('success', 'Le membre a bien été ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        $genres = Gender::all();
        return view('pages.member.editmember', compact('member', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'genre' => 'required',
            'name' => 'required|min:2',
            'age' => 'required|integer|min:1|max:100'
        ]);

        if ($request->src == !null) {
            Storage::delete('public/' . $member->src);
            $member->src = $request->file('src')->hashName();
            Storage::put('public/', $request->file('src'));
        }
        $member->genre = $request->genre;
        $member->name = $request->name;
        $member->age = $request->age;
        $member->save();
        return redirect('/')->with('success', 'Le membre a bien été éditer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        Storage::delete('public/' . $member->src);
        $member->delete();
        return redirect('/')->with('danger', 'Delete Successfully');
    }

    public function download($id)
    {
        $dl = Member::find($id);
        // $path = storage_path('public/'. $dl->src);
        // return response()->download($path);
        return Storage::download('public/' . $dl->src);
    }
}
