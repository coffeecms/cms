<?php

class ErrorPage
{
	public static function index()
	{

		echo view('header');
		echo view('404page',$theData);
		echo view('footer');
	}	
}