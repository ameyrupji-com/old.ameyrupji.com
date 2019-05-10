/**
 * Collapsible plugin
 *
 * Copyright (c) 2010 Ramin Hossaini (www.ramin-hossaini.com)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 *
 */

jQuery.collapsible = function(selector, identifier) {
	
	//toggle the div after the header and set a unique-cookie
	$(selector).click(function() {
		$(this).next().slideToggle('fast', function() {
			if ( $(this).is(":hidden") ) {
				$.cookie($(this).prev().attr("id"), 'hide');
				$(this).prev().children(".placeholder").removeClass("collapse").addClass("expand");
				$(this).prev().removeClass("open").addClass("close");
			}
			else {
				$.cookie($(this).prev().attr("id"), 'show');
				$(this).prev().children(".placeholder").removeClass("expand").addClass("collapse");
				$(this).prev().removeClass("close").addClass("open");
			}
		});
		return false;
	}).next();

	
	//show that the header is clickable
	$(selector).hover(function() {
		$(this).css("cursor", "pointer");
	});

	/*
	 * On document.ready: should the module be shown or hidden?
	 */
	var idval = 0;	//increment used for generating unique ID's
	$.each( $(selector) , function() {

		$($(this)).attr("id", "module_" + identifier + idval);	//give each a unique ID

		if ( !$($(this)).hasClass("collapsed") ) {
			$("#" + $(this).attr("id") ).append("<span class='placeholder collapse'></span>");
		}
		else if ( $($(this)).hasClass("collapsed") ) {
			//by default, this one should be collapsed
			$("#" + $(this).attr("id") ).append("<span class='placeholder expand'></span>");
		}
		
		//what has the developer specified? collapsed or expanded?
		if ( $($(this)).hasClass("collapsed") ) {
			$("#" + $(this).attr("id") ).next().hide();
			$("#" + $(this).attr("id") ).children("span").removeClass("collapse").addClass("expand");
		}
		else {
			$("#" + $(this).attr("id") ).children("span").removeClass("expand").addClass("collapse");
		}

	
		if ( $.cookie($(this).attr("id")) == 'hide' ) {
			$("#" + $(this).attr("id") ).next().hide();
			$("#" + $(this).attr("id") ).children("span").removeClass("collapse").addClass("expand");
		}
		else if ( $.cookie($(this).attr("id")) == 'show' ) {
			$("#" + $(this).attr("id") ).next().show();
			$("#" + $(this).attr("id") ).children(".placeholder").removeClass("expand").addClass("collapse");
		}
		

		idval++;
	});

};

jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        // CAUTION: Needed to parenthesize options.path and options.domain
        // in the following expressions, otherwise they evaluate to undefined
        // in the packed version for some reason...
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};