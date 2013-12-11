@section('buttons')
  <li>{{ HTML::link('/', 'New') }}</li>
  <li>{{ HTML::link(Math::to_base($paste->id).'/raw', 'Raw') }}</li>
  <li>{{ HTML::link(Math::to_base($paste->id).'/fork', 'Fork') }}</li>
  @if($paste->fork_of)
    <li>{{ HTML::link(Math::to_base($paste->fork_of), 'Orig') }}</li>
    <li>{{ HTML::link(Math::to_base($paste->id).'/diff', 'Diff') }}</li>
  @endif
@stop


@section('content')
  <pre class="prettyprint linenums selectable"><code>{{{ $paste->paste }}}</code></pre>
@stop

@section('scripts')
  <script>
  $(function()
  {
    var line = new String(window.location.hash).slice(1) - 1;
    setTimeout(function() {
      $('.selectable ol li:eq('+line+')').addClass('selected');

      $('.selectable ol li').each(function(key, element)
      {
        $(this).click(function()
        {
          var line = key + 1;
          window.location.hash = '#'+ line;
        });
      });
    }, 1);

    $(window).bind('hashchange', function()
    {
      var line = new String(window.location.hash).slice(1) - 1;
      $('.selectable ol li').removeClass('selected');
      $('.selectable ol li:eq('+line+')').addClass('selected');
    });
  });
  </script>
@stop