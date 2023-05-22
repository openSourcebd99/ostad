<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class DemoController extends Controller
{
  public function demoAction(Request $request, $name, $age): string
  {
    // var_dump($request);
    Log::info('Serving page');
    return "Hello from $name with age $age";
  }

  public function demoJsonAction(Request $request): string
  {
    // $request->input();
    $name = $request->input('name');
    $age = $request->input('age');

    return "Hello from $name with age $age";
  }

  public function headersAction(Request $request): string
  {
    // $headers = $request->header();
    $headers = $request->headers->all();
    // $headers = $request->header('user-agent');
    return json_encode($headers);
  }

  public function fileDetails(Request $request): array
  {
    $file = $request->file('file');
    $getClientOriginalName = $file->getClientOriginalName();
    $getName = $file->getFileName();
    $extension = $file->extension();
    $size = $file->getSize();
    $mimeType = $file->getMimeType();
    $fileType = $file->getType();

    $file->storeAs('uploads', $getClientOriginalName);
    $file->move(public_path('uploads'), $getClientOriginalName);

    return array(
      'getClientOriginalName' => $getClientOriginalName,
      'getName' => $getName,
      'extension' => $extension,
      'size' => $size,
      'mimeType' => $mimeType,
      'fileType' => $fileType,
    );
  }

  public function showFileBinary(Request $request)
  {
    return response()->file(public_path('uploads/one.jpeg'));
  }

  public function downloadFile(Request $request)
  {
    return response()->download(public_path('uploads/one.jpeg'));
  }

  public function acceptTypeJSON(Request $request): string
  {
    // $acceptType = $request->getAcceptableContentTypes();

    if ($request->accepts(['application/json'])) {
      return json_encode([
        'message' => "The request accepts JSON {$request->ip()}",
      ]);
    } else {
      return json_encode([
        'message' => "Only JSON is accepted {$request->ip()}",
      ]);
    }
  }

  public function getCookies(Request $request): array | string | null
  {
    $cookies = $request->cookie();
    return json_encode($cookies);
  }

  public function setCookie(Request $request)
  {
    $minutes = 60;
    $path = '/';
    $domain = $request->getHost();
    $secure = true;
    $httpOnly = true;

    $response = new Response('Hello World');
    $response->withCookie('name', 'value', $minutes, $path, $domain, $secure, $httpOnly);

    return $response;
  }

  public function getJsonResponse(Request $request): JsonResponse
  {
    $code = '201';
    $message = 'Created';
    $data = [
      'name' => 'John Doe',
      'email' => 'johnDoe@gmail.com'
    ];
    return response()->json([
      'code' => $code,
      'message' => $message,
      'data' => $data
    ], $code);
  }

  public function redirectInitiateAction(Request $request): string
  {
    return redirect('/go-to-google');
  }

  public function goToGoogle(Request $request): string
  {
    return redirect()->away('https://www.google.com');
  }


  public function setResponseHeader()
  {
    $response = new Response('Hello World');
    $response->header('Content-Type', 'application/json');
    $response->header('X-Header-One', 'Header Value');
    $response->header('X-Header-Two', 'Header Value');
    return $response;
  }

  public function getSamplePage()
  {
    return view('pages.hello');
  }

  public function createSession(Request $request): bool
  {
    $request->session()->put('name', 'John Doe');
    return true;
  }
  public function pullSession(Request $request): string
  {
    $name = $request->session()->pull('name', 'default');
    return $name;
  }

  public function getSession(Request $request): string
  {
    $name = $request->session()->get('name', 'default');
    return $name;
  }

  public function forgetSession(Request $request): bool
  {
    $request->session()->forget('name');
    return true;
  }
  public function flushSession(Request $request): bool
  {
    $request->session()->flush();
    return true;
  }
}
