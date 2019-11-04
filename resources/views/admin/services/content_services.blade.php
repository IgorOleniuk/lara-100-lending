<div style="margin: 0 50px;">

  @if($services)
  <table class="table table-hover table-striped">
      <thead>
        <tr>
          <td>№</td>
          <td>Имя</td>
          <td>Текст</td>
          <td>Дата создания</td>
          <td>Удалить</td>
        </tr>
      </thead>

      <tbody>
        @foreach($services as $k=>$service)
          <tr>
             <td>{{ $service->id }}</td>
             <td>{!! Html::link(route('serviceEdit', ['service' =>$service->id]), $service->name, ['alt'=>$service->name]) !!}</td>
             <td>{{ $service->text }}</td>
             <td>{{ $service->created_at }}</td>
             <td>{!! Form::open(['url'=>route('serviceEdit', ['service'=>$service->id]), 'class'=>'form-horizontal', 'method'=>'POST']) !!}

                 {{method_field('DELETE')}}
                  {!! Form::button('Удалить', ['class'=>'btn btn-danger', 'type'=>'submit']) !!}

                  {!! Form::close() !!}
             </td>
          </tr>
        @endforeach
      </tbody>
  </table>
  @endif

  {!! Html::link(route('serviceAdd'), 'Новый сервис') !!}
</div>
