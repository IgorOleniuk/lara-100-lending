<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Portfolio;
use Validator;

class PortfolioAddController extends Controller
{
  public function execute(Request $request) {

    if ($request->isMethod('post')) {
        $input = $request->except('_token');

        $messages = [
          'required' => 'Поле :attribute обязательно к заполнению',
          'unique' => 'Поле :attribute должно быть уникальным'
        ];

        $validator = Validator::make($input, [
          'name' => 'required|max:255'
        ], $messages);

        if ($validator->fails()) {
          return redirect()->route('portfolioAdd')->withErrors($validator)->withInput();
        }

        if ($request->hasFile('images')) {
        $file = $request->file('images');

        $input['images'] = $file->getClientOriginalName();

        $file->move(public_path().'/assets/img', $input['images']);
      }
      $portfolio = new Portfolio();
      $portfolio->fill($input);

      if ($portfolio->save()) {
        return redirect('admin')->with('status', 'Портфолио добавлено успешно');
      }
    }

    if(view()->exists('admin.portfolios.portfolios_add')) {

      $data = [
                'title' => 'Новое портфолио'
              ];
      return view('admin.portfolios.portfolios_add', $data);
    }
    abort(404);
  }

}
