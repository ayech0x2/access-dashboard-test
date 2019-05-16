<?php

namespace App\Http\Controllers;

use App\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class VisitController extends Controller
{
  public function create(Request $request)
  {
    echo $request;
  }

  public function remove(Request $request)
  {
    $visit = Visit::find($request->id);
    $visit->delete();

    return Response::json(Visit::paginate(5));
  }

}
