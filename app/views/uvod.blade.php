<!DOCTYPE HTML>
<head>
    <!-- ========= 
    Title and Metas 
    ========= -->
    <meta charset="utf-8">
    <title>Mini Digi SNG</title>
    <meta name="keywords" content="sng, digitalizácia">
    <meta name="author" content="Slovenská národná galéria">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- ========= 
    Favicons 
    ========= -->
    <link rel="shortcut icon" href="/favicon.png">
    
    <!-- ========= 
    Fonts 
    ========= -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/fonts.css">
    
    <!-- ========= 
    CSS
    ========= -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- Media Queries -->  
    <link rel="stylesheet" href="css/media.css">
    
    <!-- ========= 
    JS
    ========= -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>  
    <script type="text/javascript" src="http://code.jquery.com/ui/jquery-ui-git.js"></script>

    <!-- custom jquery -->
    <script src="js/modernizr.custom.js"></script>
    <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-19030232-3', 'igo.sk');
      ga('send', 'pageview');

    </script>
    
</head>

<body>
    
    <!-- START OF DIV -->  
    <div class="page" >
            
            
    @if(Session::has('message'))
        <p class="center error"><span class="label">{{{ Session::get('message') }}}</span></p>
    @endif

            <!-- MODULE : ABOUT -->
            <section id="about" class="section-container">
                <div class="container">
                    <div class="sixteen columns heading-text">
                        <div class="separator separator-title">
                            <h2 class="separator-mainheader color">Mini Digi SNG</h2>
                            <span class="separator-subheader"></span>
                        </div>
                    </div>
                   
                    <div class="eight columns">
                        <h5>Digitálna galéria / <a href="http://www.digitalnagaleria.sk" target="_blank">www.digitalnagaleria.sk</a></h5>
                        <p>je jedným z národných projektov Operačného programu Informatizácia spoločnosti – Prioritná os 2 (Rozvoj pamäťových a fondových inštitúcií a obnova ich národnej infraštruktúry). Pod vedením <a href="http://www.sng.sk" target="_blank">Slovenskej národnej galérie</a> na projekte spolupracuje ďalších 17 galérií z celého Slovenska; z ich zbierok ako aj zo zbierok SNG by malo byť do júna 2015 zdigitalizovaných 100 100 diel výtvarného umenia. Samotná digitalizácia aktuálne prebieha v Bratislave (v Slovenskej národnej galérii a Galérii mesta Bratislavy), na Zvolenskom zámku v špecializovanom digitalizačnom pracovisku a v ďalších galériách.</p>
                    </div>
                    <div class="eight columns">
                        <h5>Sprístupňovanie digitálnych diel</h5>
                        <p>Okrem digitalizácie výtvarných diel veľkoplošnými horizontálnymi skenermi (2D diela ako maľba, kresba, grafika a fotografia) a digitálnou stredoformátovou zrkadlovkou (3D diela ako sochárstvo a úžitkové umenie) v rámci projektu prebieha napríklad ošetrenie výtvarných diel pred samotnou digitalizáciou alebo vylepšenie informačného systému pre správu zbierok <a href="http://www.sng.sk/sk/uvod/o-sng/useky-a-oddelenia/usek-vyskumu-a-rozvoja/cedvu-a-digitalne-zbierky" target="_blank">CEDVU (Centrálna Evidencia Diel Výtvarného Umenia)</a>. Výsledky digitalizácie v podobe snímok vo vysokom rozlíšení a mierke 1:1 budú verejnosti postupne sprístupňované na webstránke <a href="http://www.webumenia.sk" target="_blank">www.webumenia.sk</a>, na ktorej už teraz môžete nájsť náhľady viac ako <strong>18.500 diel</strong> zo slovenských galérií.</p>
                    </div>

                    <div class="clear"></div>

                    <hr class="dividerline"/>
                    
                    <!-- ABOUT - example -->
                    <div class="sixteen columns ">
                    <h5>Ukážky zdigitalizovaných diel</h5>
                        <p>S možnosťou Deep Zoom.</p>
                    </div>

                    @foreach ($examples as $example)
                    <div class="eight columns example-container">
                        <div class="example-icon">
                            <a href="/{{{ $example['img'] }}}">
                                <span class="zoom"></span>
                                <img src="/img/thumbs/{{{ $example['img'] }}}.jpg" alt="example"/>
                            </a>
                        </div>
                        <span class="example-title">{{{ $example['name'] }}}</span>
                        <p ><a href="/{{{ $example['img'] }}}">zobraziť dielo</a> | <a href="{{{ $example['url'] }}}" target="_blank">viac info na webumenia</a></p>
                    </div>
                    @endforeach

                </div>
            </section>
            <!-- MODULE : ABOUT --> 
                    
                

           
            <!-- MODULE : FOOTER -->
            <footer id="download">
                <div class="footer-arrow"></div>
                <div class="container">
                    <div class="sixteen columns footer-inside">
                        <img src="/img/loga_ts.jpg" alt="loga">
                    </div>
                 </div>
                 <div class="container">   
                    <div class="sixteen columns copyright center">
                        <p class=""> 
                            © 2014 <a href="http://www.sng.sk" target="_blank" class="external">Slovenská národná galéria</a> |
                            tento web je <a href="https://github.com/SlovakNationalGallery/minidigi.sng.sk" target="_blank" class="external">open source</a>
                        </p>
                    </div>
                </div>
            </footer>
            <!-- MODULE : FOOTER -->      
        <!-- </div> -->
    </div>    
    <!-- END OF DIV -->    

    <!-- ========= 
    JS
    ========= -->

    <!-- Retina Display -->
    <script src="js/retina.js"></script>        


</body>
</html>