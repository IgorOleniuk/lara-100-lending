<div class="wrapper content-fluid">
  {!! Form::open(['url'=>route('serviceAdd'), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}

      <div class="form-group">
       {!! Form::label('name', 'Названия', ['class'=>'col-xs-2 control-label']) !!}
          <div class="col-xs-8">
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Введите название сервиса']) !!}
          </div>
     </div>

    <div class="form-group">
     {!! Form::label('text', 'Текст', ['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
          {!! Form::textarea('text', old('text'), ['id'=>'editor', 'class'=>'form-control']) !!}
        </div>
   </div>

   <div class="form-group">
    {!! Form::label('icon', 'Иконка', ['class'=>'col-xs-2 control-label']) !!}
       <div class="col-xs-8">
         {!! Form::file('icon', old('icon'), ['class'=>'filestyle', 'data-buttonText'=>'Выберете иконку', 'data-placeholder'=>'Файла нет']) !!}
       </div>
  </div>

  <div class="form-group">

      <div class="col-xs-offset-2 col-xs-10">
        {!! Form::button('Сохранить', ['class' => 'btn btn-primary', 'type'=>'submit']) !!}
      </div>
 </div>


       {!! Form::close() !!}

       <script>
          CKEDITOR.replace('editor');
       </script>
</div>
