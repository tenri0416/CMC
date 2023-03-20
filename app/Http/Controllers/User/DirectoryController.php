<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Directory;
use Throwable;
use Illuminate\Validation\Rules;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
            'directory_name' => ['required', 'string', 'max:50', 'min:1'],
        ]);

        try {
            DB::transaction(
                function () use ($request) {
                    $directory = Directory::create([
                        'user_id' => Auth::id(),
                        'directory_name' => $request->directory_name,

                    ]);
                },
                2
            );
        } catch (Throwable $e) {
            Log::error($e); //エラーを（例外を)Logに書き込む
            throw $e; //エラー(例外を)画面に出す
        }
        return redirect()->route('user.directory.index');
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
        //
    }
}
