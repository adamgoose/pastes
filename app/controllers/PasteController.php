<?php

class PasteController extends \BaseController {

	public $layout = 'layout';

	public function index()
	{
		return $this->create();
	}

	public function create()
	{
		$fork = '';	
		$this->layout->content = View::make('create');
	}

	public function store()
	{
		$validator = Validator::make(Input::all(), [
			'paste' => 'required'
		]);

	  if ($validator->fails())
	  {
	    return Redirect::route('create')->withErrors($validator);
	  }

	  $paste = Paste::create([
	  	'paste' => Input::get('paste'),
	  	'fork_of' => Input::get('fork', null)
	  ]);

	  return Redirect::route('show', Math::to_base($paste->id));
	}

	public function show($paste)
	{
		$this->layout->content = View::make('show')
			->withPaste($paste);
	}

	public function fork($paste)
	{
	  $this->layout->content = View::make('create')
	  	->withFork($paste);
	}

	public function raw($paste)
	{
	  return Response::make($paste->paste)->header('Content-Type', 'text/plain');
	}

}