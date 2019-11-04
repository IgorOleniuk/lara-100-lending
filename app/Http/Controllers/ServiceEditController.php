<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Service;
use Validator;

class ServiceEditController extends Controller
{
  public function execute(Service $service, Request $request) {
   // $page = Page::find(id);

       if ($request->isMethod('delete')) {
         $service->delete();
         return redirect('admin')->with('status', 'Сервис удален');
       }


       if ($request->isMethod('post')) {
         $input = $request->except('_token');

         $validator = Validator::make($input, [
           'name'=> 'required|max:255',
           'text' => 'required'
         ]);

         if ($validator->fails()) {
           return redirect()
                            ->route('serviceEdit', ['service', $input['id']])
                            ->withErrors($validator);
         }

         if ($request->hasFile('icon')) {
           $file = $request->file('icon');
           $file->move(publick_path().'/assets/img', $file->getClientOriginalName());
           $input['icon'] = $file->getClientOriginalName();

         }

       unset($input['old_icon']);
       $service->fill($input);
       if ($service->update()) {
         return redirect('admin')->with('status', 'Сервис обновлен');
       }
     }

     $old = $service->toArray();
     if (view()->exists('admin.services.services_edit')) {
       $data = [
         'title' => 'Редактирования сервиса - '.$old['name'],
         'data' => $old
       ];
       return view('admin.services.services_edit', $data);
     }


  }
}
