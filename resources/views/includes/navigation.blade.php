    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">MoneTraak</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                @if (Auth::check())
                    <ul class="nav navbar-nav">
                        <li><a href="{{ route('view.money') }}">Money Track</a></li>
                    </ul>
                @endif

                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="/auth/login">Login</a></li>
                        <li><a href="/auth/register">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/auth/logout">Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>