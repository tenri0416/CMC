<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Directory;
use Throwable;
use App\Models\Memo;
use Illuminate\Validation\Rules;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Log;

class DirectoryController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth:users');
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
    public function index()
    {
        $directory = Directory::where('user_id', Auth::id())
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view('user.directory.index', compact('directory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.directory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'directory_name' => ['required', 'string', 'max:20', 'min:1'],
        ]);

        try {
            DB::transaction(
                function () use ($request) {
                    $directory = Directory::create([
                        'user_id' => Auth::id(),
                        'directory_name' => $request->directory_name,
                        'created_at'=>new Carbon('now'),
                    ]);
                    Memo::create([
                        'directory_id' => $directory->id,
                        'title' => 'タイトルを入力してください',
                        'content' => '内容を入力してください',
                        'created_at'=>new Carbon('now'),
                    ]);
                },
                2
            );
        } catch (Throwable $e) {
            Log::error($e); //エラーを（例外を)Logに書き込む
            throw $e; //エラー(例外を)画面に出す
        }
        return redirect()->route('user.directory.index')->with(['message' => '新規フォルダを作成しました','status' => 'info']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $directory=Directory::findOrFail($id);
        return view('user.directory.edit',compact('directory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'directory_name' => ['required', 'string', 'max:20','min:1'],

        ]);

        $directory=Directory::findOrFail($id);
        $directory->directory_name=$request->directory_name;
        $directory->user_id=Auth::id();
        $directory->save();
        return redirect()->route('user.directory.index')->with(['message' => 'フォルダ名を変更しました','status' => 'green']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Directory::findOrFail($id)->delete(); //ソフトデリート
        return redirect()->route('user.directory.index')->with(['message' => 'フォルダを削除しました','status' => 'alert']);
    }
}
