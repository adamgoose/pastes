@section('buttons')
  <li><a href="javascript: createPaste()" class="save">Save</a></li>
@stop

@section('content')
  {{ Form::open(['route' => 'store', 'id' => 'paster']) }}
    {{ Form::textarea('paste', isset($fork) ? $fork->paste : null) }}
  @if(isset($fork))
    {{ Form::hidden('fork', $fork->id)}}
  @endif
  {{ Form::close() }}
@stop