<nav>
    <ul>
        @if(Auth::check())
            <li><a href="{{ URL::route('account-sign-out') }}">Sign Out</a></li>
            <li class="nav-divider">|</li>
            <li><a href="{{ URL::route('account-change-password') }}">Change Password</a></li>
            <li class="nav-divider">|</li>
        @else
            <li><a href="{{ URL::route('account-sign-in') }}">Sign in</a></li>
            <li class="nav-divider">|</li>
            <li><a href="{{ URL::route('account-create') }}">Create Account</a></li>
            <li class="nav-divider">|</li>
            <li><a href="{{ URL::route('account-forgot-password') }}">Forgot Password</a></li>
        @endif
    </ul>
</nav>

