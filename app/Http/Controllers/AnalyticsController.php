<?php

namespace App\Http\Controllers;

use App\User;
use App\Visit;
use Carbon\Carbon;


class AnalyticsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index($slug)
  {
    // Looking for the user with this slug
    $user = User::where('track_url', 'LIKE', $slug)->get()->first();

    //getting paginated visits
    $visits = Visit::where('user_id', $user->id)->paginate(5);

    // show the user infos
    return view("analytics")
      ->with('visits', $visits)
      ->with('user', $user);


  }



  public function dashboard()
  {
    //getting all visits grouped by day
    $visits = Visit::all();
    $visitsCount = $visits->count();
    $groupedVisits = $visits->groupBy(function ($item, $key) {
      return $item->created_at->format("d");
      //return $item->created_at->format("Y-m-d H:i:s");

    });

    //getting visits in last 7 days
    $visitsLastWeek = Visit::all()->groupBy(function ($item, $key) {
      return $item->created_at->format("d");
      //return $item->created_at->format("Y-m-d H:i:s");
    });

    // getting visits by navigator
    $groupedVisitsByBrowser = $visits->groupBy("browser");

    //getting visits by device
    $groupedVisitsByDevice = $visits->groupBy("device");

    return view("dashboard")
      ->with('groupedVisits', $groupedVisits)
      ->with("visitCount", $visitsCount)
      ->with("groupedVisitsByBrowser", $groupedVisitsByBrowser)
      ->with("groupedVisitsByDevice", $groupedVisitsByDevice)
      ->with("visitsLastWeek", $visitsLastWeek);
  }


}
