// /*random people filling*/
// function changeFSize() {
//     var fsize = (parseInt($("#people_filling").css('font-size')) - 2);
//     $("#people_filling").css('font-size', fsize + 'px');
// }
// function randomIntFromInterval(min, max) {
//     return Math.floor(Math.random() * (max - min + 1) + min);
//     //return rndsc = (Math.random()*(max-min+1)+min);
//     //return rndsc.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
// }
//
// var prev_val = randomIntFromInterval(570, 650);
// $(".people_filling").html(prev_val);
// var changefs = 0;
// var how_many_times_increase = 0;
// function doSomething() {
//     var z = randomIntFromInterval(20, 40);
//     var z_dec = randomIntFromInterval(10, 30);
//
//     var incre_decre = randomIntFromInterval(0, 1);
//     if (how_many_times_increase < 3 && incre_decre == 0)
//         incre_decre = 1;
//
//     if (incre_decre == 0 && (prev_val - z) < 10) //to control negative values
//         incre_decre = 1;
//
//     if (incre_decre > 0) //increase the value
//     {
//         $('.people_filling')
//             .prop('number', prev_val)
//             .animateNumber(
//                 {
//                     number: (prev_val + z)
//                 },
//                 1000
//             );
//         prev_val = prev_val + z;
//         how_many_times_increase++;
//     }
//     else {
//         //decrease the value
//         $('.people_filling')
//             .prop('number', prev_val)
//             .animateNumber(
//                 {
//                     number: (prev_val - z_dec)
//                 },
//                 1000
//             );
//         prev_val = prev_val - z_dec;
//
//         if (how_many_times_increase > 3)
//             how_many_times_increase = 0;
//     }
//
//     // $("#people_filling").html(prev_val);
//
//     if (prev_val > 9999 && changefs == 1) {
//         changeFSize();
//         changefs = 2;
//     }
//     else if (prev_val > 999 && changefs == 0) {
//         changeFSize();
//         changefs = 1;
//     }
//
//     if (prev_val > 9999 && changefs == 0)
//         changefs = 1;
// }
//
// function getRandomArbitrary(min, max) {
//     return Math.random() * (max - min) + min;
// }
//
// function peopleFilling() {
//     //doSomething();
//     (function loop() {
//         var rand = getRandomArbitrary(4000, 9000);
//         setTimeout(function () {
//             doSomething();
//             loop();
//         }, rand);
//     }());
// }
// peopleFilling();

function countDown(total_mints)
{
    var minutes = total_mints;
    var seconds = 0;
    var centiseconds = 0;

    var timer = setInterval(function() {
        centiseconds -= 9;

        if (centiseconds < 0) {
            centiseconds = 99;
            seconds--;
        }

        if (seconds < 0) {
            seconds = 59;
            minutes--;
        }

        if (minutes < 0) {
            minutes = 0;
            seconds = 0;
            centiseconds = 0;
            clearInterval(timer);
        }

        if ((minutes + "").length < 2)
            minutes = "0" + minutes;
        if ((seconds + "").length < 2)
            seconds = "0" + seconds;
        if ((centiseconds + "").length < 2)
            centiseconds = "0" + centiseconds;

        $("#minutes").html(minutes);
        $("#seconds").html(seconds);
        $("#centiseconds").html(centiseconds);
    }, 90);
}

function randomIntFromInterval(min,max)
{
    var rndsc = (Math.random()*(max-min+1)+min);
    return rndsc.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
}

function doSomething()
{
    // Amount made in format (max - min + 1)) + min; //
    var z = randomIntFromInterval(775550,1300000);

    var myArray = ['Julia Richardson','Samuel Locke','Naomi Walker','Tyler Marshall','John Tredwell','Alex Belina','Lindsey Steblen','Dakota Summers','Elijah Cooper','Abram Sterling','Mark Johnson','Celia Everett','Lydia Ross','Anisa McGuire','Sara Burns','Emmett Wilcott','Isaac Bell',
        'Julian Sinclair','Adrian West','Rosalia Chapman','Shailene Davis','Gabby Mendoza','Jason Brown','Brooke Connelly','Avery Ellison','Fiona Stratford','Melanie Klarke','Aidan Foster','Oliver Wood','Byron Reed','Bianca Whitman','Nick Glass','Holly Wright','Estella Collins','Rachel Nicolli','Angelica Whitmore',
        'Sophie Greene','Kendall Dixon','Nathaniel King','Peter Haynes','Gregory Klaus','Brian Davidson','Ryan Thompson','Emily Smith','Scott Shuman','Michelle O\'Brien','Albert Price','Nancy Graham','David Ferringo','Rebecca Trainham','Josiah Lee','Jonah Elliot','Titus Alexander','Ryan Cade','Benjamin Jacob','Noah Robert','Cooper Eric','Paul Warren',
        'Greyson Reed','Jeremiah Sage','Ivy Christine','Arianna Elizabeth','Julia Nicole','Molly Catherine','Nora Elise','Zoe Claire','Sophia Brielle','Hayden Marie','Lydia Jane','Scarlett Anne','Jacob Charles','Austin Michael','Bryson Scott',' Gavin Jared','Spencer Brett','Brett Spencer','Makenzie Lynn','Breanna Lynn','Amy Lynn','Knox Everett',
        'Knox Owen','Knox Liam','Kyle','Austin','Bradley','Jordan Marcelle','Marcelle Jordan','Julian Marcelle','William Joseph','William Jack','Lennon James','Avia Rose','Diego Kruz','Diego King','Philippa Dove','Philippa Mauve','Philippa Wren','Shailey Catherine','Guinevere Niamh','Austin Isaiah','Grace Olivia','Vincent Robert','Lennox needs','Chloe','Cynthia Lauren',
        'Bellatrix','Mae Tabitha','Phoebe Katherine','Jess Rose','Molly Grace','Kelsie May','Lucy Jane','Athene Elizabeth','Mae Tabitha','Cassidy','Addison','Harper','Holt Kiernan','Holden Keir','Paxton Tate','Sebastian','Simon','Zacchaeus','Carla Pearson','Peter Colby','Zu Pender','Drew Ortege','Carl Browning','Camille Orso','Dick Weaver','Maria Spitz','Anna Flick',
        'Nancy Aida','Susan Meesa','Nicholas Han','Grace Tuck','Bill Garner','Fred Warner','Patton Ford','Roger Perry','Lucy Parson','Sue Palmer','Josh Peck','Palm Steele','Alan Reynolds','Brenda Ash','Tom Zeigler','Noriko Lee','Derek rand','Nick Freeman','Hank Asulu','Trisha knox','Bo Simpson','Anya Chown','Lee Tanaka','Hal Simhashi','Jeb Duncan'
    ];
    var rand1 = myArray[Math.floor(Math.random() * myArray.length)];

    $("#member_name").html(rand1);
    $("#member_earning").html('$'+z);
}

function getRandomArbitrary(min, max)
{
    return Math.random() * (max - min) + min;
}

function membersEarnings()
{
    doSomething();
    (function loop() {
        var rand =  getRandomArbitrary(4000,7000);
        setTimeout(function() {doSomething(); loop();}, rand);
    })();
}

var widget_close_decision = 0 ;
function widgetEarnings()
{
    widget_earning_html();
    var showed_times = 0;
    (function loop() {
        var rand = getRandomArbitrary(4*60*1000, 6*60*1000);
        setTimeout(function () {
            if (sessionStorage.getItem('show_joined_popup') == 'true' && showed_times < 4) {
                widget_earning_html();
                showed_times++;
            }
            loop();
        }, rand);
    })();
}
function makeEmail() {
    var strValues="abcdefg12345";
    var strEmail = "";
    var strTmp;
    for (var i=0;i<10;i++) {
        strTmp = strValues.charAt(Math.round(strValues.length*Math.random()));
        strEmail = strEmail + strTmp;
    }
    strTmp = "";
    strEmail = strEmail + "@";
    for (var j=0;j<8;j++) {
        strTmp = strValues.charAt(Math.round(strValues.length*Math.random()));
        strEmail = strEmail + strTmp;
    }
    strEmail = strEmail + ".com"
    return strEmail;
}

var myArrayemail = ['joet***@yahoo.co.uk', 'mama***@gmail.com', 'cobr***@msn.com', 'delf***@aol.com', 'olso***@gmail.com', 'd.br***@bigpond.com', 'dwyn***@kctcs.edu', 'tuck***@yahoo.ca', 'rong***@gmail.com', 'cyos***@hotmail.com', 'asma***@gmail.com', 'okee***@outlook.com', 'schm***@hotmail.com', 'hill***@gmail.com', 'hajn***@gmail.com', 'cadr***@gmail.com', 'mbla***@cabq.gov', 'may0***@outlook.com', 'eddi***@aol.com', 'joey***@jeffreymichaels.com', 'dlug***@yahoo.ca', 'chri***@gmail.com', 'kimo***@icloud.com', 'mjst***@gmail.com', 'rudy***@gmail.com', 'lash***@gmail.com', 'sewi***@yahoo.co.uk', 'leon***@hotmail.com', 'vale***@cox.net', 'tade***@tlen.pl', 'tony***@gmail.com', 'ruby***@yahoo.com.au', 'gayl***@gmail.com', 'slhi***@hotmail.com', 'perr***@gmail.com', 'nw.d***@gmail.com', 'orla***@hotmail.com', 'hadf***@xtra.co.nz', 'vega***@gmail.com', 'annb***@gmail.com', 'sana***@gmail.com', 'wayn***@icloud.com', 'smit***@icloud.com', 'vian***@outlook.com', 'emk***@xnet.is', 'tapi***@gmail.com', 'vdmn***@gmail.com', 'barb***@gmail.com', 'onit***@gmail.com', 'dhut***@hotmail.com', 'adok***@aol.com', 'troy***@gmail.com', 'rick***@yahoo.co.uk', 'bend***@gmail.com', 'joan***@bigpond.com', 'jay.***@gmail.com', 'jay.***@gmail.com', 'bogu***@gmail.com', 'soph***@yahoo.com', 'ldus***@msn.com', 'shar***@hotmail.com', 'vonl***@gmail.com', 'bios***@yahoo.com', 'vze3***@comcast.net', 'earl***@yahoo.com', 'flo_***@yahoo.co.uk', 'zkis***@gmail.com', 'norm***@me.com', 'mich***@me.com', 'tany***@outlook.com', 'azam***@yahoo.com', 'gail***@gmail.com', 'guba***@gmail.com', 'heid***@gmail.com', 'poll***@icloud.com', 'debs***@gmail.com', 'vonh***@yahoo.co.uk', 'econ***@gmail.com', 'pank***@gmail.com', 'gord***@gmail.com', 'tine***@comcast.net', 'wend***@yahoo.com', 'pers***@gmail.com', 'psal***@gmail.com', 'gisl***@gmail.com', 'nssh***@hotmail.com', 'silv***@hotmail.com', 'nina***@ukr.net', 'sbow***@icloud.com', 'room***@gmail.com', 'shep***@gmail.com', 'boss***@outlook.com', 'wing***@gmail.com', 'shel***@gmail.com', 'jenn***@gmail.com', 'yeda***@globo.com', 'moor***@yahoo.com', 'troy***@verizon.net', 'heri***@hotmail.com', 'tbro***@tampabay.rr.com', 'mick***@yahoo.co.uk', 'fgog***@gmail.com', 'mike***@yahoo.ca', 'kyin***@yahoo.com', 'amyk***@hotmail.com.au', 'nell***@comcast.net', 'terr***@gmail.com', 'albe***@gmail.com', 'dulr***@cgocable.ca', 'athn***@gmail.com', 'pris***@yahoo.ca', 'flet***@yahoo.com', 'juli***@hotmail.com', 'theo***@gmail.com', 'love***@hotmail.com', 'oomp***@icloud.com', 'lime***@yahoo.ca', 'lorr***@hotmail.com', 'n.ze***@gmail.com', 'rood***@gmail.com', 'malv***@yahoo.com.au', 'marj***@bigpond.com', 'theg***@gmail.com', 'evit***@gmail.com', 'fres***@outlook.com', 'darr***@outlook.com', 'stac***@hotmail.com', 'gpm1***@yahoo.com', 'zaid***@gmail.com', 'tony***@gmail.com', 'brya***@yahoo.ca', 'kelc***@gmail.com', 'mn_c***@hotmail.com', 'mohi***@gmail.com', 'whit***@gmail.com', 'ant7***@gmail.com', 'jami***@gmail.com', 'jesq***@yahoo.com', 'allb***@outlook.com', 'jwip***@gmail.com', 'larr***@rogers.com', 'mash***@gmail.com', 'carl***@gmail.com', 'hild***@gmail.com', 'rplo***@gmail.com', 'anne***@gmail.com', 'grel***@hotmail.com', 'alan***@gmail.com', 'hend***@gmail.com', 'eliz***@hotmail.co.nz', 'myra***@hotmail.com', 'gust***@gmail.com', 'shan***@gmail.com', 'sigr***@yahoo.ca', 'patb***@comcast.net', 'mysc***@yahoo.ca', 'hear***@yahoo.com', 'djwa***@yahoo.ca', 'pass***@gmail.com', '1vil***@gmail.com', 'jbou***@videotron.ca', 'impr***@gmail.com', 'scal***@hotmail.com.ar', 'b_pe***@hotmail.com', 'carr***@gmail.com', 'just***@gmail.com', 'pchr***@gmail.com', 'andr***@gmail.com', 'rich***@gmail.com', 'ferr***@gmail.com', 'work***@gmail.com', 'tera***@gmail.com', 'mark***@gmail.com', 'dami***@gmail.com', 'mybl***@icloud.com', 'cutt***@yahoo.com', 'arro***@gmail.com', 'jose***@gmail.com', 'jane***@yahoo.ca', 'andr***@live.com', 'faha***@hotmail.com', 'nell***@hotmail.com', 'joce***@yahoo.ca', 'jeff***@outlook.com', 'loui***@gmail.com', 'less***@yahoo.com', 'guil***@hotmail.com', 'dott***@dottysdecorating.com', 'ian.***@bigpond.com', 'bank***@gmail.com', 'teet***@gmail.com', 'inth***@gmail.com', 'tukp***@gmail.com', 'loui***@gmail.com', 'paul***@yahoo.ca', 'jd05***@msn.com', 'pand***@gmail.com', 'shah***@gmail.com', '2jay***@gmail.com', 'a.we***@gmail.com', 'wesh***@outlook.com', 'debb***@gmail.com', 'qban***@gmail.com', 'shak***@hotmail.com', 'jame***@gmail.com', 'a1di***@icloud.com', 'news***@yahoo.com', 'ange***@gmail.com', 'marr***@bigpond.com', '300b***@cox.net', 'garc***@gmail.com', 'babe***@bigpond.com', 'sims***@yahoo.ca', 'mcro***@yahoo.ca', 'dona***@jvanvliet.net', 'dvsa***@hotmail.com', 'danu***@yht.net', 'moll***@gmail.com', 'marn***@gmail.com', 'nmbr***@gmail.com', 'jjam***@frontier.com', 'jame***@gmail.com', 'cipr***@hotmail.com', 'dwke***@infionline.net', 'jack***@comcast.net', 'jabs***@gmail.com', 'supe***@yandex.ru', 'rbhe***@yahoo.com', 'simo***@gmail.com', 'jaym***@gmail.com', 'mudl***@aol.com', 'honz***@gmail.com', 'edms***@gmail.com', 'eldu***@hotmail.com', 'gils***@outlook.com', 'lite***@hotmail.com', 'gera***@hotmail.com', 'kula***@icloud.com', 'mary***@gmail.com', 'lash***@gmail.com', 'vivi***@yahoo.ca', 'katr***@gmail.com', 'laru***@gmail.com', 'doro***@gmail.com', 'cami***@gmail.com', 'love***@gmail.com', 'thac***@gmail.com', 'barr***@gmail.com', 'past***@msn.com', 'rena***@mail.com', 'poll***@gmail.com', 'sier***@gmail.com', 'moos***@hotmail.co.uk', 'sand***@gmail.com', 'joan***@gmail.com', 'taxi***@gmail.com', 'band***@gmail.com', '1114***@gmail.com', 'nant***@gmail.com', 'biba***@hotmail.fr', 'lezt***@gmail.com', 'half***@gmail.com', 'sher***@gmail.com', 'thou***@gmail.com', 'plan***@4cdpi.org', 'fiel***@icloud.com', 'perc***@yahoo.co.in', 'hori***@gmail.com', 'jess***@gmail.com', 'aekk***@bigpond.com', 'reub***@gmail.com', 'libb***@gmail.com', 'tenn***@charter.net', 'fitr***@gmail.com', 'succ***@gmail.com', 'lspi***@icloud.com', '29cr***@gmail.com', 'mary***@outlook.com', 'wood***@roadrunner.com', 'ange***@aol.com', 'nfly***@aol.com', 'just***@gmail.com', 'rwil***@aol.com', 'mahr***@gmail.com', 'shad***@gmail.com', 'jami***@gmail.com', 'jbor***@aol.com', 'arif***@gmail.com', 'soar***@icloud.com', 'joue***@yahoo.com', 'tvau***@gmail.com', 'paul***@yahoo.co.nz', 'simo***@hotmail.com', 'stan***@yahoo.com', 'lcgr***@bellsouth.net', 'toms***@orcon.net.nz', 'lisa***@yahoo.com', 'gpas***@hotmail.com', 'md_c***@hotmail.com', 'rot7***@yahoo.com', 'jand***@dodo.com.au', 'jimm***@gmail.com', 'moaz***@yahoo.com', 'jasm***@gmail.com', 'jani***@verizon.net', 'autu***@gmail.com', 'jrbo***@aol.com', 'sara***@gmail.com', 'will***@aol.com', 'dpne***@gmail.com', 'terr***@hughes.net', 'syaf***@gmail.com', 'carr***@ymail.com', 'rpki***@planters.net', 'audr***@gmail.com', 'asil***@gmail.com', 'mari***@hotmail.com', 'jack***@gmail.com', 'dbro***@gmail.com', 'keng***@rocketmail.com', 'jimm***@gmail.com', 'nhat***@gmail.com', 'tom***@ftisd.com', 'vale***@gmail.com', 'char***@gmail.com', 'chap***@gmail.com', 'jere***@gmail.com', 'jayh***@gmail.com', 'oren***@rambler.ru', 'deni***@gmail.com', 'rach***@gmail.com', 'will***@gmail.com', 'vunk***@gmail.com', 'tama***@yahoo.com', 'lagm***@gmail.com', 'pete***@gmail.com', 'mari***@yahoo.ca', 'cian***@yahoo.com', 'marj***@gmail.com', 'game***@gmail.com', 'guyo***@gmail.com', '1coo***@gmail.com', 'rick***@gmail.com', 'alaf***@hotmail.com', 'wals***@icloud.com', 'shai***@yahoo.com', 'para***@aol.com', 'demi***@gmail.com', 'isle***@gmail.com', 'chet***@rediffmail.com', 'fied***@gmail.com', 'trin***@hotmail.com', 'sher***@tiscali.co.za', 'brit***@outlook.com', 'offi***@gmail.com', 'hccc***@gmail.com', 'aish***@gmail.com', 'wand***@gmail.com', 'dave***@gmail.com', 'kjb2***@gmail.com', 'cesa***@gmail.com', 'fern***@gmail.com', 'jand***@dodo.com.au', 'lala***@gmail.com', 'roge***@gmail.com', 'kper***@hotmail.com', 'ynke***@aol.com', 'hope***@gmail.com', 'setl***@gmail.com', 'ogre***@gmail.com', 'alev***@gmail.com', 'vict***@hotmail.com', 'oppe***@gmail.com', 'khes***@gmail.com', 'kald***@gmail.com', 'bess***@gmail.com', 'jame***@yahoo.com', 'larr***@hotmail.com', 'bobb***@hotmail.com', 'judy***@gmail.com', 'debb***@gmail.com', 'cowh***@gmail.com', 'lori***@gmail.com', 'lbre***@pacific.net.au', 'dcoo***@qcva.com', 'bree***@gmail.com', 'robe***@email.com', 'cara***@hotmail.com', 'mant***@yahoo.com', 'sisy***@yahoo.com', 'ttae***@gmail.com', 'judi***@optusnet.com.au', 'efra***@gmail.com', 'cm74***@aol.com', 'lanc***@gmail.com', 'char***@gmail.com', 'kkpe***@hotmail.com', 'hepp***@aol.com', 'norm***@live.ca', 'bibi***@gmail.com', 'kjla***@hotmail.com', 'loui***@gmail.com', 'athe***@gmail.com', 'thom***@gmail.com', 'cobe***@yahoo.com.vn', 'silv***@yahoo.com', 'vent***@att.net', 'donw***@icloud.com', 'lady***@gmail.com', 'vinc***@hotmail.com', 'roj5***@yahoo.ca', 'agud***@gmail.com', 'lind***@gmail.com', 'doct***@schoolmailing.com', 'poul***@skolekom.dk', 'judy***@gmail.com', 'vinc***@hotmail.com', 'rrob***@gmail.com', 'kaje***@gmail.com', 'mcab***@gmail.com', 'jsta***@gmail.com', 'tlon***@gmail.com', 'mart***@gmail.com', 'mayw***@bigpond.com', 'luke***@gmail.com', 'broi***@aol.com', 'rach***@gmail.com', 'obcr***@gmail.com', 'terr***@xtra.co.nz', 'keys***@gmail.com', 'natr***@gmail.com', 'vlrr***@yahoo.com', 'gina***@yahoo.es', 'lilm***@gmail.com', 'manc***@icloud.com', 'kend***@gmail.com', 'tshe***@gmail.com', 'naee***@yahoo.co.uk', 'worl***@gmail.com', 'tuak***@my.jcu.edu.au', 'cpau***@aol.com', 'wasi***@gmail.com', 'gcct***@gmail.com', 'nedo***@hotmail.fr', 'sudh***@gmail.com', 'kbee***@yahoo.com', 'jgor***@gmail.com', 'hype***@gmail.com', 'dian***@gmail.com', 'szen***@gmail.com', 'twee***@gmail.com', 'bjan***@yahoo.com', 'k9au***@hotmail.com', 'flue***@gmail.com', 'blin***@hotmail.com', 'dann***@att.net', 'noel***@gmail.com', 'cste***@gmail.com', 'hwin***@sky.com', 'sale***@gmail.com', 'jite***@gmail.com', 'leil***@gmail.com', 'choc***@gmail.com', 'eng.***@gmail.com', 'dcca***@icloud.com', 'carl***@gmail.com', 'furf***@gmail.com', 'apri***@yahoo.com', 'abul***@ymail.com', 'vjbg***@gmail.com', 'rose***@gmail.com', 'deed***@yahoo.com', 'adon***@gmail.com', 'pswa***@hotmail.com', 'keki***@gmail.com', 'ocke***@midstream.co.za', 'elan***@gmail.com', 'vtha***@yahoo.com', 'remo***@yahoo.com.ph', 'anoo***@gmail.com', 'andi***@gmail.com', 'dora***@icloud.com', 'vivi***@yahoo.com.au', 'avel***@gmail.com', 'jfeh***@me.com', 'sera***@gmail.com', 'secg***@gmail.com', 'alli***@gmail.com', 'anaa***@gmail.com', 'jdwi***@yahoo.com', 'bong***@gmail.com', 'hous***@gmail.com', 'samm***@gmail.com', 'musa***@hotmail.com', 'whit***@gmail.com', 'seze***@gmail.com', 'tast***@gmail.com', 'nayn***@gmail.com', 'suzi***@gmail.com', 'meke***@yahoo.com', 'dlam***@gmail.com', 'yvon***@gmail.com', 'jano***@online.no', 'bdso***@gmail.com', 'shel***@gmail.com', 'rhia***@gmail.com', 'djab***@gmail.com', 'midd***@gmail.com', 'fatx***@hotmail.com', 'ronn***@hotmail.com', 'niki***@yahoo.com', 'tmoo***@ewf-inc.com', 'jsai***@cox.net', 'teak***@gmail.com', 'leig***@gmail.com', 'mich***@gmail.com', 'jdef***@aol.com', 'haji***@gmail.com', 'rose***@live.com', 'rris***@gmail.com', 'asif***@gmail.com', 'mays***@mail.ru', 'bamb***@gmail.com', 'byar***@comcast.net', 'htra***@gmail.com', 'fran***@gmail.com', 'lero***@vodamail.co.za', 'lore***@icloud.com', 'eede***@gmail.com', 'grah***@bigpond.com', 'jose***@yahoo.com', 'lilj***@gmail.com', 'jrpa***@hotmail.com', 'luke***@seznam.cz', 'jack***@gmail.com', 'joyz***@webmail.cp.za', 'rick***@btinternet.com', 'b4yo***@aol.com', 'karl***@web.de', 'shed***@naij.com', 'mora***@gmail.com', 'oraz***@yahoo.com', 'tino***@hotmail.de', 'mart***@gmail.com', 'toot***@comcast.net', 'bugs***@aol.com', 'sung***@gmail.com', 'will***@gmail.com', 'momk***@hotmail.com', 'palk***@gmail.com', 'mari***@live.nl', 'gogo***@icloud.net', 'vale***@gmail.com', 'dt68***@gmail.com', 'mand***@gmail.com', 'bidd***@aol.com', 'nasi***@gmail.com', 'alia***@yahoo.com', 'andr***@hotmail.com', 'stel***@gmail.com', 'mom.***@hotmail.com', 'gagn***@hotmail.com', 'ingr***@hotmail.com', 'juli***@my.com', 'sbro***@tropicseafood.com', '400d***@gmail.com', 'abeg***@gmail.com', 'anto***@gmail.com', 'bech***@gmail.com', 'r.sa***@outlook.com', 'cora***@gmail.com', 'jose***@gmail.com', 'andr***@outlook.com', 'devi***@gmail.com', 'digv***@gmail.com', 'dan.***@gmail.com', 'domi***@yahoo.com', 'smit***@yahoo.com', 'lal.***@gmail.com', 'gonj***@gmail.com', 'hugo***@gmail.com', 'snip***@gmail.com', 'edba***@gmail.com', 'ashl***@gmail.com', 'jcdo***@gmail.com', 'jonn***@gmail.com', 'abub***@gmail.com', 'mawa***@gmail.com', 'helz***@gmail.com', 'z04f***@gmail.com', 'rafa***@gmail.com', 'paul***@hotmail.com', 'pop.***@gmail.com', 'syed***@gmail.com', 'elen***@live.se', 'immi***@gmail.com', 'fazm***@yahoo.com.my', 'slav***@gmail.com', 'liea***@gmail.com', 'bobb***@yahoo.com', 'sunn***@verizon.net', 'kara***@gmail.com', 'mark***@gmail.com', 'ambe***@gmail.com', 'moha***@yahoo.com', 'notf***@gmail.com', 'prin***@gmail.com', 'gunl***@hotmail.com', 'moos***@outlook.com', 'rren***@aol.com', 'becc***@hotmail.com', 'jama***@gmail.com', 'donw***@gmail.com', 'thom***@hotmail.com', 'avi0***@gmail.com', 'aron***@gmail.com', 'jpwl***@aol.com', 'anto***@gmail.com', 'niki***@yandex.ru', 'arul***@gmail.com', 'kutt***@gmail.com', 'ouri***@gmail.com', 'vish***@gmail.com', 'habi***@hotmail.com', 'suss***@gmail.com', 'rahu***@gmail.com', 'tlal***@gmail.com', 'niko***@gmail.com', 'nico***@gmail.com', 'ledo***@gmail.com', 'drem***@gmail.com', 'corn***@gmail.com', 'chri***@yahoo.com', 'naji***@gmail.com', 'wms.***@suddenlink.net', 'luck***@gmail.com', 'sall***@gmail.com', 'alga***@hotmail.com', 'jose***@gmail.com', 'jasn***@gmail.com', 'dedm***@gmail.com', 'hemm***@gmail.com', 'dona***@gmail.com', 'sabr***@gmail.com', 'joyc***@outlook.com', 'idsa***@gmail.com', 'sa.j***@pack.csupueblo.edu', 'prin***@gmail.com', 'tyle***@gmail.com', 'vans***@gmail.com', 'dami***@yahoo.com', 'mari***@gmail.com', 'bcha***@gmail.com', 'irfa***@gmail.com', 'phil***@hotmail.com', 'd.za***@gmail.com', 'gree***@nycap.rr.com', 'andr***@yahoo.com.au', 'craz***@gmail.com', 'wate***@gmail.com', 'madm***@yahoo.com', 'yvon***@gmail.com', 'jerr***@gmail.com', 'nisr***@hotmail.com', 'demi***@gmail.com', 'hwar***@bigpond.com', '1952***@gmail.com', 'hsav***@yahoo.com', 'jame***@gmail.com', 'corn***@gmail.com', 'henr***@gmail.com', 'leon***@theliquormob.co.za', 'slav***@gmx.at', 'magg***@gmail.com', 'andr***@gmail.com', 'geo2***@gmail.com', 'tim.***@comcast.net', 'arti***@gmail.com', 'vane***@gmail.com', 'fofo***@gmail.com', 'sann***@gmail.com', 'thab***@gmail.com', 'vivi***@gmail.com', 'denf***@gmail.com', 'bues***@hotmail.com', 'emry***@gmail.com', 'anir***@hotmail.com', 'rieb***@gmail.com', 'kenn***@gmail.com', 'adam***@gmail.com', 'real***@gmail.com', 'rmr1***@gmail.com', 'sher***@gmail.com', 'drdo***@comcast.net', 'gksw***@aol.com', 'warr***@gmail.com', 'ojok***@gmail.com', 'mari***@inbox.lv', 'uncl***@gmail.com', 'kjus***@gmail.com', 'm_2h***@hotmail.com', 'acle***@gmail.com', 'dips***@gmail.com', 'cpor***@gmail.com', 'jame***@gmail.com', 'kub1***@yandex.ru', 'ange***@axxess.co.za', 'anne***@yahoo.com.au', 'jbor***@aol.com', 'uniq***@bellsouth.net', 'rafa***@gmail.com', 'sand***@gmail.com', 'eqho***@gmail.com', 'awil***@gmail.com', 'kras***@abv.bg', 'kdcr***@gmail.com', 'pete***@yahoo.com', 'anna***@mail.com', 'call***@yahoo.com', 'barr***@gmail.com', 'jame***@gmail.com', 'mrs.***@gmail.com', 'merl***@msn.com', 'kako***@gmail.com', 'rckg***@gmail.com', 'sbon***@gmail.com', 'nobl***@gmail.com', 'flor***@gmail.com', 'judy***@gmail.com', 'jbbi***@gmail.com', 'pere***@yahoo.com.au', 'jmcc***@gmail.com', 'marj***@gmail.com', 'just***@gmail.com', 'msba***@gmail.com', 'aria***@gmail.com', 'mahl***@yahoo.com.au', 'brig***@sfr.fr', 'mguy***@yahoo.fr', 'venk***@yahoo.in', 'dean***@gmail.com', 'baba***@metlata.com', 'jaya***@gmail.com', 'losb***@gmail.com', 'bacs***@citromail.hu', 'iram***@gmail.com', 'rkto***@gmail.com', 'vinc***@gmail.com', 'jai2***@yahoo.com.au', 'hoss***@gmail.com', 'ghrr***@gmail.com', 'arts***@gmail.com', 'rhod***@aol.com', 'nikk***@gmail.com', 'joed***@gmail.com', 'payt***@gmail.com', 'mthe***@eskom.co.za', 'poo3***@gmail.com', 'kizz***@gmail.com', 'farh***@gmail.com', 'rais***@gmail.com', 'tasn***@gmail.com', 'nobu***@drdar.gov.za', 'kran***@gmail.com', 'hari***@bresnan.net', 'asar***@gmail.com', 'damo***@gmail.com', 'vamp***@gmail.com', 'm.ch***@gmail.com', 'paap***@icloud.com', 'mart***@gmail.com', 'huup***@gmail.com', 'budi***@rocketmail.com', 'jan9***@gmail.com', 'j.do***@gmail.com', 'ashu***@gmail.com', 'grae***@gmail.com', 'ccbo***@hotmail.com', 'chri***@gmail.com', 'reno***@gmail.com', 'jrod***@gmail.com', 'jaco***@gmail.com', 'ishr***@gmail.com', '1012***@gmail.com', 'aret***@gmail.com', 'jjga***@gmail.com', 'luis***@gmail.com', 'shan***@mail.com', 'nawl***@aol.com', 'pans***@gmail.com', 'snow***@hotmail.com', 'trev***@gmail.com', 'jdoj***@gmail.com', 'andy***@gmail.com', 'fsu2***@yahoo.com', 'ange***@hotmail.com', 'pits***@gmail.com', 'sait***@hawaii.rr.com', 'drag***@att.net', 'iren***@gmail.com', 'cwan***@yahoo.com.au', 'shri***@gmail.com', 'sram***@gmail.com', 'suni***@gmail.com', 'tesh***@gmail.com', 'arun***@gmail.com', 'free***@yandex.com', 'tony***@yahoo.co.uk', 'henr***@gmail.com', 'ijal***@gmail.com', 'nhla***@gmail.com', 'pmup***@yahoo.fr', 'ahme***@gmail.com', 'magg***@yahoo.com.au', 'kabi***@gmail.com', 'bles***@gmail.com', 'reaz***@gmail.com', 'mich***@shaw.ca', 'kare***@yahoo.com', 'clh1***@yahoo.com.au', 'husa***@gmail.com', 'lasa***@gmail.com', 'corf***@gmail.com', 'samp***@gmail.com', 'leef***@webmail.co.za', 'heat***@bigpond.com', 'kbru***@gmail.com', 'sanj***@gmail.com', 'happ***@mail.com', 'docc***@aol.com', 'sima***@gmail.com', 'kenc***@aaffgfunding.com', 'ilan***@yandex.ru', 'sher***@rocketmail.com', 'sesh***@slb.com', 'tncm***@gmail.com', 'wies***@gmail.com', 'toll***@gmail.com', 'tama***@gmail.com', 'hele***@icloud.com', 'nsis***@um.co.za', 'mans***@gmail.com', 'lil_***@yahoo.com', 'gume***@gmail.com', 'vpmd***@webmail.co.za', 'ynot***@gmail.com', 'aust***@outlook.com', 'samu***@dpw.gov.za', 'batz***@gmail.com', 'kend***@hotmail.com', 'rbur***@uthsc.edu', 'kuli***@gmail.com', 'mary***@gmail.com', 'cedr***@gmail.com', 'ikra***@gmail.com', 'glad***@gmail.com', 'pete***@yahoo.com.au', 'agar***@gmail.com', 'hamp***@comcast.net', 'lisa***@gmail.com', 'dona***@bigpond.com', 'redn***@gmail.com', 'elen***@rambler.ru', 'fyyg***@gmail.com', 'haer***@yahoo.com.au', 'mmud***@gmail.com', 'sara***@gmail.com', 'oliv***@gmail.com', 'mark***@wakkanet.fi', 'bear***@gmail.com', 'rene***@gmail.com', 'dill***@hotmail.com', 'skrz***@o2.pl', 'thut***@yahoo.com', 'deed***@gmail.com', 'kaja***@yahoo.com.au', 'kenc***@aaffgfunding.com', 'rish***@gmail.com', 'haq.***@gmail.com', 'lydo***@mail.ru', 'xami***@yandex.ru', 'webb***@maltanet.net', 'tome***@gmail.com', 'cker***@gmail.com', 'neit***@hotmail.com', 'makt***@gmail.com', 'wski***@gmail.com', 'peti***@gmail.com', 'alek***@yandex.ru', 'sede***@yahoo.com', 'rmd8***@bigpond.net.au', 'thec***@yahoo.ie', 'mikn***@gmail.com', 'sakp***@gmail.com', 'budi***@gmail.com', 'suzy***@gmail.com', 'agrg***@yahoo.com.au', 'piet***@gmail.com', 'keli***@hotmail.com', 'srik***@gmail.com', 'hein***@arcor.de', 'sasi***@gmail.com', 'kend***@gmail.com', 'bles***@gmail.com', 'mose***@gauteng.gov.za', 'usaf***@yahoo.com', 'uddi***@gmail.com', 'p.fu***@gmail.com', 'ramm***@gmail.com', 'rjda***@bigpond.com.au', 'tani***@gmail.com', 'lady***@gmail.com', 'moni***@live.ca', 'mitr***@gmail.com', 'bkor***@gmail.com', 'msay***@gmail.com', 'leig***@icloud.com', 'vila***@yahoo.com.au', 'juke***@gmail.com', 'dfrg***@yahoo.com', 'trud***@gmail.com', 'cgfg***@yahoo.com.au', 'krug***@gmail.com', 'kidf***@gmail.com', 'aoan***@yahoo.com', 'capl***@gmail.com', 'todo***@gmail.com', 'imti***@gmail.com', 'kale***@gmail.com', '0008***@mail.ru', 'ioan***@gmail.com', 'cher***@gmail.com', 'caro***@gmail.com', 'saed***@yahoo.com.au', 'i.k.***@aon.at', 'gdui***@ncpg.gov.za', 'supe***@yandex.ru', 'jupi***@gmail.com', 'loui***@gmail.com', 'r1ad***@aol.com', 'step***@hotmail.ca', 'suni***@yahoo.co.in', 'idog***@gmail.com', 'gilr***@ymail.com', 'nahe***@gmail.com', 'curt***@gmail.com', 'apok***@hotmail.com', 'mani***@gmail.com', 'diaa***@inbox.lv', 'mari***@bigpond.com', 'capt***@gmail.com', 'zair***@gmail.com', 'lwaz***@gmail.com', 'bobb***@hotmail.com', 'lhha***@gmail.com', 'john***@gmail.com', 'dr.s***@seznam.cz', 'wsik***@hotmail.com', 'pura***@hotmail.com', 'shar***@googlemail.com', 'uche***@gmail.com', 'perr***@gmail.com', 'buba***@utg.edu.gm', 'larr***@yahoo.com.au', 'bail***@charter.net', 'jojo***@hotmail.fr', 'veri***@gmail.com', 'doc_***@yahoo.com.au', 'pips***@msn.com', 'solo***@gmail.com', 'rlnp***@gmail.com', 'roge***@yahoo.com', 'mave***@icloud.com', 'ceci***@terra.net.lb', 'remy***@sfr.fr', 'dash***@gmail.com', 'joem***@hotmail.com', 'mill***@gmail.com', 's.su***@gmail.com', 'vigi***@gmail.com', 'matt***@yahoo.co.uk', 'jona***@gmail.com', 'aros***@gmail.com', 'lynn***@gmail.com', 'd.da***@hotmail.com', 'step***@live.ca', 'isin***@yahoo.com', 'valo***@gmail.com', 'natu***@gmail.com', 'pwil***@wi.rr.com', 'chog***@gmail.com', 'tg_s***@hotmail.com', 'orla***@gmail.com', 'andr***@gmail.com', 'roma***@gmail.com', 'joeb***@gmail.com', 'merv***@gmail.com', 'dani***@outlook.com', 'ngqa***@gmail.com'];

var myArrayname = ['Joe', 'Lakiesha', 'ROGER', 'jose', 'om', 'David', 'donna', 'William', 'Ronald', 'Connie', 'Zoni', 'james', 'Pula', 'Sharon', 'matyas', 'Ruth', 'Mary', 'Joyce', 'Eddie', 'Joseph', 'Catherine', 'cffriend', 'Kimiora', 'Mary', 'rudy', 'Lashanda', 'Joanne', 'Leon', 'Veronica', 'Tadeusz', 'Tonya', 'Sheree', 'Gayla', 'Stephanie', 'Bernie', 'Daniel', 'orlando', 'hadfield', 'Gwendolyn', 'Patriciabe', 'SANAA', 'Wayne', 'Suzan', 'vianney', 'Hlodver', 'kelvin', 'otas', 'Barbara', 'Onithasouk', 'Dave', 'Ahmed', 'troy', 'Rick', 'Benjamin', 'Joanne', 'sol', 'Jay', 'John', 'Sophia', 'Leonardo', 'Sharon', 'Leon', 'Wren', 'June', 'Earl', 'Albear', 'joel', 'shane', 'Michelle', 'Tanya', 'Azam', 'Gail', 'Suhada', 'Heidi', 'John', 'Maun', 'Mark', 'Helio', 'Barry', 'Gordon', 'Norma', 'Wendy', 'Heidi', 'Phillip', 'Gisleyg', 'Nancy', 'silvio', 'Nina', 'Sandra', 'ROMERIO', 'Joyce', 'patricia', 'wing', 'shellie', 'jennifer', 'Yeda', 'Angela', 'Linda', 'herinaldo', 'timothy', 'Mick', 'Francisc', 'EDDIE', 'kyin', 'Amy', 'nellie', 'Terrence', 'Albert', 'Dulcie', 'Athnel', 'Priscilla', 'James', 'julio', 'walter', 'Athnel', 'Jeremiah', 'Shahid', 'Lorryann', 'zerrouki', 'Roody', 'Malvin', 'Marjorie', 'Mark', 'Eleanor.', 'Lisa', 'darralee', 'stacy', 'Gary', 'Zaid', 'Tonya', 'Michael', 'Kelcie', 'Mabel', 'mohammad', 'Joyce', 'Anthony', 'James', 'javier', 'Alice', 'Joyce', 'Larry', 'Michaela', 'Carlene', 'Hilde', 'Robert', 'Annette', 'Micah', 'Gregory', 'Troy', 'Eliza', 'Richard', 'Gustiar', 'Shannon', 'Sigrun', 'Patricia', 'James', 'Priscilla', 'Donna', 'passawat', 'Vilma', 'Jean-yves', 'tom', 'eduardo', 'bill', 'Willie', 'Justin', 'paul', 'Andre', 'richard', 'john', 'Debbie', 'Antonio', 'Mark', 'damienspoo', 'Gloria', 'Marvin', 'Marjorie', 'Josee', 'jane', 'Andrew', 'fahad', 'NELLY', 'jocelyn', 'jeffrey', 'Louie', 'Lessie', 'Guillermo', 'Dorothy', 'Ian', 'BRENDA', 'Jennifer', 'Louis', 'TPS', 'Louis', 'Paul', 'James', 'Paulus', 'Shahid', 'Kenneth', 'Andrew', 'Wes', 'Deborah', 'Roger', 'shakira', 'James', 'Larry', 'CashFormul', 'Marcianna', 'Robert', 'Curtis', 'Neftali', 'Cheryl', 'Marcus', 'samuel', 'Julie', 'Valerie', 'Dolores', 'Ashraful', 'Marni', 'Kym', 'Jane', 'James', 'fernandoal', 'cffriend', 'jack', 'Janay', 'Lena', 'Roy', 'mohamed', 'Jaymie', 'walter', 'Myra', 'Edmundo', 'edward', 'Gilberto', 'Liteasha', 'geraldina', 'Ruperto', 'marysuegir', 'LaShawn', 'Vivian', 'katrina', 'Tara', 'dorothy', 'Camille', 'Veronica', 'brandy', 'Andrea', 'Patricia', 'Rosalinda', 'Paula', 'Mitzy', 'joseph', 'sandra', 'Joan', 'Ilda', 'Andrea', 'Stephen', 'Mohamed', 'habiba', 'Lezlie', 'Alfredo', 'Sheryl', 'david', 'Pedro', 'Paul', 'Percy', 'horiana', 'Jesse', 'Alex', 'Reuben', 'Sharon', 'CATHIE', 'Muhammad', 'zulkipli', 'Linda', 'Glenn', 'Mary', 'Jeff', 'Yvonne', 'Nancy', 'Tonya', 'Randy', 'Marie', 'shadat', 'jamie', 'Jane', 'arif', 'Brenda', 'Jouette', 'Tremain', 'Paul', 'Mario', 'stanley', 'Lisa', 'Thomas', 'Lisa', 'Siegmunt', 'Matthew', 'Ronald', 'Joan', 'jimmy', 'Shah', 'Jasmin', 'Jane', 'Darrell', 'Richard', 'sarah', 'William', 'Donald', 'Terry', 'syafrudin.', 'Carrie', 'Paula', 'audrey', 'Asila', 'Marie', 'Jackie', 'David', 'Ken', 'jimmysamps', 'phan', 'Tommy', 'VALENTINE', 'Charlese', 'Pauline', 'Floriza', 'jay', 'myra', 'DeniseSwan', 'Rachel', 'Willie', 'Chong', 'Tamaiki', 'Lagatria', 'Pierre', 'Marie', 'Mary', 'marjolijn', 'Christophe', 'Manuel', 'Wendy', 'Roderick', 'Albert', 'Kathy', 'shaira', 'william', 'Demikia', 'Chelsi', 'Chethan', 'intan', 'Dimia', 'Sheryl', 'brittany', 'Bonga', 'harold', 'Aisha', 'Wanda', 'David', 'Kurt', 'Cesar', 'F.', 'joan', 'Laura', 'Rogelio', 'ketty', 'Chris', 'Hope', 'Seth', 'Oboumou', 'ashley', 'Victor', 'Henrico', 'Khesita', 'Kaldubike', 'Bessie', 'james', 'Larry', 'Bobbie', 'Judy', 'Debbra', 'Tracy', 'Sandra', 'LANCE', 'Derrick', 'Roscoe', 'Robert', 'Reondrea', 'rick', 'Yasmin', 'Toetu', 'Judi', 'Efrain', 'Connie', 'lancelalar', 'charanthez', 'ketty', 'david', 'Normand', 'loius', 'Karla', 'Louis', 'Larry', 'Thomas', 'chu', 'Dorothy', 'Stella', 'Donald', 'laken', 'Vincent', 'Joseph', 'Agu', 'Linda', 'LUCY', 'Poul', 'Judy', 'Vincent', 'Ricardo', 'Kenny', 'mary', 'Erica', 'Tara', 'martin', 'may', 'Luke', 'JAMES', 'Rachel', 'cffriend', 'Theresa', 'Lionel', 'Natalio', 'Valorie', 'MARIA', 'Misty', 'Barry', 'Kendra', 'Tshegofats', 'azhar', 'Susanne', 'Tuakare', 'Chris', 'Wasim', 'Anna', 'Ned', 'sudhir', 'Kyle', 'Jacqueline', 'andre', 'Dianna.', 'Steve', 'Ellen', 'William', 'MARIE', 'Thomas', 'emmanuel', 'Danny', 'Noel', 'Chong', 'Kailey', 'Marcelle', 'Jitendra', 'Vincent', 'Dawn', 'Samim', 'Diane', 'carla', 'Jennifer', 'APRIL', 'abul', 'Vicky', 'rose', 'Ellen', 'Adonis', 'Paeroa', 'Keisha', 'cffriend', 'Elana', 'Vidyathara', 'Maria', 'Anoop', 'Lydia', 'Dora', 'Vivian', 'Avela', 'Jamie', 'Brittany', 'Topher', 'Allison', 'Ana', 'james', 'Bonginkosi', 'Victoria', 'Samuel', 'Elliot', 'j', 'Angela', 'Stacy', 'MICHELLE', 'Susara', 'Mary', 'Siphiwe', 'Yvonnie', 'JAN', 'Hiram', 'Shelia', 'rhiannon', 'ABDULKADIR', 'Henry', 'Farhia', 'Ron', 'Natasha', 'tommy', 'Shirley', 'Tabatha', 'Leigh-Anne', 'Michelle', 'James', 'Haji', 'Rose', 'Pamela', 'asifshamee', 'lashmi', 'billy', 'Toni', 'Tracy', 'frankdesau', 'Lindi', 'Lorena', 'Eustace', 'Graham', 'JOSEPH', 'lilija', 'jose', 'Marie', 'Jack', 'Zweledinga', 'Richard', 'Patricia', 'karl', 'shedrack', 'Roman', 'Orazio', 'TINO', 'Martin', 'JANET', 'Richard', 'Rico', 'stalin', 'bernice', 'lucky', 'marianne', 'GeorgeOgon', 'Valeria', 'Jessica', 'Amanda', 'Ulysses', 'shaikh', 'Ali', 'Michelle', 'Stellah', 'mohammed', 'ERIC', 'Eva', 'Ayesha', 'sybiline', 'John', 'Abegunde', 'Genaro', 'Irene', 'Rune', 'cora', 'jose', 'andrew', 'DEVINDER', 'digvijay', 'Emilio', 'Dominique', 'Larry', 'lal', 'Djiniyini', 'clymans', 'Robert', 'edward', 'ASHLEY', 'John', 'john', 'Muhammed', 'Brenda', 'mustafa', 'Sri', 'carlos', 'paul', 'Sol', 'syed', 'elena', 'Zulfiqar', 'nor', 'Lavanya', 'Yuhana', 'Bola', 'Patricia', 'KARAN', 'Mark', 'Amber', 'Adan', 'Temnotfo', 'eltons', 'Gunlis', 'DAVID', 'Joseph', 'Becca', 'Jamal', 'Don', 'Thomasvatc', 'Avinash', 'Haron', 'Joseph', 'ANTONIO','najma', 'azrul', 'cffriend', 'MOHAMED', 'Vishwas', 'habib', 'Barbara', 'Rahul', 'leonard', 'nikola', 'nico', 'Nekesha', 'Denmark', 'Cornelia', 'cristine', 'Najib', 'wanda', 'Adrian', 'Sally', 'gamal', 'Jose', 'Jill', 'cffriend', 'Jay', 'Dona', 'Sabrina', 'joyce', 'Idsalem', 'Sherry', 'PRINCE', 'Tyler', 'Karel', 'Brendan', 'Marianayag', 'Brenda', 'IRFAN', 'Jp', 'Davood', 'Bill', 'Andrew', 'Hudson', 'Lucille', 'Julio', 'Rosalyn', 'Kipngeno', 'Nisren', 'Demika', 'Hugh', 'Jeffrey', 'cffriend', 'James', 'Cornelia', 'Henry', 'leon', 'Slavica', 'Diane', 'andrew', 'MURARIU', 'Tim', 'Arthur', 'Vanessa', 'Seham', 'Sally', 'donald', 'Vivienne', 'robert', 'nancy', 'Ellina', 'Aniry', 'Scott', 'Kevine', 'Bethany', 'Salman', 'jill', 'Hussain', 'Dr', 'Gina', 'roger', 'Ojk', 'Marita', 'BHO', 'Kyla', 'Michael', 'AC', 'Deepika', 'Carlos', 'James', 'Dmitry', 'Angie', 'Annette', 'Jay', 'David', 'Rafael', 'sanderson', 'EKO', 'Anthony', 'Krasimira', 'kenny', 'Sumit', 'Anna', 'damien', 'Barry', 'James', 'Malessa', 'merlin', 'kakololo', 'Rob', 'Sbongile', 'NOBLERAJ', 'flora', 'judy', 'Joyce', 'Roy', 'john', 'John', 'Emily', 'Betty', 'pervez', 'Cynthia', 'Emile-Zola', 'ANDRIANORO', 'vijaya', 'Deangela', 'Baba', 'rakesh', 'Carlos', 'Bacskaƒa', 'ghjjff', 'Md.', 'vincent', 'Mohd', 'hossen', 'fati', 'Arturo', 'Donna', 'Nicola', 'Joseph', 'Teri', 'Gratitude', 'Tina', 'mary', 'Farhad', 'Raisul', 'Tasneen', 'nobukhosi', 'Troy', 'Richard', 'Asare', 'Damon', 'eddie', 'ChoirulAna', 'April', 'martin', 'Huu', 'Budi', 'Allen', 'Jafran', 'ashu', 'Graeme', 'Tuljeet', 'chris', 'Renoir', 'Jarrod', 'Jacob', 'Ishrat', 'Nathan', 'Aretha', 'Sylvia', 'Jose', 'cffriend', 'linda', 'SAncho', 'Brian', 'Trevor', 'Jeffrey', 'andi', 'Justin', 'Angela', 'Pitsana', 'cffriend', 'Brian', 'Gyongyike', 'Catherine', 'Devin', 'sharon', 'sunil', 'Anteshia', 'arun', 'Juwan', 'Anthony', 'Henry', 'ijal', 'Nhlakaniph', 'Patrick', 'TAREQ', 'Penny', 'kabiru', 'blessing', 'MD.', 'Michele', 'Karen', 'charles', 'HUSAIN', 'liyanage', 'lisa', 'Sampson', 'Leeann', 'heather', 'Kirstine', 'SANJEEV', 'Zufa', 'Morgan', 'Simao', 'Ken', 'cffriend', 'Sherie', 'Sam', 'Tiffany', 'Wieslawa', 'Crystal', 'Thushantha', 'Helen', 'Ellen', 'Mansoor', 'Carol', 'tsuna', 'vuyisile', 'Tony', 'william', 'samuel', 'Orenthia', 'kendallmcm', 'rosie', 'VLADIMIR', 'Mary', 'Cedric', 'Ikram', 'Constance', 'Peter', 'Agarkova', 'James', 'Lisa', 'don', 'Brendan', 'lenok', 'Hamuera', 'Amanuel', 'Markus', 'sara', 'Olivia', 'Markku', 'Singha', 'Reaf', 'dillon', 'Sebastian', 'Laurence', 'Daphne', 'kajari', 'Ken', 'Rishi', 'Abdul', 'jackson', 'Xamis', 'william', 'Tom', 'Caleb', 'neita', 'ilyass', 'Mikhail', 'Dudymay', 'landy', 'Siddig', 'Rhonda', 'Thecla', 'Michael', 'Raj', 'budiansyah', 'Suzy', 'GHANSHYAM', 'Pieter', 'Keren', 'Thawatchai', 'heinz', 'David', 'lakendra', 'Latoya', 'moses', 'jeremiah', 'jasim', 'Priscilla', 'rammer', 'cffriend', 'Tania', 'Laurie', 'Monique', 'Dusan', 'Tekura', 'Mohamed', 'Leigh', 'Ramon', 'lacy', 'sdfcghth', 'Trudy', 'dfdsffgfg', 'Louwrens', 'Francisco', 'anthony', 'Jeannette', 'Dimitar', 'imtiaz', 'kaleeswara', 'Chyngyz', 'ioana', 'cheryl', 'carole', 'sdsfdfff', 'DI', 'godfrey', 'gina', 'samantha', 'Louis', 'Rick', 'Stephane', 'sunil', 'Idogho', 'Gilray', 'nahenza', 'Curtis', 'Aikaterini', 'manish', 'DiAna', 'Marie', 'Kirk', 'Mohd.Azhar', 'lwazi', 'Robert', 'Lucas', 'wendy', 'Emil', 'Wanda', 'SANJAY', 'Sharon', 'dennis', 'perry', 'buba', 'Larry', 'Malcolm', 'Joanie', 'Veronica', 'David', 'Bridget', 'MICHAEL', 'R.L.N.PRAS', 'Roger', 'Isacc', 'cffriend', 'Raƒamy', 'priyabrata', 'Joe', 'Million', 'sundari', 'esteban', 'mattheus', 'jonathan', 'veronica', 'Lynne', 'Brent', 'Staƒaphan', 'igor', 'amand', 'Joy', 'Patrick', 'Charles', 'Thirugana', 'Orlando', 'Andra', 'alwin', 'Joe', 'mervin', 'Daniel', 'Don'];

function widget_earning_html() {
    if (widget_close_decision == 0) {
        $(".join-popup").addClass('showed');
        setTimeout(function(){
            $(".join-popup").removeClass('showed');
        }, 8000);

        var rand_arr_index = Math.floor(Math.random() * myArrayemail.length) + 1;
        var randemail = myArrayemail[rand_arr_index];
        var randname = myArrayname[rand_arr_index];
        if(randname.length > 6) {
            var rand_arr_index = Math.floor(Math.random() * myArrayemail.length) + 1;
            var randemail = myArrayemail[rand_arr_index];
            var randname = myArrayname[rand_arr_index];
        }
        //var randemail = myArrayemail[Math.floor(Math.random() * myArrayemail.length)];
        //var randname = myArrayname[Math.floor(Math.random() * myArrayname.length)];

        var s = Math.floor(Math.random() * 4) + 1;

        var ran_mints = "";
        if (s == 1)
            ran_mints = "1 min ago";
        else
            ran_mints = s+" mins ago";

        randname = randname.toLowerCase().replace(/\b[a-z]/g, function(letter) {
            return letter.toUpperCase();
        });
        $(".join-popup .green-lighter-text").html(randname.substr(0, 6));
        $(".join-popup .email-text").html(randemail);
        $(".join-popup .time-text").html(ran_mints);
    }
}

function countdown4(cminutes)
{
    var cseconds = 60;
    var cmins = cminutes
    function tick()
    {
        var ccounter = document.getElementById("theTime4");
        var current_minutes = cmins - 1
        cseconds--;
        ccounter.innerHTML = current_minutes.toString();
        if (cseconds > 0) {
            setTimeout(tick, 1000);
        }
        else
        {
            if (cmins > 1)
            {
                countdown4(cmins - 1);
            }
        }
    }
    tick();
}

$(document).ready(function(){
    sessionStorage.setItem('show_joined_popup', 'true');
    setTimeout(function(){
        widgetEarnings();
    }, 2*60*1000);
});
