<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/dashbord">Dashbord</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="{{route('post')}}">post</a>
      </li>
    </ul>
    <ul class="navbar-nav my-2 my-lg-0">

      @if(auth()->user())
      <!-- @auth() -->
      <li class="nav-item">
        <form action="/logout" method="POST">
          @csrf
           <input type="submit" class="nav-link" value="logout" style="background: none; border: none;">
        </form>

      </li>

      <li class="nav-item">
        <a href="#" class="nav-link">{{auth()->user()->name}}</a>
      </li>
      <!-- @endauth -->
      @else
      <!-- @guest -->
    	<li class="nav-item">
    		<a href="register" class="nav-link">Register</a>
    	</li>
    	  <li class="nav-item">
    		<a href="/login" class="nav-link">Login</a>
    	</li>
      <!-- @endguest -->
      @endif
    </ul>
  </div>
</nav>