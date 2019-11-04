<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Service;

class ServiceController extends Controller
{
  public function execute() {
    if(view()->exists('admin.services.servises')) {

      $services = Service::all();

      $data = [
                'title' => 'Сервисы',
                'services' => $services
              ];
     return view('admin.services.servises', $data);
    }
    abort(404);
  }
}
