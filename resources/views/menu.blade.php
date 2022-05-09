@extends('layouts.views')

@section('content')

<div class="menu">
		<h3>メインメニュー</h3>
		<div class="menu-container">
			<div class="menu-contents">
				<div>業務メニュー</div>
				<div>
					<ul>
                        @foreach($dutiesList as $menu)
                            <li>
                                <a href="{{$menu->menu_uri}}">{{$menu->menu_name}}</a>
                            </li>
                        @endforeach
					</ul >
				</div>
			</div>
			<div class="menu-contents">
				<div>在庫管理メニュー</div>
				<div>
					<ul>
                        @foreach($stockList as $menu)
                            <li>
                                <a href="{{$menu->menu_uri}}">{{$menu->menu_name}}</a>
                            </li>
                        @endforeach
					</ul >
				</div>
			</div>
			<div class="menu-contents">
				<div>システムメニュー</div>
				<div>
					<ul>
                        @foreach($systemList as $menu)
                            <li>
                                <a href="{{$menu->menu_uri}}">{{$menu->menu_name}}</a>
                            </li>
                        @endforeach
					</ul >
				</div>
			</div>
		</div>
	</div>

@endsection

<style>
html{
	fontsize: 16px;
}

*{
	padding: 0;
	margin: 0;
	box-sizing: border-box;
	font-family: 'Roboto', 'Noto Sans JP';
}

.menu{
	display: flex;
	flex-direction: column;
	align-items: center;
	padding: 30px;
}

.menu h3{
	font-size: 1.2rem;
}

.menu-container{
	display: flex;
}

.menu-contents{
	width: 240px;
}

.menu-contents li{
	list-style: none;
}

.menu-contents li a {
	text-decoration: none;
	color: #17171b;
}
</style>