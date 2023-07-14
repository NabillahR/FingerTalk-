<!-- Top Nav -->
<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
        <a class="nav-link dropdown-toggle name-user" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ Auth::user()->name }}
            <img src="https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?w=1060&t=st=1673545950~exp=1673546550~hmac=9e7dcfa691a936b5dc14ee32361c4836f9c8c4a4ef3d5a597bc88f0ff6419660" alt="Foto profil" class="rounded-circle foto-profil">
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="#"><i class="fa fa-key"></i> Change Password</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i> {{ __('Logout') }}
                </a>
    
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
<!--End Top Nav -->