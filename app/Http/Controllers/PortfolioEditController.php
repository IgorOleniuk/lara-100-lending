<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Portfolio;
use Validator;

class PortfolioEditController extends Controller
{
      public function execute(Portfolio $portfolio, Request $request) {
       // $page = Page::find(id);

       if ($request->isMethod('delete')) {
         $portfolio->delete();
         return redirect('admin')->with('status', 'Портфолио удалено');
       }


       if ($request->isMethod('post')) {
         $input = $request->except('_token');

         $validator = Validator::make($input, [
           'name'=> 'required|max:255'

         ]);

         if ($validator->fails()) {
           return redirect()
                            ->route('portfolioEdit', ['portfolio', $input['id']])
                            ->withErrors($validator);
         }

         if ($request->hasFile('images')) {
           $file = $request->file('images');
           $file->move(publick_path().'/assets/img', $file->getClientOriginalName());
           $input['images'] = $file->getClientOriginalName();

         }

       unset($input['old_images']);
       $portfolio->fill($input);
       if ($portfolio->update()) {
         return redirect('admin')->with('status', 'Портфолио обновлено');
       }
     }

     $old = $portfolio->toArray();
     if (view()->exists('admin.portfolios.portfolios_edit')) {
       $data = [
         'title' => 'Редактирования портфолио - '.$old['name'],
         'data' => $old
       ];
       return view('admin.portfolios.portfolios_edit', $data);
     }


    }
}
