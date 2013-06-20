/*global window: false, Mustache */

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
            this.bindEvents();
        },
        cacheElements: function () {
            this.$adsPageThumbs = $("#adsPageThumbs");
            this.$adspageImgWrap = this.$adsPageThumbs.find(".adspage-img-wrap");
            this.$bgElements = $("#main_container");
            this.$modalWindow = $("#adsModalContainer");
            this.$overlay = $("#adsModalOverlay");
            this.$modalImgWrap = $("#adsModalImgWrap");
            this.$sidebar = this.$modalWindow.find(".ads-modal-sidebar ul");
            this.current_ad_id = "";
        },
        bindEvents: function () {
            this.$adspageImgWrap.on("hover", this.toggleZoomIcon)
                .on("click", this.displayGallery);
            this.$adsPageThumbs.find(".adspage-title").on("click", this.displayGallery);
            this.$modalWindow.on("click", '.ads-modal-close', this.closeModal)
                .on("click", ".ads-modal-sidebar ul li", this.setImgID)
                .on("click", ".ads-modal-arrow", this.navigate);

        },
        setImgID: function (e) {
            Gallery.current_ad_id = $(e.target).closest("li").data("id");
            Gallery.switchImage();
        },
        highlightThumb: function () {
            Gallery.$modalWindow.find(".ads-modal-sidebar ul li").removeClass("ads-modal-selected");
            $("#modalThumbID" + this.current_ad_id).addClass("ads-modal-selected");
        },
        switchImage: function () {
            Gallery.highlightThumb();
            var bigImage = Gallery.$modalWindow.find(".ads-modal-img");
            bigImage.find("img").remove();
            bigImage.append("<img src='/images/ads/" + Gallery.current_ad_id + "_large.png'>");
            Gallery.setWindowLocation();
            /*            
            Gallery.scrollThumbIntoView();*/
        },
        displayGallery: function (e) {
            e.preventDefault();
            Gallery.current_ad_id = $(e.target).closest("li").data("id");
            var modalWindow = Gallery.$modalWindow;
            modalWindow.load('modal-gallery.php', Gallery.switchImage);

            Gallery.$bgElements.fadeOut('fast', function () {
                modalWindow.fadeIn('slow', function () {
                    Gallery.$overlay.show();
                });
            });
        },
        navigate: function (e) {
            e.preventDefault();
            var listNode = Gallery.$modalWindow.find(".ads-modal-sidebar ul li");
            var $direction = $(e.target).closest(".ads-modal-arrow").data("navigate");
            var current_id = listNode.filter('[data-id=' + Gallery.current_ad_id + ']');
            var first_id = listNode.first().data("id");
            var last_id = listNode.last().data("id");
            var next_id = current_id.next().data("id");
            next_id = typeof next_id === 'undefined' ? first_id : next_id;
            var prev_id = current_id.prev().data("id");
            prev_id = typeof prev_id === 'undefined' ? last_id : prev_id;
            Gallery.current_ad_id = $direction === 'next' ? next_id : prev_id;
            Gallery.switchImage();
        },
        setWindowLocation: function () {
            window.location.hash = "modalThumbID" + Gallery.current_ad_id;
        },
        closeModal: function (e) {
            e.preventDefault();
            Gallery.$modalWindow.fadeOut('fast', function () {
                Gallery.$overlay.hide();
                window.location.hash = "";
                /*Gallery.$modalThumb.removeClass("ads-modal-selected");*/
                /*Gallery.$bigImage.find("img").remove();*/
                Gallery.$bgElements.fadeIn('slow');
                /*Gallery.current_ad_id = "";*/
            });
        },
        toggleZoomIcon: function (e) {
            $(e.target).parent().find(".adspage-zoom-icon").toggleClass("hidden");
        }

    };
    Gallery.init();

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