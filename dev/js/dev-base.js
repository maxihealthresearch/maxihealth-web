//Zopim start
//Must have
window.$zopim || (function (d, s) {
    var z = $zopim = function (c) {
        z._.push(c)
    }, $ = z.s =
            d.createElement(s),
        e = d.getElementsByTagName(s)[0];
    z.set = function (o) {
        z.set.
        _.push(o)
    };
    z._ = [];
    z.set._ = [];
    $.async = !0;
    $.setAttribute('charset', 'utf-8');
    $.src = '//cdn.zopim.com/?VFTJj9YzpezsD2DIe9fDVPUlxBmWZAFV';
    z.t = +new Date;
    $.
    type = 'text/javascript';
    e.parentNode.insertBefore($, e)
})(document, 'script');

//Optional to toggle from chat to send message
$zopim(function () {
    $zopim.livechat.setOnStatus(change_chat_img);
});

function change_chat_img(status) {
    var img = document.getElementById('chat_img');
    if (status == 'online')
        img.src = '/images/chat-live-button.png';
    else if (status == 'away')
        img.src = '/images/send-msg-btn.png';
    else if (stats === 'offline')
        img.src = '/images/send-msg-btn.png';
}
//Zopim end

var App = {
    timestamp: Number(new Date())
}

Modernizr.load({
    test: Modernizr.input.placeholder,
    nope: ['/js/Placeholders.min.js', '/js/placeholders.init.js', ]
});

jQuery.noConflict();

// Put all your jquery code in your document ready area to avoid conflict with prototype
jQuery(document).ready(function ($) {

    var Gallery = {
        init: function () {
            this.cacheElements();
            this.$adspageImgWrap.on("hover", function (e) {
                $(this).find(".adspage-zoom-icon").toggleClass("hidden");
            });
            $("#adsPageThumbs .adspage-img-wrap, #adsPageThumbs .adspage-title").on("click", Gallery.displaymodal);

        },
        cacheElements: function () {
            this.$adspageImgWrap = $("#adsPageThumbs li .adspage-img-wrap");
        },
        displaymodal: function (e) {
            e.preventDefault();
            $("#main_container, #footer, #sub_footer").fadeOut('fast', function () {
                $("#adsModalOverlay, #adsModalContainer").fadeIn('slow');
            });
        }
    }
    Gallery.init();



    $("#adsModalClose").on("click", function (e) {
        e.preventDefault();
        $("#adsModalOverlay, #adsModalContainer").fadeOut('fast', function () {
            $("#main_container, #footer, #sub_footer").fadeIn('slow');
        });
    });

    $('#sidebar-slides').after('<div id="sidebar-slide-dash">')
        .cycle({
        fx: 'fade',
        force: 1,
        timeout: 8000,
        pause: 1,
        pauseOnPagerHover: 1,
        pager: '#sidebar-slide-dash'
    });

    $("#searchInput").autocomplete({
        source: "/ajax/suggest4.json",
        minLength: 2,
        focus: function (event, ui) {
            $("#searchInput").val(ui.item.label);
            return false;
        },
        select: function (event, ui) {
            var pageURL = $("#ui-active-menuitem").attr("href");
            if (pageURL != '') {
                window.location.href = pageURL;
            }

            if (ui.item.url) {
                window.location.href = "/products/" + ui.item.url + ".html";
            }

        },
        open: function (event, ui) {
            $("ul.ui-autocomplete, ul.ui-autocomplete li a").removeClass("ui-corner-all");
            $('<li class="ui-menu-item other-search" id="saLink"><a href="/search/alphabetically/">Search&nbsp;Alphabetically</a></li><li class="ui-menu-item other-search" id="sbiLink"><a href="/search/by-ingredients.html" style="border:0">Search&nbsp;by&nbsp;Ingredients</a></li>').appendTo('ul.ui-autocomplete.ui-menu');

            /*$("#saLink a, #sbiLink a").hover(function () {$(this).toggleClass("ui-state-hover")});*/
            $("#saLink a, #sbiLink a").mouseover(function () {
                $(this).addClass("ui-state-hover");
                $(this).attr('id', 'ui-active-menuitem');
            });
            $("#saLink a, #sbiLink a").mouseout(function () {
                $(this).removeClass("ui-state-hover");
                $(this).attr('id', '');
            });

            $("#saLink a, #sbiLink a").click(function () {
                window.location.href = $("#ui-active-menuitem").attr("href")
            });

        }
    }).data("autocomplete")._renderItem = function (ul, item) {
        return $("<li></li>").data("item.autocomplete", item).append('<a><ul id="autocomleteItem"><li><img src="/images/products/' + (item.value) + '_t.png?dateStamp=' + App.timestamp + '"></li><li>' + item.label + '</li></ul></a>').appendTo(ul);
    }


    $("#header .menu .m>a.last").click(function (event) {
        event.preventDefault();
        $(this).toggleClass('active');
        $('#storesDropDown').slideToggle('active');
    });

});