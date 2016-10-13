$(document).ready(function(){
    $('#main-form').on('submit', function(){
        var email_value = $('#email').val();
        if (typeof from_page == 'undefined') {
            from_page = 'fp';
        }
        var fname = $('#name').val();
        $('body').append('<img id="menia_src" style="display: none">');
        validateEmail(email_value, from_page, fname);
        window.onbeforeunload = null;
    });

    $('#modal-submit').on('click', function () {
        $('#email').val($('#modal-email').val());
        $('#name').val($('#modal-name').val());
        from_page = 'exit';
        $('#myModal').modal('hide');
        $('#main-form').trigger('submit');
        window.onbeforeunload = null;
    });

    function addLoadEvent(func) {
        var oldonload = window.onload;
        if (typeof window.onload != 'function') {
            window.onload = func;
        } else {
            window.onload = function () {
                if (oldonload) {
                    oldonload();
                }
                func();
            }
        }
    }

    function addClickEvent(a, i, func) {
        if (typeof a[i].onclick != 'function') {
            a[i].onclick = func;
        }
    }

    var theDiv = '<div id="ExitSplashDiv" style="display:block; width:100%; height:100%; position:absolute; background:#FFFFFF; margin-top:0px; margin-left:0px;" align="center">';
    theDiv = theDiv + '<iframe src="'+exitsplashpage+'" width="100%" height="100%" align="middle" frameborder="0"></iframe>';
    theDiv = theDiv + '</div>';

    theBody = document.body;
    if (!theBody) {
        theBody = document.getElementById("body");
        if (!theBody) {
            theBody = document.getElementsByTagName("body")[0];
        }
    }

    var PreventExitSplash = false;

    function DisplayExitSplash() {
        if (PreventExitSplash == false) {
            window.scrollTo(0, 0);
            PreventExitSplash = true;
            divtag = document.createElement("div");
            divtag.setAttribute("id", "ExitSplashMainOuterLayer");
            divtag.style.position = "absolute";
            divtag.style.width = "100%";
            divtag.style.height = "100%";
            divtag.style.zIndex = "99";
            divtag.style.left = "0px";
            divtag.style.top = "0px";
            divtag.innerHTML = theDiv;
            theBody.innerHTML = "";
            theBody.topMargin = "0px";
            theBody.rightMargin = "0px";
            theBody.bottomMargin = "0px";
            theBody.leftMargin = "0px";
            theBody.style.overflow = "hidden";
            theBody.appendChild(divtag);
            return exitsplashmessage;
        }
    }

    var a = document.getElementsByTagName('A');
    for (var i = 0; i < a.length; i++) {
        if (a[i].target !== '_blank') {
            addClickEvent(a, i, function () {
                PreventExitSplash = true;
            });
        } else {
            addClickEvent(a, i,
                function () {
                    PreventExitSplash = false;
                });
        }
    }

    disablelinksfunc = function () {
        var a = document.getElementsByTagName('A');
        for (var i = 0; i < a.length; i++) {
            if (a[i].target !== '_blank') {
                addClickEvent(a, i,
                    function () {
                        PreventExitSplash = true;
                    });
            } else {
                addClickEvent(a, i, function () {
                    PreventExitSplash = false;
                });
            }
        }
    }

    addLoadEvent(disablelinksfunc);
    disableformsfunc = function () {
        var f = document.getElementsByTagName('FORM');
        for (var i = 0; i < f.length; i++) {
            if (!f[i].onclick) {
                f[i].onclick = function () {
                    PreventExitSplash = true;
                }
            } else if
            (!f[i].onsubmit) {
                f[i].onsubmit = function () {
                    PreventExitSplash = true;
                }
            }
        }
    }

    addLoadEvent(disableformsfunc);
    // window.onbeforeunload = DisplayExitSplash;
    window.onbeforeunload = function () {
        $("#myModal").modal('show');
        return false;
    };

    var is_ovrly_closed = 0;
    function close_overlay()
    {
        is_ovrly_closed = 1;
        $('#myModal').modal('hide');
        //console.log(is_ovrly_closed);
    }
    var is_shown = 0;
    var timerinter1;
    var is_time_over = 0;
    setTimeout(function(){
        //console.log("times up");
        jQuery(document).mousemove(function(e) {
            if (e.pageY <= 20 && is_ovrly_closed == 0)
            {
                // Show the exit popup
                // $('#overlay').modal('show');
                if ($('#loading-sec').hasClass('in')) {
                    console.log('showing thank you modal');
                } else {
                    $("#myModal").modal('show');
                }


                if(is_shown == 0)
                {
                    wistiaEmbed.pause();
                }
                is_shown = 1;
            }
            $('body').on('hidden.bs.modal', '#overlay', function() {
                $(this).removeData('bs.modal');
                wistiaEmbed.play();
                is_shown = 0;
                minutes1 = 0;
                seconds1 = 0;
                centiseconds1 = 0;
                clearInterval(timerinter1);
            });
        });
    }, 10000);



});