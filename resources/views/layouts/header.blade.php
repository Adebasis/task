<div class="wrapper">
    <section class="top_bar clearfix">
        <a href="." class="logo" style="float:left; margin-left:-20px;></a>
        <a class="toggle_menu_butn"><img src="{{asset('images/menu_icon.png')}}" alt=""/></a>
        <ul class="right_links">
            
            <li><a>Welcome :{{ Auth::User()->name }}</a></li>
          
            <li class="dropdown">
                <a class="dropdown-toggle" type="button" data-toggle="dropdown" style="cursor:pointer;">Settings
                <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    
                    <li><a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                </ul>
            </li>
        </ul>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
         </form>
    </section>

    
                                        