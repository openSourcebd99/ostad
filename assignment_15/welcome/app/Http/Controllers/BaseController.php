<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
  public function dashboard()
  {
    return response()->json([
      'message' => 'Dashboard',
    ]);
  }

  public function home()
  {
    return response()->json([
      'message' => 'Home',
    ]);
  }

  public function profile()
  {
    return response()->json([
      'message' => 'Profile',
    ]);
  }

  public function settings()
  {
    return response()->json([
      'message' => 'Settings',
    ]);
  }
}
