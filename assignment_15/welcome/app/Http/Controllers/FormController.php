<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

class FormController extends Controller
{
  public function register(RegisterRequest $request)
  {
    $validatedData = $request->validated();

    return response()->json([
      'data' => $validatedData,
      'message' => 'Validation successful',
    ]);
  }
}
