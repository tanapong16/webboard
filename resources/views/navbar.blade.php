<nav class="navbar navbar-expand navbar-light" style="background-color: #24406e">
	<a class="nav-link" href="{{route('post.index')}}"><font color="#f2f7ff">หน้าหลัก</font></a>
	<a class="nav-link" href="{{ route('category.index') }}"><font color="#f2f7ff">Category</font></a>

    <!-- Authentication Links -->
    @guest

        <a class="nav-link" href="{{ route('login') }}"><font color="#f2f7ff">เข้าสู่ระบบ</font></a>

        @if (Route::has('register'))

        <a class="nav-link" href="{{ route('register') }}"><font color="#f2f7ff">สมัครสมาชิก</font></a>

        @endif
    @else


        <font color="#f2f7ff">Welcome:<strong>{{ Auth::user()->name }}</strong></font> <span class="caret mr-2"></span>

        <a class="nav-link" href="{{ route('user.index', Auth::user()->id) }}"><font color="#f2f7ff">ข้อมูลส่วนตัว</font></a>

        <a  href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <font color="#f2f7ff">ออกจากระบบ</font>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

            @csrf
        </form>

    @endguest


</nav>