<?php

namespace App\Http\Controllers;

use Http;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class ConverterController extends Controller
{
    public function convert(Request $request)
    {
        $request->validate([
            'price' => 'required|numeric',
            'from_currency' => 'required|string',
            'to_currency' => 'required|string',
        ]);

        $price = $request->input('price');
        $fromCurrency = $request->input('from_currency');
        $toCurrency = $request->input('to_currency');

        $apiUrl = "https://api.freecurrencyapi.com/v1/latest";
        $apiKey = "fca_live_YcGfRIL33FYL8lggAiTePhLJpI1x7lXvO6FxoUCq";

        $queryParams = http_build_query([
            'apikey' => $apiKey,
            'currencies' => $toCurrency,
            'base_currency' => $fromCurrency,
        ]);

        $response = Http::get("$apiUrl?$queryParams");

        if ($response->successful()) {
            $data = $response->json();
            $conversionRate = $data['data'][$toCurrency] ?? null;

            if ($conversionRate) {
                $convertedPrice = $price * $conversionRate;

                return response()->json([
                    'success' => true,
                    'converted_price' => $convertedPrice,
                    'rate' => $conversionRate,
                ]);
            }
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to fetch conversion rates. Try again later.',
        ]);
    }

}
