<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>薬品参照</title>
    <script src="{{asset('js/sansho.js')}}"></script>
</head>
<body>
    <div class="form-container">
        <h2>薬品参照</h2>
        <form>
            <div class="form-inner">
                <div>薬品</div>
                <div>
                    <input type="text" name="yakuhin" id="yakuhin">
                </div>
                <div>区分</div>
                <div>
                    <select name="yakuhin_kbn" id="yakuhin_kbn2">
                        <option value="">--選択なし--</option>
                        <option value="1">薬品</option>
                        <option value="2">ＯＴＣ</option>
                        <option value="4">特材</option>
                    </select>
                </div>
                <div>
                    <button type="button" onclick="searchYakuhin()">検索</button>&nbsp;&nbsp;
                    <button type="button" onclick="cancel()">キャンセル</button>
                </div>
            </div>		
        </form>

        <nav aria-label="Page navigation" class="w-1/2 mx-auto text-center my-5">
            <ul class="pagination" id="pagination"></ul>
        </nav>
        <div id="list" class="justify-center"></div>
    </div>
</body>
</html>

<style>
.form-container{
	width: 100%;
	display: flex;
	flex-direction: column;
	align-items: center;
}

.form-container form{
	width: 70%;
}

.form-inner{
	width: 100%;
	display: flex;
	justify-content: space-around;
	align-items: center;
}
</style>