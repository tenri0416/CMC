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
    public function index(string $id)
    {
<<<<<<< HEAD
        //
=======

        $memos = Memo::where('directory_id', $id)->get();
        $directory_name = Memo::where('directory_id', $id)->first();


        return view('user.memos.index')->with(['memos' => $memos, 'directory_name' => $directory_name]);

>>>>>>> origin/main
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {


        // $memo = Memo::where('id', $id)->get();

    }

    /**
     * Store a newly created resource in storage.
     */
<<<<<<< HEAD
    public function store(Request $request)
    {
        //
=======
    public function store(Request $request ,$id)
    {

        Memo::create([
            'directory_id' => $id,
            'title' => 'タイトルを入力してください',
            'content' => '内容を入力してください',
        ]);

        $memos = Memo::where('directory_id', $id)->get();
        $directory_name = Memo::where('directory_id', $id)->first();


        return view('user.memos.index')->with(['memos' => $memos, 'directory_name' => $directory_name]);

>>>>>>> origin/main
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
<<<<<<< HEAD
        $memos=Memo::where('directory_id',$id)->get();
        $directory=Directory::find($id)->directory_name;
        return view('user.memos.show')->with(['directory'=>$directory,'memos'=>$memos]);
=======



        $memos = Memo::where('directory_id', $id)->get();
        $directory_name = Memo::where('directory_id', $id)->first();

        return view('user.memos.index')->with(['memos' => $memos, 'directory_name' => $directory_name]);
>>>>>>> origin/main
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        Memo::create([
            'directory_id' => $id,
            'title' => 'タイトルを入力してください',
            'content' => '内容を入力してください',
        ]);
        $ID=$id;

        dd('ディレクトリーのID'.$ID);

        // return redirect()->route('user.expired-users.show')->with(compact('id'));

        return redirect()->route('user.memo.show')->with(['id'=>$ID]);
        // //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
<<<<<<< HEAD
        //
=======
        $memo = Memo::findOrFail($id);
        $memo->title = $request->title;
        $memo->content = $request->content;

        $memo->save();
        return redirect()->route('user.memo.open', ['memo' => $memo]);
>>>>>>> origin/main
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
<<<<<<< HEAD
        Memo::findOrFail($id)->delete(); //
        return redirect()->route('user.memo.show',$id);
        //redirect->routeで渡すときはこの子の渡し方
        //


=======
        //
        Memo::create([
            'directory_id' => $id,
            'title' => 'タイトルを入力してください',
            'content' => '内容を入力してください',
        ]);
        return redirect()->route('user.memo.show')->with(compact('id'));
    }

    public function open(string $id)
    {
        //
        $memo = Memo::where('id', $id)->get();

        return view('user.memos.show', compact('memo'));
>>>>>>> origin/main
    }


}
