<!DOCTYPE html>
<html lang="en">
	<x-layout.head title="IKB">
        <link rel="stylesheet" href="{{ asset('css/guest.css') }}">
    </x-layout.head>
	<body id="kt_body" class="bg-body relative">
		<div class="container mt-8 overflow-auto" style="max-height: 100vh; margin-bottom: 70px;">
            @yield('guest-content')
            @include('guest.menu')
        </div>

        <x-layout.script/>
        @include('guest.script')
        @yield('script')
	</body>
</html>


