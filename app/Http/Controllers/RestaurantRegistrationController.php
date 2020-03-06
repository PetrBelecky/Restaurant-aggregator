<?php

namespace App\Http\Controllers;

use App\User;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantRegistrationController extends Controller
{
  public function create()
  {
    return view('auth/restaurant-register');
  }

  public function store(Request $request)
  {
    //validate

    //crate user
    $user = User::create([
      'name' => $request->input('name'),
      'email' => $request->input('email'),
      'password' => bcrypt($request->input('password'))
    ]);

    $restaurant = Restaurant::create([
      'user_id' => $user->id,
      'name' => $request->input('restaurant-name'),
      'city' => $request->input('restaurant-city'),
      'description' => $request->input('restaurant-description'),
    ]);

    return $restaurant;

    //return view('auth/restaurant-register');
  }
}
