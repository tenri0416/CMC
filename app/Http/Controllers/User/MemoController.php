<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Memo;
use App\Models\Directory;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $memos=Memo::where('directory_id',$id)->get();
        $directory=Directory::find($id)->directory_name;
        return view('user.memos.show')->with(['directory'=>$directory,'memos'=>$memos]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Memo::findOrFail($id)->delete(); //
        return redirect()->route('user.memo.show',$id);
        //redirect->routeで渡すときはこの子の渡し方
        //


    }
}
