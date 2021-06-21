<?php

// Routes::get('(:word)/(:word)','basic/$1@$2');

Routes::get('(:word)','cfnews/$1@index');

Routes::get('','cfnews/Home@index');
