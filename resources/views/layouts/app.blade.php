
@include('/pages/partials/header')
@include('/pages/partials/sidebar')
@include('/pages/partials/nav')



<main class="py-4">
    @yield('content')
</main>

@include('/pages/partials/footer')



