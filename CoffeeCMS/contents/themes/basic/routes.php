<?php

//// Routes::get('(:word)/(:word)','basic/$1@$2');

Routes::get('(:word)','basic/$1@index');

Routes::get('','basic/Home@index');