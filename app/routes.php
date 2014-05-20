<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	$examples = [
		[
			'name'=>'Vojtech Angyal - Krajina s pastierkou husí (1890-1900)',
			'img'=>'SVK.SNG.O_612',
			'url'=>'http://www.webumenia.sk/web/guest/detail/-/detail/id/SVK:SNG.O_612/Vojtech%20Angyal',
		],
		[
			'name'=>'Gustáv Mallý - Park v Petržalke (1901-1921)',
			'img'=>'SVK.SNG.O_388',
			'url'=>'http://www.webumenia.sk/web/guest/detail/-/detail/id/SVK:SNG.O_388/Gust%C3%A1v%20Mall%C3%BD',
		],
		[
			'name'=>'Ján Cifra - 1. máj v Petržalke (1957)',
			'img'=>'SVK.SNG.UP',
			'url'=>'http://www.webumenia.sk/web/guest/detail/-/detail/id/SVK:SNG.UP-DK_1427-1/J%C3%A1n%20Cifra',
		],
		[
			'name'=>'Albrecht Dürer - Chválospev vyvolených na nebesiach (1497-1498) ',
			'img'=>'SVK.SNG.G_1345',
			'url'=>'http://www.webumenia.sk/web/guest/detail/-/detail/id/SVK:SNG.G_1345/Albrecht%20D%C3%BCrer',
		],
		[
			'name'=>'Rudolf Hornák - Karikatúra profesora zo Spišskej Novej Vsi (1939-1940)',
			'img'=>'SVK.SNG.P_1281',
			'url'=>'http://www.webumenia.sk/web/guest/detail/-/detail/id/SVK:SNG.P_1281/Rudolf%20Horn%C3%A1k',
		],
		[
			'name'=>'Rudolf Hornák - Karikatúra profesora zo Spišskej Novej Vsi (1939-1940) ',
			'img'=>'SVK.SNG.P_1284',
			'url'=>'http://www.webumenia.sk/web/guest/detail/-/detail/id/SVK:SNG.P_1284/Rudolf%20Horn%C3%A1k',
		],
	];

	return View::make('uvod', array('examples'=> $examples));
});

Route::get('/kabinet', function()
{
	$image = 'kabinet';

	$artworks = [
		[
			'img'=>'',
			'author'=>'Július Koller',
			'name'=>'Svet socializmu (1979) ',
			'url'=>'http://www.webumenia.sk/web/guest/detail/-/detail/id/SVK:SNG.IM_138/',
			'position_bottom'=>'84.4',
			'position_right'=>'-74.0',
		],
		[
			'img'=>'',
			'author'=>'Ján Cifra',
			'name'=>'1. máj v Petržalke (1957)',
			'url'=>'http://www.webumenia.sk/web/guest/detail/-/detail/id/SVK:SNG.UP-DK_1427-6/',
			'position_bottom'=>'',
			'position_right'=>'',
		],
		[
			'img'=>'',
			'author'=>'Stredoeurópsky maliar z 19. storočia',
			'name'=>'Býk (1875-1900)',
			'url'=>'http://www.webumenia.sk/web/guest/detail/-/detail/id/SVK:SNG.O_4040/',
			'position_bottom'=>'80',
			'position_right'=>'-70.7',
		],
		[
			'img'=>'',
			'author'=>'Neznámy maliar',
			'name'=>'Žabí súd (1730-1750)',
			'url'=>'http://www.webumenia.sk/web/guest/detail/-/detail/id/SVK:SNG.O_292/',
			'position_bottom'=>'84.6',
			'position_right'=>'-115',
		],
		[
			'img'=>'',
			'author'=>'Stredoeurópsky miniaturista z 1. štvrtiny 19. storočia',
			'name'=>'Hlava mačky (1800-1825)',
			'url'=>'http://www.webumenia.sk/web/guest/detail/-/detail/id/SVK:SNG.O_4917/',
			'position_bottom'=>'75.8',
			'position_right'=>'-79',
		],
		[
			'img'=>'',
			'author'=>'Český autor z 19. storočia',
			'name'=>'Kávová súprava (1880-1890)',
			'url'=>'http://www.webumenia.sk/web/guest/detail/-/detail/id/SVK:SNG.UP-F_840/',
			'position_bottom'=>'71',
			'position_right'=>'-92',
		],
		[
			'img'=>'',
			'author'=>'Stredoeurópsky hodinár z 2. polovice 19. storočia',
			'name'=>'Stolné hodiny figurálne (1850-1900)',
			'url'=>'http://www.webumenia.sk/web/guest/detail/-/detail/id/SVK:SNG.UP-DK_521/',
			'position_bottom'=>'74',
			'position_right'=>'-71',
		],
		[
			'img'=>'',
			'author'=>'Orientálny remeselník Blízkeho Východu z 19. storočia',
			'name'=>'Perzský koberec (1880-1890)',
			'url'=>'http://www.webumenia.sk/web/guest/detail/-/detail/id/SVK:SNG.UP-I_70/',
			'position_bottom'=>'40',
			'position_right'=>'-43',
		],
		[
			'img'=>'',
			'author'=>'Marek Kvetán',
			'name'=>'Trophy (2009)',
			'url'=>'http://www.webumenia.sk/web/guest/detail/-/detail/id/SVK:SNG.P_2712/',
			'position_bottom'=>'84',
			'position_right'=>'-36',
		],
	];


	$path = public_path() . '/img/'.$image.'/ImageProperties.xml';
	// dd($path);
	if (!file_exists($path)) {
		return Redirect::to('/')->with('message', 'zadaná cesta bola nesprávna');
    }   

    $properties = simplexml_load_file($path)->attributes();
    $width = $properties->{'WIDTH'};
 
	return View::make('image', array(
		'image'=>$image, 
		'width'=>(int)$properties->{'WIDTH'}, 
		'height'=>(int)$properties->{'HEIGHT'},
		'artworks'=>$artworks
	));
});


Route::get('/{image}', function($image)
{
	$path = public_path() . '/img/'.$image.'/ImageProperties.xml';
	// dd($path);
	if (!file_exists($path)) {
		return Redirect::to('/')->with('message', 'zadaná cesta bola nesprávna');
    }   

    $properties = simplexml_load_file($path)->attributes();
    $width = $properties->{'WIDTH'};
 
	return View::make('image', array(
		'image'=>$image, 
		'width'=>(int)$properties->{'WIDTH'}, 
		'height'=>(int)$properties->{'HEIGHT'}
	));
});
