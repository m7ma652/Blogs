<!DOCTYPE html>
<html lang="en">
@include('Theme.layouts.head')

<body>
    @include('Theme.layouts.header')
    @yield('content')
    @include('Theme.layouts.footer')
    @include('Theme.layouts.script')
</body>

</html>
