<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Memo;

class MemoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');
        // $this->middleware(function ($request, $next) {

        // $id = $request->route()->parameter('iamge'); //shopのid取得
        // if (!is_null($id)) { // null判定
        //     $ImagesOrderId = Image::findOrFail($id)->owner->id;
        //     $shopId = (int)$ImagesOrderId; // キャスト 文字列→数値に型変換
        //     if ($shopId !==  Auth::id()) {
        //         abort(404); // 404画面表示
        //     }
        // }
        // return $next($request);
        // });
    }
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {

        $memos = Memo::where('directory_id', $id)->get();
        $directory_name = Memo::where('directory_id', $id)->first();


        return view('user.memos.index')->with(['memos' => $memos, 'directory_name' => $directory_name]);

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

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {



        $memos = Memo::where('directory_id', $id)->get();
        $directory_name = Memo::where('directory_id', $id)->first();

        return view('user.memos.index')->with(['memos' => $memos, 'directory_name' => $directory_name]);
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
        $memo = Memo::findOrFail($id);
        $memo->title = $request->title;
        $memo->content = $request->content;

        $memo->save();
        return redirect()->route('user.memo.open', ['memo' => $memo]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
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
    }


}
