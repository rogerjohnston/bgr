/*!
 * jQuery YouTube Popup Player Plugin v2.2
 * http://lab.abhinayrathore.com/jquery_youtube/
 * Last Updated: Aug 30 2012
 */
(function (jQuery) {
    var YouTubeDialog = null;
    var methods = {
        //initialize plugin
        init: function (options) {
            options = jQuery.extend({}, jQuery.fn.YouTubePopup.defaults, options);

            // initialize YouTube Player Dialog
            if (YouTubeDialog == null) {
                YouTubeDialog = jQuery('<div></div>').css({ display: 'none', padding: 0 });
                jQuery('body').append(YouTubeDialog);
                YouTubeDialog.dialog({ autoOpen: false, resizable: false, draggable: options.draggable, modal: options.modal,
                    close: function () {
						YouTubeDialog.html(''); 
						jQuery(".ui-dialog-titlebar").show();
					}
                });
            }

            return this.each(function () {
                var obj = jQuery(this);
                var data = obj.data('YouTube');
                if (!data) { //check if event is already assigned
                    obj.data('YouTube', { target: obj, 'active': true });
                    jQuery(obj).bind('click.YouTubePopup', function () {
                        var youtubeId = options.youtubeId;
                        if (jQuery.trim(youtubeId) == '') youtubeId = obj.attr(options.idAttribute);
                        var videoTitle = jQuery.trim(options.title);
						if (videoTitle == '') {
							if (options.useYouTubeTitle) setYouTubeTitle(youtubeId);
							else videoTitle = obj.attr('title');
						}

                        //Format YouTube URL
                        var YouTubeURL = "http://www.youtube.com/embed/" + youtubeId + "?rel=0&showsearch=0&autohide=" + options.autohide;
                        YouTubeURL += "&autoplay=" + options.autoplay + "&controls=" + options.controls + "&fs=" + options.fs + "&loop=" + options.loop;
                        YouTubeURL += "&showinfo=" + options.showinfo + "&color=" + options.color + "&theme=" + options.theme;

                        //Setup YouTube Dialog
                        YouTubeDialog.html(getYouTubePlayer(YouTubeURL, options.width, options.height));
                        YouTubeDialog.dialog({ 'width': 'auto', 'height': 'auto' }); //reset width and height
                        YouTubeDialog.dialog({ 'minWidth': options.width, 'minHeight': options.height, title: videoTitle });
                        YouTubeDialog.dialog('open');
						jQuery(".ui-widget-overlay").fadeTo('fast', options.overlayOpacity); //set Overlay opacity
						if(options.hideTitleBar && options.modal){ //hide Title Bar (only if Modal is enabled)
							jQuery(".ui-dialog-titlebar").hide(); //hide Title Bar
							jQuery(".ui-widget-overlay").click(function () { YouTubeDialog.dialog("close"); }); //automatically assign Click event to overlay
						}
						if(options.clickOutsideClose && options.modal){ //assign clickOutsideClose event only if Modal option is enabled
							jQuery(".ui-widget-overlay").click(function () { YouTubeDialog.dialog("close"); }); //assign Click event to overlay
						}
                        return false;
                    });
                }
            });
        },
        destroy: function () {
            return this.each(function () {
                jQuery(this).unbind(".YouTubePopup");
                jQuery(this).removeData('YouTube');
            });
        }
    };

	
	function getYouTubePlayer(URL, width, height) {
        var YouTubePlayer = '<iframe title="YouTube video player" style="margin:0; padding:0; float:left;" width="' + width + '" ';
        YouTubePlayer += 'height="' + height + '" src="' + URL + '" frameborder="0" allowfullscreen></iframe>';
		YouTubePlayer += '<script> jQuery(function () {jQuery(".youtube").YouTubePopup({ autoplay: 1 });});</script>';
		YouTubePlayer += '<div id="vid-col">';
		YouTubePlayer += '<div class="vid-thumb"><a class="youtube" href="#" rel="EcPsEMHTW_8"><img src="http://www.burger21.com/userfiles/images/videos/tasty-dreams.jpg"><p style="margin:2px 0 0; padding:0;">Tasty Dreams</p></a></div>';
		YouTubePlayer += '<div class="vid-thumb"><a class="youtube" href="#" rel="1cxY_5iE-Hk"><img src="http://www.burger21.com/userfiles/images/videos/eating-philly-cheese.jpg"><p style="margin:2px 0 0; padding:0;">Eating Philly Cheese</p></a></div>';
		YouTubePlayer += '<div class="vid-thumb"><a class="youtube" href="#" rel="sJ0goSeokoc"><img src="http://www.burger21.com/userfiles/images/videos/21st-burger.jpg"><p style="margin:2px 0 0; padding:0;">21st Burger</p></a></div>';
		YouTubePlayer += '<div class="vid-thumb"><a class="youtube" href="#" rel="D1F7bcylHts"><img src="http://www.burger21.com/userfiles/images/videos/the-bite.jpg"><p style="margin:2px 0 0; padding:0;">The Bite</p></a></div>';
		YouTubePlayer += '<div class="vid-thumb"><a class="youtube" href="#" rel="_P3_LdLmymY"><img src="http://www.burger21.com/userfiles/images/videos/outtakes.jpg"><p style="margin:2px 0 0; padding:0;">Outtakes</p></a></div>';
		YouTubePlayer += '</div>';
        return YouTubePlayer;
    }
	
	function setYouTubeTitle(id) {
		var url = "https://gdata.youtube.com/feeds/api/videos/" + id + "?v=2&alt=json";
		jQuery.ajax({ url: url, dataType: 'jsonp', cache: true, success: function(data){ YouTubeDialog.dialog({ title: data.entry.title.$t }); } });
	}

    jQuery.fn.YouTubePopup = function (method) {
        if (methods[method]) {
            return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            jQuery.error('Method ' + method + ' does not exist on jQuery.YouTubePopup');
        }
    };

    //default configuration
    jQuery.fn.YouTubePopup.defaults = {
		'youtubeId': '',
		'title': '',
		'useYouTubeTitle': true,
		'idAttribute': 'rel',
		'draggable': false,
		'modal': true,
		'width': 640,
		'height': 390,
		'hideTitleBar': true,
		'clickOutsideClose': true,
		'overlayOpacity': 0.8,
		'autohide': 2,
		'autoplay': 1,
		'color': 'red',
		'controls': 1,
		'fs': 1,
		'loop': 0,
		'showinfo': 0,
		'theme': 'dark'
    };
})(jQuery);