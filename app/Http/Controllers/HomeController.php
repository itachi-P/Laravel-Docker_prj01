<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Image;

class HomeController extends Controller
{
    public function home()
    {
        $images = Image::all();
        return view('home', ['images' => $images]);
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => [
                'required', // 入力必須であること    
                'file',     // アップロードされたファイルであること
                'image',    // 画像ファイルであること
                'mimes:jpeg,png',   // MIMEタイプを指定
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            //storeメソッドを使うとlocalhost:8000に固定されてしまうので他のやり方に回避(画像ファイル名加工なし)
            //$path = $request->file->store('public');
            $filename = $request->file->getClientOriginalName(); //一意なID発行の方が望ましい
            $move = $request->file->move('./images/SpiceCurry/', $filename);

            //仮実装
            $user_id = '1';

            $images = new Image;
            $images->fill(['user_id' => $user_id, 'filename' => $filename])->save();
            $images = Image::all();
            $parameters = ['user_id' => $user_id, 'filename' => $filename, 'images' => $images];
            return view('home', $parameters);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }
}
