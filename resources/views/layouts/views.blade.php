<!DOCTYPE html>
<html xmlns:th="http://www.thymeleaf.org">
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
	<header class="header">
	<h2>薬品在庫管理システム</h2>
	<div class="header-container">
		<div class="header-contents">
			<label>ログイン者：</label>
			<p>{{session('login_shain_name')}}</p>
		</div>
		<div class="header-contents">
			<label>権限：</label>
			<p>{{session('login_kengen_name')}}</p>
		</div>
		<div class="header-contents">
			<label>店舗：</label>
			<p>{{session('login_tenpo_name')}}</p>
		</div>
		<div class="header-contents">
			<a href="/menu">メニューへ戻る</a>
		</div>
	</div>
	</header>
    @yield('content')
</body>
</html>

<style>
html{
	font-size: 16px;
}

*{
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: 'Roboto', 'Noto Sans JP';
}

.header{
	width: 100%;
	height: 100px;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	background: #eee;
	color: #17171b;

}

.header h2{
	font-size: 1.5rem;
}

.header-container{
	display: flex;
}

.header-contents{
	display: flex;
	padding: 10px 20px 0;
}
</style>