<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Maxi Health Ads Gallery</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/normalize.min.css">
        <style>
            body, html {
                height:100%;
            }
            #sidebar {
                background: #e5e5e5;
                width: 15%;
                float:left;
                height:100%;
                border-right: solid 1px #b3b3b3;
                overflow:auto;
                padding-left:0.5%;
            }
            #sidebar ul {
                margin:10px 0 0 0;
                padding:0;
                width:158px;
            }
            #sidebar ul li {
                margin:0 0 10px 0;
                padding:4px 4px 4px 10px;
                list-style: none;
            }
            #sidebar ul .selected {
                -webkit-border-radius: 8px;
                -moz-border-radius: 8px;
                border-radius: 8px;
                background: #4e4e4e;
            }
            #sidebar ul li p {
                font-size: 13px;
                font-weight:bold;
                line-height: 18px;
                font-family: Arial, Verdana, sans-serif;
                color: #084827;
                margin:0 0 0.2em 0;
            }
            #sidebar ul .selected p {
                color:#fff;
            }
            #container {
                float:right;
                height:100%;
                width:70%;
                overflow:auto;
            }
            #container img {
                height:99.5%;
            }
            #closeGallery {
                background-image: url(img/gallery-close.png);
                background-position: 0 0;
                background-repeat: no-repeat;
                height: 38px;
                width:38px;
                position: absolute;
                color: #848484;
                text-indent: -9999px;
                top: 5px;
right: 11px;
            }
            #closeGallery:hover {
               background-position: 0 -38px;
            }
        </style>
    </head>
    
    <body>
        <div id="sidebar">
            <ul>
                <li>
                    <p>Stress Reducers</p>
                    <img src="http://www.maxihealth.com/images/ads/29_smallthumb.png">
                </li>
                <li class="selected">
                    <p>Natural Lifesaver</p>
                    <img src="http://www.maxihealth.com/images/ads/31_smallthumb.png">
                </li>
                <li>
                    <p>Chewable Vitamin D3</p>
                    <img src="http://www.maxihealth.com/images/ads/32_smallthumb.png">
                </li>
                <li>
                    <p>Glutamax</p>
                    <img src="http://www.maxihealth.com/images/ads/33_smallthumb.png">
                </li>
                <li>
                    <p>Sleep Aid</p>
                    <img src="http://www.maxihealth.com/images/ads/34_smallthumb.png">
                </li>
                <li>
                    <p>DMG</p>
                    <img src="http://www.maxihealth.com/images/ads/35_smallthumb.png">
                </li>
                <li>
                    <p>Relax To The Max</p>
                    <img src="http://www.maxihealth.com/images/ads/36_smallthumb.png">
                </li>
                <li>
                    <p>Co Q</p>
                    <img src="http://www.maxihealth.com/images/ads/37_smallthumb.png">
                </li>
                <li>
                    <p>Children Fish Oil</p>
                    <img src="http://www.maxihealth.com/images/ads/38_smallthumb.png">
                </li>
                <li>
                    <p>Calcium</p>
                    <img src="http://www.maxihealth.com/images/ads/39_smallthumb.png">
                </li>
                <li>
                    <p>MultiYums!</p>
                    <img src="http://www.maxihealth.com/images/ads/40_smallthumb.png">
                </li>
                <li>
                    <p>MultiYums!</p>
                    <img src="http://www.maxihealth.com/images/ads/41_smallthumb.png">
                </li>
            </ul>
        </div>
        <div id="container">
            <a href="" id="closeGallery">close</a>
            <img src="http://maxihealth.com/images/ads/40_large.png">
        </div>
    </body>

</html>