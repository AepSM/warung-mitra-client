<?php

namespace App\Http\Controllers;

use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index()
    {
        $agent = new Agent();

        if ($agent->isMobile()) {
            return redirect('https://m.warungmitra.com');
        } else {
            return redirect('https://warungmitra.com');
        }
    }
}
