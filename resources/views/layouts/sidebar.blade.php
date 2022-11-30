<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item @if(str_contains(url()->current(), 'home')) active @endif">
        <a class="nav-link" href="/home">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <li class="nav-item @if(str_contains(url()->current(), 'categories')) active @endif">
        <a class="nav-link" href="/categories">
            <i class="fas fa-sitemap"></i>
            <span>Categories</span></a>
    </li>

    <li class="nav-item @if(str_contains(url()->current(), 'products')) active @endif">
        <a class="nav-link" href="/products">
            <i class="fab fa-product-hunt"></i>
            <span>Products</span></a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">
</ul>
