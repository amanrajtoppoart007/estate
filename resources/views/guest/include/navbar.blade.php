<nav class="navbar navbar-expand-lg navbar-light bg-light main-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{URL::to('/')}}">Al Hoor Real Estate</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{URL::to('/')}}">HOME <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('property.search',['mode'=>2])}}">BUY</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('property.search',['mode'=>1])}}">RENT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('property.agent.list')}}">AGENTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">LOGIN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">SIGN UP</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
