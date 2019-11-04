<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Service;
use Validator;

class ServiceAddController extends Controller
{
  public function execute(Request $request) {

    if ($request->isMethod('post')) {
        $input = $request->except('_token');

        $messages = [
          'required' => 'Поле :attribute обязательно к заполнению',
          'unique' => 'Поле :attribute должно быть уникальным'
        ];

        $validator = Validator::make($input, [
          'name' => 'required|max:255',
          'text' => 'required'
        ], $messages);

        if ($validator->fails()) {
          return redirect()->route('serviceAdd')->withErrors($validator)->withInput();
        }

        if ($request->hasFile('icon')) {
        $file = $request->file('icon');

        $input['icon'] = $file->getClientOriginalName();

        $file->move(public_path().'/assets/img', $input['icon']);
      }
      $service = new Service();
      $service->fill($input);

      if ($service->save()) {
        return redirect('admin')->with('status', 'Сервис добавлено успешно');
      }
    }

    if(view()->exists('admin.services.content_service_add')) {

      $data = [
                'title' => 'Новый сервис'
              ];
      return view('admin.services.services_add', $data);
    }
    abort(404);
  }
}
