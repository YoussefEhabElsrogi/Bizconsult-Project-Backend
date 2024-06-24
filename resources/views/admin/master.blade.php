@include('admin.partials.head')

<div class="wrapper">

    @include('admin.partials.navbar')

    @include('admin.partials.sidebar')


    <main role="main" class="main-content">
        @yield('content')
    </main>

</div>

@include('admin.partials.scripts')
