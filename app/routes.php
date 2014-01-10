<?php

Route::get('/', ['as' => 'create', 'uses' => 'PasteController@index']);

Route::post('/', ['as' => 'store', 'uses' => 'PasteController@store']);

Route::get('{paste}', ['as' => 'show', 'uses' => 'PasteController@show']);

Route::get('{paste}/fork', ['as' => 'fork', 'uses' => 'PasteController@fork']);

Route::get('{paste}/raw', ['as' => 'raw', 'uses' => 'PasteController@raw']);

Route::get('{paste}/diff', ['as' => 'diff', 'uses' => 'PasteController@diff']);

Route::bind('paste', function($value)
{
	try {
		$paste = Paste::findOrFail(Math::to_base_10($value));
	} catch(Exception $e) {
		App::abort(404);
	}

	return $paste;
});