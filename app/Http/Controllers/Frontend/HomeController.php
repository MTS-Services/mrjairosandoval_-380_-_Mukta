<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Articles;
use App\Models\Services;
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
        $data['services'] = Services::orderBy('sort_order', 'asc')->active()->latest()->get();

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
        $data['articles'] = Articles::orderBy('sort_order', 'asc')->with('articleCategory')->active()->latest()->get();
        return view('frontend.pages.insights.insights', $data);
    }

    public function privacyPolicy()
    {
        return view('frontend.pages.privacy.privacy');
    }
}
