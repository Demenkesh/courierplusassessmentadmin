<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/approve-user') ? 'active' : '' }}" href="{{ url('admin/approve-user') }}">
            <div class="fa-solid fa-tv" style="color: #d733d17f;">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Approve Tenats</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ request()->is('/admin/viewpost') ? 'active' : '' }}"
            href="{{ url('/admin/viewpost') }}">
            <div class="fa-solid fa-tv" style="color: #d733d17f;">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">View All Post</span>
        </a>
    </li>

    {{-- <li class="nav-item">
        <a class="nav-link  {{ request()->is('admin/cdrportsip/show') ? 'active' : '' }} "
            href="{{ url('admin/cdrportsip/show') }}">
            <div class="fa-solid fa-user">
                <i class="ni ni-calendar-grid-58 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Cdr for Portsip</span>
        </a>
    </li> --}}

    {{-- <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/user') }}">
            <div class="fa-solid fa-user">
                <i class="ni ni-calendar-grid-58 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/card') }}">
            <div class="fa-regular fa-credit-card">
                <i class="ni ni-calendar-grid-58 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Card</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/user/card') }}">
            <div class="fa-regular fa-credit-card">
                <i class="ni ni-calendar-grid-58 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">User purchase Card</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/kycs') }}">
            <div class="fa-solid fa-wallet fa-shake fa-sm" style="color: #3c7dc8;">
                <i class="ni ni-calendar-grid-58 text-red text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Kyc Verfi...</span>
        </a>
    </li>
        <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/wallet') }}">
            <div class="fa-solid fa-wallet fa-shake fa-sm" style="color: #3c7dc8;">
                <i class="ni ni-calendar-grid-58 text-red text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Trustwallet</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/transactions') }}">
            <div class="fa-solid fa-money-bill-transfer fa-spin-pulse" style="color: #a21cae;">
                <i class="ni ni-calendar-grid-58 text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Transactions</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/buy')}}">
            <div class="fa-solid fa-gas-pump fa-fade" style="color: #9ab815;">
                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">User_buycoin</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('admin/walletsetup') }}">
            <div class="fa-solid fa-wallet fa-shake fa-sm" style="color: #1d1aa6;">
                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Wallet_setup</span>
        </a>
    </li> --}}


</ul>
