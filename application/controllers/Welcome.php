<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

	function __construct()
	{
		parent::__construct();
	}

	/**
	 * Homepage for our app
	 */
	public function index()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'homepage';

		// build the list of authors, to pass on to our view
		$source = $this->quotes->all();
		$authors = array ();
		foreach ($source as $record)
		{
			$authors[] = array ('who' => $record['who'], 'mug' => $record['mug'], 'href' => $record['where']);
		}
		$this->data['authors'] = $authors;

		$this->render();
	}

	/**
	 * Elaine Boosler's quote
	*/
	public function shucks()
	{
		// this is the view we want shown
		$this->data['pagebody'] = 'justone';

		//retrieve Bob Monkhouse's record
		$record = $this->quotes->get(2);
		
		//create model for our view by merging the record found into the data model
		$this->data = array_merge($this->data, $record);

		$this->render();
	}
}
