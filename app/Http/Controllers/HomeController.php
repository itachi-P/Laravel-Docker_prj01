<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Image;

class HomeController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('home', ['images' => $images]);
    }

    /**
     * ファイルアップロード処理
     */
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
            //$path = $request->file->store('public');
            $filename = $request->file->getClientOriginalName(); //一意なID発行の方が望ましい
            $move = $request->file->move('./images', $filename);

            $images = new Image;
            $images->fill(['filename' => $filename])->save();
            $images = Image::all();
            $parameters = ['filename' => $filename, 'images' => $images];
            return view('home', $parameters);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors();
        }
    }
}
