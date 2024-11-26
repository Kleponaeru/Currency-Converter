<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    @include('layout.navbar')
    @include('background')

    <!-- Title Section -->
    <div class="flex items-center justify-between border-b border-gray-300 pb-6 pt-8 px-6 lg:px-8 mt-16">
        <h1 class="text-4xl font-extrabold tracking-tight text-gray-800">Currency Converter</h1>
    </div>

    <!-- Card Section -->
    <div class="mt-10 mx-auto max-w-2xl px-6 lg:px-8">
        <div class="rounded-lg bg-white shadow-md p-6 border border-gray-200 flex items-center justify-center"
            style="min-height: 400px;">
            <!-- Card Header -->
            <div class="w-full max-w-md">
                <h2 class="text-lg font-semibold text-gray-700 mb-4 text-center">Convert Your Currency</h2>

                <!-- Flex Container -->
                <form id="currency-converter-form" class="space-y-6">
                    @csrf
                    <!-- Convert Section -->
                    <div class="flex flex-col">
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Convert</label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500">$</span>
                            </div>
                            <input type="text" name="price" id="price"
                                class="block w-full rounded-lg border border-gray-300 py-2 pl-7 pr-20 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring focus:ring-indigo-200 sm:text-sm"
                                placeholder="0.00">
                            <div class="absolute inset-y-0 right-0 flex items-center">
                                <select id="from_currency" name="from_currency"
                                    class="h-full rounded-r-lg border-l bg-gray-50 py-0 pl-3 pr-7 text-gray-700 focus:border-indigo-500 focus:ring focus:ring-indigo-200 sm:text-sm">
                                    <option value="USD">USD</option>
                                    <option value="IDR">IDR</option>
                                    <option value="EUR">EUR</option>
                                    <option value="JPY">JPY</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- To Section -->
                    <div class="flex flex-col">
                        <label for="converted-price" class="block text-sm font-medium text-gray-700 mb-1">To</label>
                        <div class="relative">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500">$</span>
                            </div>
                            <input type="text" name="converted-price" id="converted-price"
                                class="block w-full rounded-lg border border-gray-300 py-2 pl-7 pr-20 text-gray-900 placeholder-gray-400 focus:border-indigo-500 focus:ring focus:ring-indigo-200 sm:text-sm"
                                placeholder="0.00" disabled>
                            <div class="absolute inset-y-0 right-0 flex items-center">
                                <select id="to_currency" name="to_currency"
                                    class="h-full rounded-r-lg border-l bg-gray-50 py-0 pl-3 pr-7 text-gray-700 focus:border-indigo-500 focus:ring focus:ring-indigo-200 sm:text-sm">
                                    <option value="USD">USD</option>
                                    <option value="IDR">IDR</option>
                                    <option value="EUR">EUR</option>
                                    <option value="JPY">JPY</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="text-center">
                        <button type="button" id="convert-btn"
                            class="inline-block rounded-lg bg-indigo-600 px-6 py-2 text-sm font-medium text-white shadow hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Convert
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<script src="{{ asset('/js/navbar.js') }}"></script>
<script>
    document.getElementById('convert-btn').addEventListener('click', async function() {
        const price = document.getElementById('price').value;
        const fromCurrency = document.getElementById('from_currency').value;
        const toCurrency = document.getElementById('to_currency').value;

        if (!price || isNaN(price)) {
            alert("Please enter a valid amount.");
            return;
        }

        // Send request to Laravel route
        try {
            const response = await fetch("{{ route('convert') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    price: price,
                    from_currency: fromCurrency,
                    to_currency: toCurrency
                })
            });

            if (!response.ok) {
                throw new Error("Failed to fetch conversion rate.");
            }

            const data = await response.json();

            // Update the converted price
            if (data.success) {
                document.getElementById('converted-price').value = data.converted_price.toFixed(2);
            } else {
                alert(data.message || "Conversion failed.");
            }
        } catch (error) {
            console.error(error);
            alert("An error occurred. Please try again.");
        }
    });
</script>

</html>
