<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>薬品在庫管理</title>
</head>
<body>
    <div>
        <h2>薬品在庫管理システムLaravel</h2>
        <h3>--ログイン--</h3>
        <form action="put_login" method="post">
            @csrf
            <div>
                <label>社員コード</label>
                <input type="text" name="shain_code" value="{{$shain_code}}" required>
            </div>
            <div>
                <label>パスワード</label>
                <input type="password" name="password" value="{{$password}}" required>
            </div>
            <div>
                <label>店舗</label>
                <select name="tenpo_code">
                    <option value="">--店舗を選択--</option>
                    @foreach($list as $tenpo)
                        <option value="{{$tenpo->torihikisaki_code}}"
                            @if($tenpo->torihikisaki_code == $tenpo_code) selected @endif>
                            {{$tenpo->torihikisaki_name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit">送信</button>
            </div>
        </form>

        {{$msg}}
    </div>
</body>
</html>