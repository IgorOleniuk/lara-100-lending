<div class="wrapper content-fluid container">
  {!! Form::open(['url'=>route('portfolioAdd'), 'class'=>'form-horizontal', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}

      <div class="form-group">
       {!! Form::label('name', 'Названия', ['class'=>'col-xs-2 control-label']) !!}
          <div class="col-xs-8">
            {!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Введите название странице']) !!}
          </div>
     </div>

   
   <div class="form-group">
    {!! Form::label('images', 'Изображение', ['class'=>'col-xs-2 control-label']) !!}
       <div class="col-xs-8">
         {!! Form::file('images', old('images'), ['class'=>'filestyle', 'data-buttonText'=>'Выберете изображение', 'data-placeholder'=>'Файла нет']) !!}
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
