<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;

class HomeController extends Controller
{
  public function home()
  {
    return view('frontend.pages.home');
  }

  public function login()
  {
    return view('frontend.pages.login');
  }

  public function about()
  {
    return view('frontend.pages.about.about');
  }

  public function service()
  {
    $data['service'] = Service::orderBy('sort_order', 'asc')->get();

    return view('frontend.pages.service.service', $data);
  }

  public function memberShip()
  {
    return view('frontend.pages.mamber.memberShip');
  }


  public function contact()
  {
    return view('frontend.pages.contact.contact');
  }

  public function insight()
  {
    return view('frontend.pages.insights.insights');
  }

  public function privacyPolicy()
  {
    return view('frontend.pages.privacy.privacy');
  }
}
