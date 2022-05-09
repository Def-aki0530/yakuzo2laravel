@extends('layouts.views')

@section('content')
    <div style="display: flex; flex-direction: column; align-items: center;">
        <h3>社員一覧</h3>

        <form action="searchshain" method="post">
            @csrf
            <table>
                <tr>
                    <th>社員</th>
                    <td>
                        <input type="text" id="shain" name="shain" value="{{$shain}}">
                    </td>
                    <th>ログインフラグ</th>
                    <td>
                        <select id="login_flg" name="login_flg">
                            <option value="">--指定なし--</option>
                            <option value="0" @if($login_flg == "0") selected @endif>ログイン可</option>
                            <option value="1" @if($login_flg == "1") selected @endif>ログイン不可</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>権限</th>
                    <td>
                        <select id="kengen_code" name="kengen_code">
                            <option value="">--指定なし--</option>
                            
                            @foreach($kengen_list as $kengen)
                                <option value="{{$kengen->kengen_code}}"
                                    @if($kengen->kengen_code == $kengen_code) selected @endif>
                                    {{$kengen->kengen_name}}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <th>削除フラグ</th>
                    <td>
                        <select id="delete_flg" name="delete_flg">
                            <option value="">--指定なし--</option>
                            <option value="0">在職社員</option>
                            <option value="1">削除データ</option>
                        </select>
                    </td>
                    <td>
                        <button type="submit" @if($delete_flg == '0') selected @endif >検索</button>
                        <button type="submit" @if($delete_flg == '0') selected @endif>新規作成</button>
                    </td>
                </tr>
            </table>
        </form>

        <div>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            @if(count($list) > 0)
                <div>
                    {{$list->links()}}
                </div>
            @endif
        </div>
        <table>
            <tr>
                <th>社員コード</th>
                <th>社員名</th>
                <th>メールアドレス</th>
                <th>ログインフラグ</th>
                <th>権限</th>
                <th>削除フラグ</th>
                <th>編集</th>
            </tr>
            @foreach($list as $map)
                <tr>
                    <td>{{$map->shain_code}}</td>
                    <td>{{$map->shain_name}}</td>
                    <td>{{$map->mail_address}}</td>
                    @if($map->login_flg == "0")
                        <td>可</td>
                    @else
                        <td>不可</td>
                    @endif
                    <td>{{$map->kengen_name}}</td>
                    @if($map->delete_flg == 0)
                        <td></td>
                    @else
                        <td>削除済</td>
                    @endif
                    <td>
                        <form action="shainedit" method="post">
                            <input type="hidden" name="shain_code" value="{{$map->shain_code}}">
                            <button type="submit">編集</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </table>
    </div>
@endsection

<style>
th{
    padding: 0 40px;
    border: 1px solid #bbb;
    background: #eee;
}

td{
    padding: 0 40px;
    border: 1px solid #eee;
}
    
</style>
