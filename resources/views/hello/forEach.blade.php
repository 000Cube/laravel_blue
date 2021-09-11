<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello/Blade</title>
    <style>
        body {font-size: 16pt; color: #999;}
        h1 {font-size: 100pt; text-align: right; color: #f6f6f6; margin: -50px 0px -100px 0px;}
    </style>
</head>
<body>
    <h1>Blade ForEach</h1>

    <p>foreachディレクティブの例</p>
        @foreach($data as $item)
            @if ($loop->first)
                <p>データ一覧</p><ul>
            @endif
            <li>No.{{$loop->iteration}}.{{$item}}</li>
            @if($loop->last)
            </ul><p>ここまで</p>
            @endif
        @endforeach

</body>
</html>