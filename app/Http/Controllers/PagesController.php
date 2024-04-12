<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\PopUp;
use App\Models\Gallery;
use App\Models\CompanyInfo;
use Illuminate\Http\Request;
use App\Models\SocialNetwork;

class PagesController extends Controller
{
    function service()
    {
        $data['popups'] = PopUp::all();
        $data['abouts'] = About::all();
        $data['socialnetwork'] = SocialNetwork::all();
        $data['infos'] = CompanyInfo::all();
        return view('/site/service', $data);
    }
    function categories()
    {
        $data['abouts'] = About::all();
        $data['socialnetwork'] = SocialNetwork::all();
        $data['infos'] = CompanyInfo::all();
        return view('/site/servicecategories', $data);
    }
    function about()
    {
        $data['abouts'] = About::all();
        $data['socialnetwork'] = SocialNetwork::all();
        $data['infos'] = CompanyInfo::all();
        return view('/site/about', $data);
    }
    function contact()
    {
        $data['abouts'] = About::all();
        $data['socialnetwork'] = SocialNetwork::all();
        $data['infos'] = CompanyInfo::all();
        return view('/site/contact', $data);
    }
    function gallery()
    {
        $data['abouts'] = About::all();
        $data['socialnetwork'] = SocialNetwork::all();
        $data['infos'] = CompanyInfo::all();
        $galleries = Gallery::all();
        return view('/site/gallery', compact('galleries'), $data);
    }
    function apply()
    {
        $data['abouts'] = About::all();
        $data['socialnetwork'] = SocialNetwork::all();
        $data['infos'] = CompanyInfo::all();
        return view('/site/applicationform', $data);
    }
    function askservice()
    {
        return view('/site/serviceform');
    }
}
