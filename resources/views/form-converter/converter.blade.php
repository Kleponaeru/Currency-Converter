<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
    @include('navigation.navbar')
    {{-- @include('navigation.hero-screen') --}}
    {{-- @include('form-converter.converter') --}}

    <script src="{{ asset('/js/navbar.js') }}"></script>
    <div class="flex items-baseline justify-between border-b border-gray-200 pb-6 pt-8 pl-8">
        <h1 class="text-4xl font-bold tracking-tight text-gray-900">Currency Converter</h1>
    </div>

    <div class="mt-2 ml-2 mr-2 pl-8 w-100">
        <!-- Row for Convert and To -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Convert Section -->
            <div class="flex items-center space-x-2">
                <label for="price" class="block text-sm font-medium text-gray-900">Convert</label>
                <div class="relative flex-1">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <span class="text-gray-500 sm:text-sm">$</span>
                    </div>
                    <input type="text" name="price" id="price"
                        class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"
                        placeholder="0.00">
                    <div class="absolute inset-y-0 right-0 flex items-center">
                        <label for="currency" class="sr-only">Currency</label>
                        <select id="currency" name="currency"
                            class="h-full rounded-md border-0 bg-transparent py-0 pl-2 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                            <option>USD</option>
                            <option>IDR</option>
                            <option>EUR</option>
                            <option>JPY</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- To Section -->
            <div class="flex items-center space-x-2">
                <label for="converted-price" class="block text-sm font-medium text-gray-900">To</label>
                <div class="relative flex-1">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <span class="text-gray-500 sm:text-sm">$</span>
                    </div>
                    <input type="text" name="converted-price" id="converted-price"
                        class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm"
                        placeholder="0.00" disabled>
                    <div class="absolute inset-y-0 right-0 flex items-center">
                        <label for="currency" class="sr-only">Currency</label>
                        <select id="currency" name="currency"
                            class="h-full rounded-md border-0 bg-transparent py-0 pl-2 pr-7 text-gray-500 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm">
                            <option>USD</option>
                            <option>IDR</option>
                            <option>EUR</option>
                            <option>JPY</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
