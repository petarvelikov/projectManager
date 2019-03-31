<header id="page-header">
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Мениджър на проекти</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="/"><i class="fas fa-home">&nbsp;</i>Начало</a>
                        </li>
                    @endguest
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/projects"><i class="fas fa-tachometer-alt">&nbsp;</i>Проекти и задачи</a>
                        </li>
                    @endauth
                </ul>

                <ul class="nav navbar-nav ml-auto">
                    @guest
                        <div id="login-form" class="row">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4" style="margin-bottom: 0">
                                        <input class="form-control p-3" type="text" name="username" value="{{ old('username') }}" placeholder="username" autocomplete="off" required />
                                    </div>
                                    <div class="form-group col-md-4" style="margin-bottom: 0">
                                        <input class="form-control p-3" type="password" name="password" placeholder="password" autocomplete="off" required />
                                    </div>
                                    <div class="form-group col-md-2" style="margin-bottom: 0">
                                        <button type="submit" class="btn btn-success">Вход</button>
                                    </div>
                                    <div class="form-group col-md-2" style="margin-bottom: 0">
                                        <a class="btn btn btn-primary" href="/register">Регистрация</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endguest

                    @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt">&nbsp;Изход</i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>
