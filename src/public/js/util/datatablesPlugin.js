/**
 * creates a buttonTemplate to be used by action buttons on table.
 * All route must end with 0, which will then be replaced createButton(id)
 * @param {string} selector selector for template to be used
 */
 jQuery.fn.extend({
	createButton: function (id) {
		let clone = this.clone();
		let child = clone.children('a,form');
		var curAttr = '';
		if (child.is('form')){
			curAttr = 'action';
		} else if (child.is('a')){
			curAttr = 'href';
		}
		link = child.attr(curAttr);
		link = link.replace('0', id);
		child.attr(curAttr, link);
		clone.removeAttr('id');
		clone.show();
		return clone;
	}
});

/*
 * jQuery throttle / debounce - v1.1 - 3/7/2010
 * http://benalman.com/projects/jquery-throttle-debounce-plugin/
 *
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */
(function(b,c){var $=b.jQuery||b.Cowboy||(b.Cowboy={}),a;$.throttle=a=function(e,f,j,i){var h,d=0;if(typeof f!=="boolean"){i=j;j=f;f=c}function g(){var o=this,m=+new Date()-d,n=arguments;function l(){d=+new Date();j.apply(o,n)}function k(){h=c}if(i&&!h){l()}h&&clearTimeout(h);if(i===c&&m>e){l()}else{if(f!==true){h=setTimeout(i?k:l,i===c?e-m:e)}}}if($.guid){g.guid=j.guid=j.guid||$.guid++}return g};$.debounce=function(d,e,f){return f===c?a(d,e,false):a(d,f,e!==false)}})(this);
