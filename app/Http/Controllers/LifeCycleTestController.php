<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleTestController extends Controller
{
    public function showServiceContainerTest()
    {
        app()->bind('lifeCycleTest', function () {
            return 'ライフサイクルテスト';
        });

        $test = app()->make('lifeCycleTest');

        //サービスコンテナなしのパターン
        // $message = new Message();
        // $asmple = new Sample($message);
        // $asmple->run();

        //サービスコンテナを使うパターン sampleという名前で格納
        app()->bind('sample', Sample::class);
        $sample = app()->make('sample'); //sampleという名前で取り出す

        $sample->run();
        //dd(app())で中身を確認できる　
        dd($test, app());
    }
    public function showServiceProviderTest()
    {
        $encrypt = app()->make('encrypter');
        $password = $encrypt->encrypt('pantu');


        $sample = app()->make('serviceProviderTest');

        dd($sample, $password, $encrypt->decrypt($password));
    }
}
class Sample
{
    public $message;
    public function __construct(Message $message)
    {
        $this->message = $message;
    }
    public function run()
    {
        $this->message->send();
    }
}
class Message
{
    public function send()
    {
        echo "メッセージ表示";
    }
}
