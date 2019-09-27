<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>home</title>
    <link rel="icon" href="{{ asset('fuca_tehepero_icon_32x32.ico') }}" sizes="32x32">
</head>
<body>

{{-- imagesテーブルから取得した保存済み画像リンク一覧 --}}
@if (isset($images))    
<ul>
    @foreach ($images as $image)
    <li>
        <a href="images/{{ $image->filename }}" target="_brank">
            <img src="images/{{ $image->filename }}" width="120px" height="100px" />
        </a>   
    </li>
    @endforeach
</ul>
@endif

<!-- エラーメッセージ。なければ表示しない -->
@if ($errors->any())
<ul>
    @foreach ($errors as $error)
    <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

<!-- フォーム -->
<form action="{{ url('upload') }}" method="POST" enctype="multipart/form-data">

    <label for="photo">画像ファイル:</label>
    <input type="file" class="form-control" name="file">
    <br>
    <hr>
    {{ csrf_field() }}
    <button class="btn btn-succes"> Upload </button>
</form>

</body>
</html>
