<html>
<body>
{{ Form::open(['method' => 'get', 'route' => 'search']) }}

  {{ Form::input('search', 'query', Input::get('query', ''))}}
  {{ Form::submit('Filter results') }}

{{ Form:: close() }}

@foreach($products as $product)
 <div>
  <h2>{{{ $product->name }}}</h2>
  <div>{{{ $product->short_description }}}</div>
  <div><small>{{{ $product->long_description }}}</small></div>
 </div>
@endforeach
</body>
</html>