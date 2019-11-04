<div style="margin: 0 50px;">

  @if($portfolios)
  <table class="table table-hover table-striped">
      <thead>
        <tr>
          <td>№</td>
          <td>Имя</td>
          <td>Дата создания</td>
          <td>Удалить</td>
        </tr>
      </thead>

      <tbody>
        @foreach($portfolios as $k=>$portfolio)
          <tr>
             <td>{{ $portfolio->id }}</td>
             <td>{!! Html::link(route('portfolioEdit', ['portfolio' =>$portfolio->id]), $portfolio->name, ['alt'=>$portfolio->name]) !!}</td>
             <td>{{ $portfolio->created_at }}</td>
             <td>{!! Form::open(['url'=>route('portfolioEdit', ['portfolio'=>$portfolio->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}

                 {{method_field('DELETE')}}
                  {!! Form::button('Удалить', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}

                  {!! Form::close() !!}
             </td>
          </tr>
        @endforeach
      </tbody>
  </table>
  @endif

  {!! Html::link(route('portfolioAdd'), 'Новое портфолио') !!}
</div>
