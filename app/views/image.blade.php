<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Mini Digi SNG</title>
    <link rel="shortcut icon" href="/favicon.png">
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.css" />
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.ie.css" />
    <![endif]-->
    {{ HTML::style('css/fonts.css') }}
    {{ HTML::style('css/main.css') }}

</head>
<body>

    <div id="photo">
    @if(Session::has('message'))
        <p class="text-center"><span class="label label-danger">{{{ Session::get('message') }}}</span></p>
    @endif

    
    @if(empty($image))
        <h1>mini digi SNG</h1>
    @endif


    	
    </div>
    <script src="http://cdn.leafletjs.com/leaflet-0.5.1/leaflet.js"></script>
    <script type="text/javascript" src="/js/L.TileLayer.Zoomify.js"></script>  
    <script type="text/javascript">

    @if(!empty($image))
        var map = L.map('photo').setView(new L.LatLng(0,0), 0);

        L.tileLayer.zoomify('/img/{{{$image}}}/', { 
            width: {{{ $width }}}, 
            height: {{{ $height }}}, 
            tolerance: 0.8,
            attribution: 'majetok SNG'
        }).addTo(map);

        @foreach ($artworks as $artwork)
        	@if (!empty($artwork['position_bottom']) && !empty($artwork['position_right']))
	        	L.marker([{{$artwork['position_bottom']}}, {{$artwork['position_right']}}]).bindPopup('<b>{{$artwork['author']}}</b><br>{{$artwork['name']}}<br><a href="{{$artwork['url']}}">webumenia</a>').addTo(map);
        	@endif
        @endforeach


    @endif

    </script>
</body>
</html>