<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProfileController extends Controller
{
  function createProfile(Request $request): JsonResponse
  {
    $name = $request->input('name');
    $profile = [
      'name' => $name,
    ];
    return response()->json($profile);
  }

  function getUserAgent(Request $request): string
  {
    $userAgent = $request->header('user-agent');
    return $userAgent;
  }

  function getPageInfo(Request $request): string
  {
    $page = $request->query('page') ?? null;
    return "Page: " . ($page ?? 'No page');
  }

  function getSampleJson(Request $request): JsonResponse
  {
    $json = [
      'message' => 'Success',
      'data' => [
        'name' => 'John Doe',
        'age' => '25',
      ],
    ];
    return response()->json($json);
  }

  function uploadFile(Request $request): JsonResponse
  {
    $file = $request->file('avatar');
    $file->move(public_path('uploads'), $file->getClientOriginalName());
    return response()->json([
      'message' => 'Success',
    ]);
  }

  function getCookie(Request $request): JsonResponse
  {
    $rememberToken = $request->cookie('remember_token', null);
    return response()->json([
      'message' => 'Success',
      'cookie' => $rememberToken,
    ]);
  }

  function submit(Request $request): JsonResponse
  {
    $email = $request->input('email');

    if (!$email) {
      return response()->json([
        'success' => false,
        'message' => 'Email is required.',
      ]);
    }

    return response()->json([
      'success' => true,
      'message' => 'Form submitted successfully.'
    ]);
  }
}
