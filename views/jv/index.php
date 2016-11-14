<?php
use Mobile_Detect;

use yii\helpers\Url;
use yii\bootstrap\Modal;
use app\assets\JvAsset;

JvAsset::register($this);

/* @var $this yii\web\View */

$script_init = <<< JS
    // var exitsplashmessage = "***************************************\\n W A I T   B E F O R E   Y O U   G O !\\n\\n  CLICK *STAY ON THIS PAGE* BUTTON RIGHT NOW\\n     TO STAY GET THE EXACT METHOD THAT\\n  BANKED ME $35,827.29 IN JUST 24 HOURS!\\n\\n     >> STAY ON THIS PAGE <<\\n\\n***************************************";
    // var exitsplashpage = '/freereport';
    sessionStorage.setItem('show_exit_popup', 'true');
JS;
$this->registerJs($script_init, yii\web\View::POS_BEGIN);

$script = <<< JS
    var cust = document.querySelector('.js-customized');
    var initCust = new Powerange(cust, {disable: true, hideRange: true, klass: 'power-ranger', start: 98 });

    var cust = document.querySelector('.js-customized2');
    var initCust = new Powerange(cust, {disable: true, hideRange: true, klass: 'power-ranger', start: 90 });

    var cust = document.querySelector('.js-customized3');
    var initCust = new Powerange(cust, {disable: true, hideRange: true, klass: 'power-ranger', start: 75 });

    var cust = document.querySelector('.js-customized4');
    var initCust = new Powerange(cust, {disable: true, hideRange: true, klass: 'power-ranger', start: 65 });

    var cust = document.querySelector('.js-customized5');
    var initCust = new Powerange(cust, {disable: true, hideRange: true, klass: 'power-ranger', start: 60 });
    get_rank('weekend-click', 'weekend_click');
    function setOpacity() {
        document.querySelector('.js-change-opacity').style.opacity = opct.value;
    }
JS;
$this->registerJs($script, yii\web\View::POS_READY);

$css = <<< CSS
    .top_earners_img{
            margin: 0 0 50px;
        }
        .table-1-wrapper{
            margin-top: 80px !important;
        }
        td.tleft {text-align: left;padding-left: 25% !important;}
        .table-1-heading h2{color:#fff;}
        /***********************Amir 08-03-16*************************/
        .slider-wrapper {  margin: 30px 0 20px;}
        .top_earners_img {
            /*margin: 0 0 -147px;*/
            max-width: 755px;
            position: relative;
            z-index: 3;
            left:-31px;
        }

        .top_earners_img2 {
            left: -45px;
            margin: 0 0 -159px;
            max-width: 942px;
            position: relative;
            z-index: 3;
        }
        .prize_con { margin:-108px 0 40px 0}
        .outer_prize_wrap{ background:#FEA321; border:2px solid #e7e1c8; padding:15px 10px 15px; margin-bottom:20px;}
        .inner_prize_wrap{ background:#fff; border:3px solid #d6d3bd; padding:15px 0px 0}
        .total_cash_con {padding:0 5%;}
        .total_cash_con .total_cash { width:100%;}
        .total_cash_con p{/* background: url(assets/heading-bg2.jpg) repeat-x top center; */ text-align:center; margin:15px 0;}
        .total_cash_con p span { font-family: 'montserratlight'; text-transform: uppercase; display:inline-block; font-size:43px; color:#535048;/* background:#f0edd8;  */padding:0 20px;}

        .inner_prize_wrap .table { margin-bottom:0px;}
        .inner_prize_wrap .table tr{ background: rgba(0, 0, 0, 0) url("/contest/assets/duble_line.png") repeat-x scroll center bottom;}
        .inner_prize_wrap .table .red span{color:#7e0000; font-size:40px;font-family: 'Montserrat', sans-serif; font-weight:700;}
        .inner_prize_wrap .table .org span{color:#ff9c1d; font-size:35px;font-family: 'Montserrat', sans-serif; font-weight:700;}
        .inner_prize_wrap .table .ylw span{color:#fec20e; font-size:30px;font-family: 'Montserrat', sans-serif; font-weight:700;}
        .inner_prize_wrap .table tbody tr:nth-child(2n) {
            background-color: #fff !important;}
        .inner_prize_wrap .table tbody tr:nth-child(2n+1) {
            background-color: #fff !important;
        }
        .inner_prize_wrap .table tr td{ color:#535048; vertical-align:middle;}
        .inner_prize_wrap .table .gray span{color:#535048; font-size:25px;font-family: 'Montserrat', sans-serif; font-weight:700;}
        .inner_prize_wrap .table tr td span { vertical-align:middle;}
        .table-1-wrapper.nn { margin:0 0 40px 0;}
        .total_prize_wrap { background:#fff; padding:0px 0; position:relative;}
        .total_prize_con {/*  border:5px solid #c9c4b0;  */background:#fff; padding:10px;}
        .total_prize{padding:10px; background: url("/contest/assets/chance_header.jpg") repeat-x top center;
            background-size: cover; text-align:center;font-family: 'Montserrat', sans-serif; }
        .total_prize p{padding:0 0 0 0;color:#fff;margin:0px; line-height:32px; font-size:32px;font-weight:700;}
        .total_prize h2{padding:0 0 5px 0; text-shadow: 1px 1px 1px #999;color:#fff; margin:0px; font-size:88px;font-weight:700;}
        .inner_prize_wrap .table tr:last-child {background:none;}
        .grabinput {
            border-radius: 10px;
            height: 45px;
            padding: 10px 15px;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px 15px;
            height: 55px;
            width: 50%;
        }
        .afflink_tbl tbody tr:nth-child(2n+1){background-color:#fff !important;}
        .section-1 .afflink_tbl p{margin-top:10px;}
        .email_swip_wrap a, .email_swip_wrap button, .email_swip_wrap input[type="submit"] {
            background: rgba(0, 0, 0, 0) url("/contest/assets/images/login_bg.jpg") no-repeat scroll 0 0 / 100% auto;
            border: 0 none;
            border-radius: 5px;
            color: #fff;
            display: inline-block;
            font-family: "Montserrat",sans-serif;
            font-size: 20px;
            letter-spacing: 3px;
            margin: 30px 0 40px;
            padding: 24px 30px;
            text-align: center;
            text-transform: uppercase;
        }

        @media(max-width:600px){
            .slider-wrapper { margin:30px auto 20px;}
            .inner_prize_wrap .table tr td {display:block; text-align:center;}
            .total_cash_con p span { font-size:14px;}
            .inner_prize_wrap .table .red span {font-size:30px;}
            .inner_prize_wrap .table .org span {font-size:25px;}
            .inner_prize_wrap .table .ylw span {font-size:20px;}
            .inner_prize_wrap .table .gray span {font-size:15px;}
            .top_earners_img {
                bottom: -120px;
                left: -8px;
                margin: 0;
                max-width: 755px;
                position: relative;
                width: 100%;
                z-index: 3;
            }
            .total_prize p { font-size:14px;}
            .total_prize h2 { font-size:38px;}
            .prize_black_bodr {margin: 3% 2% 0;}
            .prize_logo img{width:100%;}
            .section-1{max-height: none;}
        }
        @media(max-width:479px){
            .section-1{ padding: 30px 0 50px;}
            .top_earners_img{bottom:30px;}
        }
        @media(max-width:600px){
            .table-1-heading h1 { font-size:26px !important;}
        }
CSS;

$this->registerCss($css);

$this->title = '#1 Click Money System';

$mob = new Mobile_Detect();
if ($mob->isTablet() || $mob->isMobile()) {
    $from_page = 'mobile';
    $is_mobile = true;
}
?>
    <style>

    </style>
<!-- /.top-logo -->
<div class="section-1">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar">
                    <div class="">
                        <div class=""><div class="prize_logo"><img src="/images/ClickMoneyLogo/Logo-white.svg" width="190" alt="Logo" class=""/></div></div>
                    </div><!--/.container-fluid -->
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1>CM LEADERBOARD STANDINGS</h1>
                <div class="col-md-8 col-md-offset-2">
                    <div class="table-1-wrapper nn">
                        <div class="table-1-heading">
                            <h1>CM Cash Contest’s</h1>
                        </div>
                        <div class="table-1-body afflink_tbl">
                            <table class="table table-striped">
                                <tbody>
                                <tr>
                                    <td colspan="3" class="text-center">
                                        <h3 style="margin-top: 0px;">Grab Your CM<span> CLICKSURE</span><br/> Affiliate Link Below</h3>
                                        <input type="text" class="grabinput" value="http://xxxx.clickmoney.cpa.clicksure.com" />
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-1-heading">
                            <h2>NEW 4th Week CF/PMA MAIN Contest Winners</h2>
                            <h4>MONDAY, Nov 14th at 3am EST - Monday, Nov 21st at 3am EST</h4>
                        </div>
                        <div class="table-1-body">
                            <table id="4th_weekly" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>RANK</th>
                                    <th>NAME</th>
                                    <th>PRIZES</th>
                                </tr>
                                </thead>
                                <tbody><tr><td class="text-center">1</td><td class="text-center">Kevin R</td><td class="text-center">$5,000</td></tr><tr><td class="text-center">2</td><td class="text-center">g****n</td><td class="text-center">$2,000</td></tr><tr><td class="text-center">3</td><td class="text-center">Dave R</td><td class="text-center">$1,000</td></tr><tr><td class="text-center">4</td><td class="text-center">Jordan B</td><td class="text-center">$750</td></tr><tr><td class="text-center">5</td><td class="text-center">Lion</td><td class="text-center">$500</td></tr><tr><td class="text-center">6</td><td class="text-center">k****8</td><td class="text-center">$250</td></tr><tr><td class="text-center">7</td><td class="text-center">s****k</td><td class="text-center">$100</td></tr><tr><td class="text-center">8</td><td class="text-center">s****3</td><td class="text-center">$100</td></tr><tr><td class="text-center">9</td><td class="text-center">Mo Mulla</td><td class="text-center">$100</td></tr><tr><td class="text-center">10</td><td class="text-center">1****o</td><td class="text-center">$100</td></tr><tr><td class="text-center">11</td><td class="text-center">David Blaze</td><td class="text-center"></td></tr><tr><td class="text-center">12</td><td class="text-center">Tal &amp; Itay</td><td class="text-center"></td></tr><tr><td class="text-center">13</td><td class="text-center">Martin S</td><td class="text-center"></td></tr><tr><td class="text-center">14</td><td class="text-center">z****n</td><td class="text-center"></td></tr><tr><td class="text-center">15</td><td class="text-center">f****c</td><td class="text-center"></td></tr><tr><td class="text-center">16</td><td class="text-center">G****r</td><td class="text-center"></td></tr><tr><td class="text-center">17</td><td class="text-center">j****e</td><td class="text-center"></td></tr><tr><td class="text-center">18</td><td class="text-center">c****e</td><td class="text-center"></td></tr><tr><td class="text-center">19</td><td class="text-center">x****e</td><td class="text-center"></td></tr><tr><td class="text-center">20</td><td class="text-center">b****1</td><td class="text-center"></td></tr><tr><td class="text-center">21</td><td class="text-center">v****c</td><td class="text-center"></td></tr><tr><td class="text-center">22</td><td class="text-center">Rich Williams</td><td class="text-center"></td></tr><tr><td class="text-center">23</td><td class="text-center">9****3</td><td class="text-center"></td></tr><tr><td class="text-center">24</td><td class="text-center">Michael D</td><td class="text-center"></td></tr><tr><td class="text-center">25</td><td class="text-center">hmullah</td><td class="text-center"></td></tr><tr><td class="text-center">26</td><td class="text-center">d****s</td><td class="text-center"></td></tr><tr><td class="text-center">27</td><td class="text-center">n****1</td><td class="text-center"></td></tr><tr><td class="text-center">28</td><td class="text-center">t****e</td><td class="text-center"></td></tr><tr><td class="text-center">29</td><td class="text-center">a****5</td><td class="text-center"></td></tr><tr><td class="text-center">30</td><td class="text-center">1****5</td><td class="text-center"></td></tr><tr><td class="text-center">31</td><td class="text-center">o****7</td><td class="text-center"></td></tr><tr><td class="text-center">32</td><td class="text-center">b****e</td><td class="text-center"></td></tr><tr><td class="text-center">33</td><td class="text-center">Glynn &amp; Fred</td><td class="text-center"></td></tr><tr><td class="text-center">34</td><td class="text-center">c****l</td><td class="text-center"></td></tr><tr><td class="text-center">35</td><td class="text-center">b****e</td><td class="text-center"></td></tr><tr><td class="text-center">36</td><td class="text-center">z****a</td><td class="text-center"></td></tr><tr><td class="text-center">37</td><td class="text-center">b****1</td><td class="text-center"></td></tr><tr><td class="text-center">38</td><td class="text-center">Warren Brown</td><td class="text-center"></td></tr><tr><td class="text-center">39</td><td class="text-center">j****e</td><td class="text-center"></td></tr><tr><td class="text-center">40</td><td class="text-center">b****x</td><td class="text-center"></td></tr><tr><td class="text-center">41</td><td class="text-center">Lee Ford</td><td class="text-center"></td></tr><tr><td class="text-center">42</td><td class="text-center">P****q</td><td class="text-center"></td></tr><tr><td class="text-center">43</td><td class="text-center">h****t</td><td class="text-center"></td></tr><tr><td class="text-center">44</td><td class="text-center">JP</td><td class="text-center"></td></tr><tr><td class="text-center">45</td><td class="text-center">c****0</td><td class="text-center"></td></tr><tr><td class="text-center">46</td><td class="text-center">a****x</td><td class="text-center"></td></tr><tr><td class="text-center">47</td><td class="text-center">M****g</td><td class="text-center"></td></tr><tr><td class="text-center">48</td><td class="text-center">Imran</td><td class="text-center"></td></tr><tr><td class="text-center">49</td><td class="text-center">k****e</td><td class="text-center"></td></tr><tr><td class="text-center">50</td><td class="text-center">r****o</td><td class="text-center"></td></tr><tr><td class="text-center">51</td><td class="text-center">c****g</td><td class="text-center"></td></tr><tr><td class="text-center">52</td><td class="text-center">w****J</td><td class="text-center"></td></tr><tr><td class="text-center">53</td><td class="text-center">h****o</td><td class="text-center"></td></tr><tr><td class="text-center">54</td><td class="text-center">b****n</td><td class="text-center"></td></tr><tr><td class="text-center">55</td><td class="text-center">0****8</td><td class="text-center"></td></tr><tr><td class="text-center">56</td><td class="text-center">1****1</td><td class="text-center"></td></tr><tr><td class="text-center">57</td><td class="text-center">c****2</td><td class="text-center"></td></tr><tr><td class="text-center">58</td><td class="text-center">t****y</td><td class="text-center"></td></tr><tr><td class="text-center">59</td><td class="text-center">c****0</td><td class="text-center"></td></tr><tr><td class="text-center">60</td><td class="text-center">m****0</td><td class="text-center"></td></tr><tr><td class="text-center">61</td><td class="text-center">z****l</td><td class="text-center"></td></tr><tr><td class="text-center">62</td><td class="text-center">l****o</td><td class="text-center"></td></tr><tr><td class="text-center">63</td><td class="text-center">p****1</td><td class="text-center"></td></tr><tr><td class="text-center">64</td><td class="text-center">y****w</td><td class="text-center"></td></tr><tr><td class="text-center">65</td><td class="text-center">b****7</td><td class="text-center"></td></tr><tr><td colspan="3" class="text-center">&nbsp;</td></tr></tbody>
                            </table>
                        </div>
                </div>

                <p><img src="<?= Yii::$app->homeUrl?>contest/assets/top_earners_img3.png" alt="" class="top_earners_img"/></p>
            </div>
        </div>
    </div>
</div>
<div class="section-2">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="prize_con">
                    <div class="outer_prize_wrap">
                        <div class="inner_prize_wrap" style="padding-bottom: 30px;">
                            <div class="total_cash_con">
                                <img src="<?= Yii::$app->homeUrl; ?>contest/assets/total_cash.png" alt="" class="total_cash"/>
                                <p><span>won by the affiliates</span></p>
                            </div>
                            <table class="table">
                                <tr class="red">
                                    <td class="text-left">#1 <span>----</span></td>
                                    <td class="text-center">
                                        <div class="slider-wrapper"><input type="text" class="js-customized" /></div>
                                    </td>
                                    <td class="text-left"><span>$----</span></td>
                                </tr>
                                <tr class="org">
                                    <td class="text-left">#2 <span>----</span></td>
                                    <td class="text-center">
                                        <div class="slider-wrapper"><input type="text" class="js-customized2" /></div>
                                    </td>
                                    <td class="text-left"><span>$----</span></td>
                                </tr>
                                <tr class="ylw">
                                    <td class="text-left">#3 <span>----</span></td>
                                    <td class="text-center">
                                        <div class="slider-wrapper"><input type="text" class="js-customized3" /></div>
                                    </td>
                                    <td class="text-left"><span>$----</span></td>
                                </tr>
                                <tr class="gray">
                                    <td class="text-left">#4 <span>----</span></td>
                                    <td class="text-center">
                                        <div class="slider-wrapper"><input type="text" class="js-customized4" /></div>
                                    </td>
                                    <td class="text-left"><span>$----</span></td>
                                </tr>
                                <tr class="gray">
                                    <td class="text-left">#5 <span>----</span></td>
                                    <td class="text-center">
                                        <div class="slider-wrapper"><input type="text" class="js-customized5" /></div>
                                    </td>
                                    <td class="text-left"><span>$----</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="total_prize_wrap">
                        <div class="prize_black_bodr"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

