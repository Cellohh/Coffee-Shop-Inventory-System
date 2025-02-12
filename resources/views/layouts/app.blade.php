<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Coffee Shop Inventory</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Set the background image on the body */
        body {
    background: url("{{ asset('assets/img/attackCANCELlogoMODDEDshadow.png') }}") no-repeat center center fixed;
    background-size: contain;
}

    </style>
    
</head>
<body class="bg-[#2a1a1f] text-white relative">
    <!-- Background overlay with 50% opacity -->
    <div class="fixed inset-0 bg-black opacity-50 -z-10"></div>
    
    <!-- Top Navigation -->
    <nav class="bg-[#764134] py-4">
        <div class="container mx-auto flex justify-center space-x-4">
            <a href="{{ route('categories.index') }}" 
               class="bg-[#afa060] text-white px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                Categories
            </a>
            <a href="{{ route('suppliers.index') }}" 
               class="bg-[#afa060] text-white px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                Suppliers
            </a>
            <a href="{{ route('items.index') }}" 
               class="bg-[#afa060] text-white px-4 py-2 rounded-lg hover:bg-gray-300 transition">
                Items
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto mt-6">
        @yield('content')
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const timestampElements = document.querySelectorAll('[data-timestamp]');
            timestampElements.forEach(function(el) {
                const isoDate = el.getAttribute('data-timestamp');
                const date = new Date(isoDate);
                
                // Format date using toLocaleString; adjust options as needed.
                const options = {
                    year: 'numeric',
                    month: '2-digit',
                    day: '2-digit',
                    hour: 'numeric',
                    minute: 'numeric',
                    hour12: true
                };
                
                // This uses the user's local timezone
                const formattedDate = date.toLocaleString(undefined, options);
                el.textContent = 'Last updated: ' + formattedDate;
            });
        });
    </script>
</body>
</html>
