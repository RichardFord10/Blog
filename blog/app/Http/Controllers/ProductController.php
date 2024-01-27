<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;



class ProductController extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://fakestoreapi.com/products');
        $products = json_decode($response->getBody(), true);
        $categories = $this->getCategories();

        $ratings = array_column(array_column($products, 'rating'), 'rate');
        $max_rating = max($ratings);
        $min_rating = min($ratings);
        $rating_range = $this->get_rating_ranges();

        return view('products.index', compact('products', 'categories', 'max_rating', 'min_rating', 'rating_range'));
    }

    public function filter(Request $request)
    {
        \Log::info('Request data:', $request->all()); // Add this for debugging

        $client = new Client();
        $response = $client->request('GET', 'https://fakestoreapi.com/products');
        $products = json_decode($response->getBody(), true);
        $ratings = array_column(array_column($products, 'rating'), 'rate');
        $rating_range = $this->get_rating_ranges();
        $categories = $this->getCategories();
        $max_rating = max($ratings);
        $min_rating = min($ratings);

        if ($request->has('categories')) {
            $products = array_filter($products, function ($product) use ($request) {
                return in_array($product['category'], $request->categories);
            });
        }

        if ($request->has('ratings')) 
        {
            $products = array_filter($products, function ($product) use ($request) {
                foreach ($request->ratings as $range) {
                    list($min, $max) = explode('-', $range);
                    if ($product['rating']['rate'] >= $min && $product['rating']['rate'] <= $max) {
                        return true;
                    }
                }
                return false;
            });

            $categories = $this->getCategories();
        }
        return view('products.index', compact('products', 'categories', 'min_rating', 'max_rating', 'rating_range'));
    }

        public function getCategories()
        {
            $client = new Client();
            $response = $client->request('GET', 'https://fakestoreapi.com/products/categories');
            $categories = json_decode($response->getBody(), true);

            return $categories;
        }

        public function get_rating_ranges()
        {
            $rating_range = [
                '1-2' => '1-2',
                '2-3' => '2-3',
                '3-4' => '3-4',
                '4-5' => '4-5'
            ];

            return $rating_range;
        }

}