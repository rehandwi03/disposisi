<div class="dashboard-header">
    <nav class="navbar navbar-expand-lg fixed-top bg-light">
        <a class="navbar-brand" href="{{ route('home')}}">E-DISPOSISI</a>
        {{-- style="color: #00923f" --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto navbar-right-top">
                {{-- <li class="nav-item">
                    <div id="custom-search" class="top-search-bar">
                        <input class="form-control" type="text" placeholder="Search..">
                    </div>
                </li>
                <li class="nav-item dropdown notification">
                    <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span
                            class="indicator"></span></a>
                    <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                        <li>
                            <div class="notification-title"> Notification</div>
                            <div class="notification-list">
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action active">
                                        <div class="notification-info">
                                            <div class="notification-list-user-img"><img
                                                    src="{{ asset('assets/images/avatar-2.jpg') }}" alt=""
                class="user-avatar-md rounded-circle">
        </div>
        <div class="notification-list-user-block"><span class="notification-list-user-name">Jeremy
                Rakestraw</span>accepted
            your invitation to join the team.
            <div class="notification-date">2 min ago</div>
        </div>
</div>
</a>
<a href="#" class="list-group-item list-group-item-action">
    <div class="notification-info">
        <div class="notification-list-user-img"><img src="{{ asset('assets/images/avatar-3.jpg') }}" alt=""
                class="user-avatar-md rounded-circle"></div>
        <div class="notification-list-user-block"><span class="notification-list-user-name">John Abraham </span>is now
            following you
            <div class="notification-date">2 days ago</div>
        </div>
    </div>
</a>
<a href="#" class="list-group-item list-group-item-action">
    <div class="notification-info">
        <div class="notification-list-user-img"><img src="{{ asset('assets/images/avatar-4.jpg') }}" alt=""
                class="user-avatar-md rounded-circle"></div>
        <div class="notification-list-user-block"><span class="notification-list-user-name">Monaan Pechi</span> is
            watching
            your main repository
            <div class="notification-date">2 min ago</div>
        </div>
    </div>
</a>
<a href="#" class="list-group-item list-group-item-action">
    <div class="notification-info">
        <div class="notification-list-user-img"><img src="{{ asset('assets/images/avatar-5.jpg') }}" alt=""
                class="user-avatar-md rounded-circle"></div>
        <div class="notification-list-user-block"><span class="notification-list-user-name">Jessica
                Caruso</span>accepted
            your invitation to join the team.
            <div class="notification-date">2 min ago</div>
        </div>
    </div>
</a>
</div>
</div>
</li>
<li>
    <div class="list-footer"> <a href="#">View all notifications</a></div>
</li>
</ul>
</li> --}}
{{-- <li class="nav-item dropdown connection">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                    <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                        <li class="connection-list">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                    <a href="#" class="connection-item"><img
                                            src="{{ asset('assets/images/github.png') }}" alt="">
<span>Github</span></a>
</div>
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
    <a href="#" class="connection-item"><img src="{{ asset('assets/images/dribbble.png') }}" alt="">
        <span>Dribbble</span></a>
</div>
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
    <a href="#" class="connection-item"><img src="{{ asset('assets/images/dropbox.png') }}" alt="">
        <span>Dropbox</span></a>
</div>
</div>
<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
        <a href="#" class="connection-item"><img src="{{ asset('assets/images/bitbucket.png') }}" alt="">
            <span>Bitbucket</span></a>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
        <a href="#" class="connection-item"><img src="{{ asset('assets/images/mail_chimp.png') }}" alt=""><span>Mail
                chimp</span></a>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
        <a href="#" class="connection-item"><img src="{{ asset('assets/images/slack.png') }}" alt="">
            <span>Slack</span></a>
    </div>
</div>
</li>
<li>
    <div class="conntection-footer"><a href="#">More</a></div>
</li>
</ul>
</li> --}}
<li class="nav-item dropdown nav-user">
    <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false"><img src="{{ asset('uploads/user/' . Auth::user()->photo) }}" alt=""
            class=" user-avatar-md rounded-circle">
        <span class="avatar-badge online"></span></a>
    <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
        <div class="nav-user-info">
            <h5 class="mb-0 text-white nav-user-name">{{ Auth::user()->nama_lengkap }}</h5>
            @foreach (Auth::user()->getRoleNames() as $row)
            <label for="" class="badge badge-info">
                <span class="ml-2">{{ $row }}</span>
            </label>
            @endforeach
        </div>
        <a class="dropdown-item" href="{{ route('account.index') }}"><i class="fas fa-user mr-2"></i>Account</a>
        {{-- <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a> --}}
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button class="dropdown-item" href=""><i class="fas fa-power-off mr-2"></i>Logout</a>
        </form>
    </div>
</li>
</ul>
</div>
</nav>
</div>