<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>取引先参照</title>
    <script src="{{asset('js/sansho.js')}}"></script>
</head>
<body>
<div class="form-container">
	<h2>取引先参照</h2>
    <form>
		<div class="form-inner">
			<div>取引先</div>
			<div>
				<input type="text" name="torihikisaki" id="torihikisaki">
			</div>
			<div>区分</div>
			<div>
				<select name="torihikisaki_kbn" id="torihikisaki_kbn">
					<option value="">--選択なし--</option>
					<option value="1">問屋</option>
					<option value="2">店舗</option>
					<option value="3">他薬局</option>
				</select>
			</div>
			<div>
				<button type="button" onclick="searchTorihikisaki()">検索</button>&nbsp;&nbsp;
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
