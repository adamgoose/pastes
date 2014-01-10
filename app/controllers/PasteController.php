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
			return Redirect::route('create')
				->withErrors($validator);
		}

		try {
			$paste = Paste::create([
				'paste' => Input::get('paste'),
				'fork_of' => Input::get('fork', null)
			]);
		} catch (Exception $e) {
			return Redirect::route('create')
				->withErrors($e->getMessage());
		}

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

	public function diff($paste)
	{
		$dmp = new DiffMatchPatch\DiffMatchPatch();
		$diffs = $dmp->diff_main($paste->fork->paste, $paste->paste);
		$dmp->diff_cleanupSemantic($diffs);

		$diff = '';
		foreach($diffs as $d) {
			switch($d[0]) {
				case 1:
					$diff .= "<span class='nocode'><span class='marker ins pull-left'>+</span><ins>".e($d[1])."</ins></span>";
					break;
				case -1:
					$diff .= "<span class='nocode'><span class='marker del pull-left'>-</span><del>".e($d[1])."</del></span>";
					break;
				default:
					$diff .= e($d[1]);
			}
		}

		$this->layout->content = View::make('diff')
			->withPaste($paste)
			->withDiff($diff);
	}

}