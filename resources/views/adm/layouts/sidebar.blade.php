<ul id="slide-out" class="sidenav sidenav-fixed col l2 personalSideBar">

	<div class="pad-15">
		<span class="LeftSideBar">
			<span class="ml-20">
				<div class="fw7 fs22">Pizza Shop</div>
			</span>
		</span>
	</div>

	<div class="DivSideBar">
		<span class="LeftSideBar">
			<i class="material-icons">account_circle</i>
			<span class="ml-20">
				<div class="fw4 fs16">Welcome,</div>
				<div class="fs16">{{ucwords(Auth::user()->name)}}</div>
			</span>
		</span>
	</div>

	<ul class="collapsible z-depth-0">
		<li class="bold {{(\Request::is('adm/orders*'))?'only active':''}}">
			<a href="{{route('orders.index')}}" class="collapsible-header waves-effect"><i class="material-icons">room_service</i><span>Orders</span></a>
		</li>

		<li class="bold {{(\Request::is('adm/pizzas*'))?'only active':''}}">
			<a class="collapsible-header waves-effect"><i class="material-icons">local_pizza</i><span>Menú</span><i class="material-icons right">arrow_drop_down</i></a>
			<div class="collapsible-body">
				<div class="{{(\Request::is('adm/pizzas*'))?'on':''}}">
					<a href="{{route('pizzas.index')}}" class="collapsible-header waves-effect">
						Pizzas
					</a>
				</div>
			</div>
		</li>

		<li class="bold {{(\Request::is('adm/ingredients*'))?'only active':''}}">
			<a class="collapsible-header waves-effect"><i class="material-icons">assignment</i><span>Stock</span><i class="material-icons right">arrow_drop_down</i></a>
			<div class="collapsible-body">
				<div class="{{(\Request::is('adm/ingredients*'))?'on':''}}">
					<a href="{{route('ingredients.index')}}" class="collapsible-header waves-effect">
						Ingredients
					</a>
				</div>
			</div>
		</li>
	</ul>
</ul>






