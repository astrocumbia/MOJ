<h1>Home</h1>
<h3>Bienvenido {{ Auth::user()->name }}</h3>
<a href="{{url('/auth/logout')}}">Logout</a>