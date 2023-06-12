<!DOCTYPE html>
<html lang="en">
	<x-layout.head title="IKB"/>
	<body id="kt_body" class="bg-body relative">
		<div class="container mt-8 overflow-auto" style="max-height: 100vh; margin-bottom: 70px;">
            @yield('guest-content')
            @include('guest.menu')
            @yield('script')
        </div>
        <x-layout.script/>
	</body>
</html>


