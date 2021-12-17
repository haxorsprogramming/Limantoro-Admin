<aside id="slide-out" class="side-nav white fixed">
    <div class="side-nav-wrapper">
        <div class="sidebar-profile">
            <div class="sidebar-profile-image">
                <img src="{{ asset('file/user_pic/'.$username.'.png') }}" class="circle" alt="">
            </div>
            <div class="sidebar-profile-info">
                <a href="javascript:void(0);" class="account-settings-link">
                    <p>{{ $username }} - ({{ $caps }})</p>
                </a>
            </div>
        </div>
       
        @if($role == '1')
            @include('layout.roleAccess.owner')
        @elseif($role == '2')
            @include('layout.roleAccess.manager')
        @elseif($role === '3')
            @include('layout.roleAccess.managerLapangan')
        @else
            @include('layout.roleAccess.purchasing')
        @endif

        <div class="footer">
            <p class="copyright">Limantoro © </p>
            <a href="#!">Kactus </a>
        </div>
    </div>

</aside>