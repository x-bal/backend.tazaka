<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\{AboutResource, CategoryResource, ClientResource, ContactResource, CountResource, HomeResource, PortfolioResource, ProductResource, ServiceResource, TeamResource, TestimonialResource};
use App\Models\{About, Category, Client, Contact, Counts, Home, Portfolio, Product, Service, Team, Testimonial};
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function home()
    {
        $home = Home::find(1);

        return response()->json([
            'message' => 'This is home page',
            'home' => new HomeResource($home)
        ]);
    }

    public function about()
    {
        $about = About::find(1);

        return response()->json([
            'message' => 'This is about page',
            'about' => new AboutResource($about)
        ]);
    }

    public function service()
    {
        $service = Service::get();

        return response()->json([
            'message' => 'This is service list',
            'service' => ServiceResource::collection($service)
        ]);
    }

    public function category()
    {
        $categories = Category::get();

        return response()->json([
            'message' => 'This is category list',
            'categories' => CategoryResource::collection($categories)
        ]);
    }

    public function portfolio()
    {
        $portfolios = Portfolio::with('category')->get();

        return response()->json([
            'message' => 'This is portfolio list',
            'portfolios' => PortfolioResource::collection($portfolios)
        ]);
    }

    public function product()
    {
        $products = Product::get();

        return response()->json([
            'message' => 'This is product list',
            'products' => ProductResource::collection($products)
        ]);
    }

    public function client()
    {
        $client = Client::get();

        return response()->json([
            'message' => 'This is client list',
            'client' => ClientResource::collection($client)
        ]);
    }

    public function contact()
    {
        $contact = Contact::find(1);

        return response()->json([
            'message' => 'This is contact page',
            'contact' => new ContactResource($contact)
        ]);
    }

    public function testimonial()
    {
        $testimonial = Testimonial::get();

        return response()->json([
            'message' => 'This is testimonial list',
            'testimonial' => TestimonialResource::collection($testimonial)
        ]);
    }

    public function team()
    {
        $team = Team::get();

        return response()->json([
            'message' => 'This is team list',
            'team' => TeamResource::collection($team)
        ]);
    }

    public function count()
    {
        $count = Counts::get();

        return response()->json([
            'message' => 'This is count list',
            'count' => CountResource::collection($count)
        ]);
    }
}
