    var Gallery = {
        current_ad_id: "",
        init: function () {
            this.cacheElements();
            this.bindEvents();
        },
        cacheElements: function () {
            this.results_length = Adsdata.results.length;
            this.last_result_index = this.results_length - 1;
            this.$adsPageThumbs = $("#adsPageThumbs");
            this.$adspageImgWrap = this.$adsPageThumbs.find(".adspage-img-wrap");
            this.$bgElements = $("#main_container");
            this.$modalWindow = $("#adsModalContainer");
            this.$sidebar = $("#adsModalSidebar");
            this.$modalImgWrap = $("#adsModalImgWrap");
            this.$modalThumb = this.$sidebar.find("li");
            this.$bigImage = this.$modalImgWrap.find(".ads-modal-img");
            this.$closeIcon = $("#adsModalClose");
            this.$overlay = $("#adsModalOverlay");
            this.$adsModalRight = $("#adsModalRight");
            this.$maxiDialog = $("#maxiDialog");
        },
        bindEvents: function () {
            this.$adspageImgWrap.on("hover", this.toggleZoomIcon);
/*            this.$adspageImgWrap.add(this.$adsPageThumbs.find(".adspage-title")).on("click", this.displayGallery);
            this.$closeIcon.on("click", this.closeModal);
            this.$sidebar.on("click", "li", this.setNewImgID);
            this.$modalImgWrap.on("click", ".ads-modal-arrow", this.navigate);*/
        },
        /*        render: function (response) {
            var compiledTemplate = Mustache.compile($('#modalGalleryTpl').html());
            var html = compiledTemplate(response);
            Gallery.$modalWindow.html(html);
            Gallery.displayModal();
        },
        getData: function (e) {
            e.preventDefault();
            var request = $.ajax({
                url: "/ajax/ads.json",
                cache: false,
                beforeSend: function () {
                    Gallery.$maxiDialog.show();
                }
            });
            request.done(function (response) {
                Gallery.$maxiDialog.hide();
                Gallery.render(response);

                var template = $('#modalGalleryTpl').html();
                var html = Mustache.to_html(template, response);
                $("#adsModalContainer").html(html);
                $("#adsModalContainer").show();

            });
            request.fail(function (jqXHR, textStatus, errorThrown) {
                Gallery.$maxiDialog.hide();
                alert("Request failed: " + textStatus + " " + errorThrown);
            });

        },*/
        /*        navigate: function (e) {
            e.preventDefault();

            var id = 0,
                current_id = Gallery.current_ad_id,
                new_id = Adsdata.results[0].id,
                next_obj_index = 0,
                prev_obj_index = 0,
                results_length = Adsdata.results.length,
                $direction = $(e.target).closest(".ads-modal-arrow").data("navigate");

            for (var current_obj_index = 0; current_obj_index < results_length; current_obj_index++) {
                id = Adsdata.results[current_obj_index].id;
                if (id === current_id) {
                    if ((results_length - 1) === current_obj_index) {
                        next_obj_index = 0;
                    } else {
                        next_obj_index = current_obj_index + 1;
                    }
                    if (current_obj_index === 0) {
                        prev_obj_index = results_length - 1;
                    } else {
                        prev_obj_index = current_obj_index - 1;
                    }

                    if ($direction === "next") {
                        new_id = Adsdata.results[next_obj_index].id;
                    } else {
                        new_id = Adsdata.results[prev_obj_index].id;
                    }

                    Gallery.current_ad_id = new_id;
                    Gallery.switchImage();
                }

            }
        },*/
        /*        setNewImgID: function (e) {
            var $thumbID = $(e.target).closest("li").data("id");
            Gallery.current_ad_id = $thumbID;
            console.log(Gallery.current_ad_id);
            Gallery.switchImage();
        },
        switchImage: function () {
            Gallery.$bigImage.find("img").remove();
            Gallery.$modalImgWrap.find(".ads-modal-img").append("<img src='/images/ads/" + Gallery.current_ad_id + "_large.png'>");
            Gallery.$modalThumb.removeClass("ads-modal-selected");
            $("#modalThumbID" + Gallery.current_ad_id).addClass("ads-modal-selected");
            Gallery.scrollThumbIntoView();
        },
        scrollThumbIntoView: function () {
            var sidebarSections = [0, 4, 8, this.last_result_index];
            var sidebarSectionIndex = 0;
            for (var i = 0; i < sidebarSections.length; i++) {
                sidebarSectionIndex = sidebarSections[i];
                if (Adsdata.results[sidebarSectionIndex].id === Gallery.current_ad_id) {
                    Gallery.setWindowLocation();
                }
            }

        },*/
/*        displayGallery: function () {
            alert('test');
        },
        setWindowLocation: function () {
            window.location.hash = "modalThumbID" + Gallery.current_ad_id;
        },
        displayModal: function (e) {
            Gallery.$bgElements.fadeOut('fast', function () {
                Gallery.$modalWindow.fadeIn('slow', function () {
                    Gallery.$overlay.show();
                    Gallery.setNewImgID(e);
                });
            });


        },
        closeModal: function (e) {
            e.preventDefault();
            Gallery.$modalWindow.fadeOut('fast', function () {
                Gallery.$overlay.hide();
                window.location.hash = "";
                Gallery.$modalThumb.removeClass("ads-modal-selected");
                Gallery.$bigImage.find("img").remove();
                Gallery.$bgElements.fadeIn('slow');
                Gallery.current_ad_id = "";
            });
        },*/
        toggleZoomIcon: function (e) {
            $(e.target).parent().find(".adspage-zoom-icon").toggleClass("hidden");
        }
    };
    Gallery.init();
// JavaScript Document


   /*    $("#adsModalClose").on("click", function (e) {
        e.preventDefault();
        $("#adsModalOverlay, #adsModalContainer").fadeOut('fast', function () {
            $("#main_container, #footer, #sub_footer").fadeIn('slow');
        });
    });*/



    /*    var Gallery = {
        init: function () {
            this.getData();
        },
                getData: function () {
                        var request = $.ajax({
                            url: "/ajax/ads.json",
                            cache: false,
                            beforeSend: function () {
                                $("#maxiDialog").$maxiDialog.show();
                            }
                        });
                        request.done(function (response) {
                            $("#maxiDialog").hide();
                            var template = $('#modalGalleryTpl').html();
                            var html = Mustache.to_html(template, response);
                            $('#adsModalContainer').html(html);
                            $('#adsModalContainer').show();

                        });
                        request.fail(function (jqXHR, textStatus, errorThrown) {
                            $("#maxiDialog").hide();
                            alert("Request failed: " + textStatus + " " + errorThrown);
                        });


        }
        getData: function () {
            var jsonurl = '/ajax/ads.json';
            $.getJSON(jsonurl, function (data) {

                var template = $('#modalGalleryTpl').html();
                var html = Mustache.to_html(template, data);
                $('#adsModalContainer').html(html);
                $('#adsModalContainer').show();
            });
        }
    };
    Gallery.init();*/
