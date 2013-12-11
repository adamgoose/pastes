@section('buttons')
  <li>{{ HTML::link('/', 'New') }}</li>
  <li>{{ HTML::link(Math::to_base($paste->id).'/raw', 'Raw') }}</li>
  <li>{{ HTML::link(Math::to_base($paste->id).'/fork', 'Fork') }}</li>
  @if($paste->fork_of)
    <li>{{ HTML::link(Math::to_base($paste->fork_of), 'Orig') }}</li>
    <li>{{ HTML::link(Math::to_base($paste->id), 'Full') }}</li>
  @endif
@stop


@section('content')
  <pre class="prettyprint linenums selectable"><code>{{ $diff }}</code></pre>
@stop