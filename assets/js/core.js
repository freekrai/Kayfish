$(document).ready(function(){
	$('form').submit(function(e){
		var form = $(this).attr('id');
		return checkrequireds(e, form);
	});
	$('#topbar').dropdown();
	$('#datatable table').dataTable( {
		"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		}
	} );

	$(".select2").select2();

	$('.add-on :checkbox').click(function () {
		if ($(this).attr('checked')) {
			$(this).parents('.add-on').addClass('active')
		} else {
			$(this).parents('.add-on').removeClass('active')
		}
	})
	$(".copy-code").focus(function () {
		var el = this;
		// push select to event loop for chrome :{o
		setTimeout(function () { $(el).select(); }, 1);
	});
	$(window).bind( 'load resize', function () {
/*
		$('body > .topbar').scrollSpy()
		$(".twipsies a").each(function () {
 			$(this)
				.twipsy({
					live: false
				, placement: $(this).attr('title')
				, trigger: 'manual'
				, offset: 2
				})
				.twipsy('show')
		})
*/
	})
	$('*.hasPlaceHolder').focus(function()	{
		if( $(this).hasClass('placeHolder')){
			$(this).val('');
			$(this).removeClass('placeHolder');
		}
	});	
	// Blur the input element with a placeholder
	$('*.hasPlaceHolder').blur(function(){
		if( $(this).val() == '' ){
			$(this).addClass('placeHolder');
			$(this).val( $(this).siblings('span.placeHolderValue').text() );
		}
	});
});

/***	DO NOT EDIT BELOW HERE.. THAT IS WHAT app.js IS FOR	***/

function isEmpty(el){
	var value=el.val();
	if(value==undefined){
		return true;
	}
	if((el.val()==el.attr('placeholder')) || (el.val()=='')){	
		return true;
	}
}
function checkrequireds(ev,form){
	var enableSubmitButton = true;
	var missingfields = "";
	$('.hasPlaceHolder').each(function(){ 
		var def = $(this).siblings('span.placeHolderValue').text();
		if( $(this).val() == def ) $(this).val('');
	});
	$('#'+form+' input.required').each(function(){ 
		if($(this).val() == '' ){
			$(this).parent().parent().addClass('error');
			missingfields+= jQuery('label[for="'+$(this).attr("id")+'"]').text()+"\n";
			enableSubmitButton = false; 
		}else{
			$(this).parent().parent().removeClass('error');
		}
	});	
	$('#'+form+' select.required').each(function(){
		if($(this).val() == '-1' ){
			$(this).parent().parent().addClass('error');
			missingfields+= jQuery('label[for="'+$(this).attr("name")+'"]').text()+"\n";
			enableSubmitButton = false; 
		}else{
			$(this).parent().parent().removeClass('error');
		}
	});
	$('#'+form+' textarea.required').each(function(){
		if($(this).val() == '' ){
			$(this).parent().parent().addClass('error');
			missingfields+= jQuery('label[for="'+$(this).attr("name")+'"]').text()+"\n";
			enableSubmitButton = false; 
		}else{
			$(this).parent().parent().removeClass('error');
		}
	});	
	if( enableSubmitButton ){
		return true;
	}else{
		ev.preventDefault();
	}
	return false;
}
function clearInputField(field){
	if( field.hasClass('hasPlaceHolder') && field.hasClass('placeHolder'))	return false;
	field.val('');
	if(field.hasClass('hasPlaceHolder')){
		field.val(field.siblings('span.placeHolderValue').text());
		field.addClass('placeHolder');
	}
}
function resetForm(form){
	//alert(form.find('input.textField').length);
	form.find('input.textField').each(function(){
		clearInputField($(this));
	});
	form.find('input.submitItem').attr('disabled','disabled');
}

(function(a,b){"use strict";var c=a.document,d;var e=function(a,e,f){var g=this,i,j,k,l,m,n,o={updated:[]};this.listContainer=typeof a=="string"?c.getElementById(a):a;if(!this.listContainer)return;this.items=[];this.visibleItems=[];this.matchingItems=[];this.searched=false;this.filtered=false;this.list=null;this.templateEngines={};this.page=e.page||200;this.i=e.i||1;j={start:function(a,b){b.plugins=b.plugins||{};this.classes(b);i=new m(g,b);this.callbacks(b);this.items.start(a,b);g.update();this.plugins(b.plugins)},classes:function(a){a.listClass=a.listClass||"list";a.searchClass=a.searchClass||"search";a.sortClass=a.sortClass||"sort"},callbacks:function(a){g.list=d.getByClass(a.listClass,g.listContainer,true);d.addEvent(d.getByClass(a.searchClass,g.listContainer),"keyup",g.search);n=d.getByClass(a.sortClass,g.listContainer);d.addEvent(n,"click",g.sort)},items:{start:function(a,c){if(c.valueNames){var d=this.get(),e=c.valueNames;if(c.indexAsync){this.indexAsync(d,e)}else{this.index(d,e)}}if(a!==b){g.add(a)}},get:function(){var a=g.list.childNodes,c=[];for(var d=0,e=a.length;d<e;d++){if(a[d].data===b){c.push(a[d])}}return c},index:function(a,b){for(var c=0,d=a.length;c<d;c++){g.items.push(new l(b,a[c]))}},indexAsync:function(a,b){var c=a.splice(0,100);this.index(c,b);if(a.length>0){setTimeout(function(){j.items.indexAsync(a,b)},10)}else{g.update()}}},plugins:function(a){var b={templater:i,init:j,initialItems:k,Item:l,Templater:m,sortButtons:n,events:o,reset:r};for(var c=0;c<a.length;c++){a[c][1]=a[c][1]||{};var d=a[c][1].name||a[c][0];g[d]=g.plugins[a[c][0]].call(g,b,a[c][1])}}};this.add=function(a,c){if(c){p(a,c)}var d=[],e=false;if(a[0]===b){a=[a]}for(var f=0,h=a.length;f<h;f++){var i=null;if(a[f]instanceof l){i=a[f];i.reload()}else{e=g.items.length>g.page?true:false;i=new l(a[f],b,e)}g.items.push(i);d.push(i)}g.update();return d};var p=function(a,b,c){var d=a.splice(0,100);c=c||[];c=c.concat(g.add(d));if(a.length>0){setTimeout(function(){p(a,b,c)},10)}else{g.update();b(c)}};this.show=function(a,b){this.i=a;this.page=b;g.update()};this.remove=function(a,b,c){var d=0;for(var e=0,f=g.items.length;e<f;e++){if(g.items[e].values()[a]==b){i.remove(g.items[e],c);g.items.splice(e,1);f--;d++}}g.update();return d};this.get=function(a,b){var c=[];for(var d=0,e=g.items.length;d<e;d++){var f=g.items[d];if(f.values()[a]==b){c.push(f)}}if(c.length==0){return null}else if(c.length==1){return c[0]}else{return c}};this.sort=function(a,c){var e=g.items.length,f=null,i=a.target||a.srcElement,j="",k=false,l="asc",m="desc",c=c||{};if(i===b){f=a;k=c.asc||false}else{f=d.getAttribute(i,"data-sort");k=d.hasClass(i,l)?false:true}for(var o=0,p=n.length;o<p;o++){d.removeClass(n[o],l);d.removeClass(n[o],m)}if(k){if(i!==b){d.addClass(i,l)}k=true}else{if(i!==b){d.addClass(i,m)}k=false}if(c.sortFunction){c.sortFunction=c.sortFunction}else{c.sortFunction=function(a,b){return d.sorter.alphanum(a.values()[f],b.values()[f],k)}}g.items.sort(c.sortFunction);g.update()};this.search=function(a,c){g.i=1;var d=[],e,f,h,j,k,c=c===b?g.items[0].values():c,a=a===b?"":a,l=a.target||a.srcElement;a=l===b?(""+a).toLowerCase():""+l.value.toLowerCase();k=g.items;a=a.replace(/[-[\]{}()*+?.,\\^$|#\s]/g,"\\$&");i.clear();if(a===""){r.search();g.searched=false;g.update()}else{g.searched=true;for(var m=0,n=k.length;m<n;m++){e=false;f=k[m];j=f.values();for(var o in c){if(j.hasOwnProperty(o)&&c[o]!==null){h=j[o]!=null?j[o].toString().toLowerCase():"";if(a!==""&&h.search(a)>-1){e=true}}}if(e){f.found=true;d.push(f)}else{f.found=false}}g.update()}return g.visibleItems};this.filter=function(a){g.i=1;r.filter();if(a===b){g.filtered=false}else{g.filtered=true;var c=g.items;for(var d=0,e=c.length;d<e;d++){var f=c[d];if(a(f)){f.filtered=true}else{f.filtered=false}}}g.update();return g.visibleItems};this.size=function(){return g.items.length};this.clear=function(){i.clear();g.items=[]};this.on=function(a,b){o[a].push(b)};var q=function(a){var b=o[a].length;while(b--){o[a][b]()}};var r={filter:function(){var a=g.items,b=a.length;while(b--){a[b].filtered=false}},search:function(){var a=g.items,b=a.length;while(b--){a[b].found=false}}};this.update=function(){var a=g.items,b=a.length;g.visibleItems=[];g.matchingItems=[];i.clear();for(var c=0;c<b;c++){if(a[c].matching()&&c+1>=g.i&&g.visibleItems.length<g.page){a[c].show();g.visibleItems.push(a[c]);g.matchingItems.push(a[c])}else if(a[c].matching()){g.matchingItems.push(a[c]);a[c].hide()}else{a[c].hide()}}q("updated")};l=function(a,c,d){var e=this,f={};this.found=false;this.filtered=false;var h=function(a,c,d){if(c===b){if(d){e.values(a,d)}else{e.values(a)}}else{e.elm=c;var f=i.get(e,a);e.values(f)}};this.values=function(a,c){if(a!==b){for(var d in a){f[d]=a[d]}if(c!==true){i.set(e,e.values())}}else{return f}};this.show=function(){i.show(e)};this.hide=function(){i.hide(e)};this.matching=function(){return g.filtered&&g.searched&&e.found&&e.filtered||g.filtered&&!g.searched&&e.filtered||!g.filtered&&g.searched&&e.found||!g.filtered&&!g.searched};this.visible=function(){return e.elm.parentNode?true:false};h(a,c,d)};m=function(a,c){if(c.engine===b){c.engine="standard"}else{c.engine=c.engine.toLowerCase()}return new g.constructor.prototype.templateEngines[c.engine](a,c)};j.start(f,e)};e.prototype.templateEngines={};e.prototype.plugins={};e.prototype.templateEngines.standard=function(a,e){function j(a){if(a===b){var d=f.childNodes,g=[];for(var h=0,i=d.length;h<i;h++){if(d[h].data===b){return d[h]}}return null}else if(a.indexOf("<")!==-1){var j=c.createElement("div");j.innerHTML=a;return j.firstChild}else{return c.getElementById(e.item)}}var f=d.getByClass(e.listClass,a.listContainer,true),g=j(e.item),i=this;var k={created:function(a){if(a.elm===b){i.create(a)}}};this.get=function(a,b){k.created(a);var c={};for(var e=0,f=b.length;e<f;e++){var g=d.getByClass(b[e],a.elm,true);c[b[e]]=g?g.innerHTML:""}return c};this.set=function(a,b){k.created(a);for(var c in b){if(b.hasOwnProperty(c)){var e=d.getByClass(c,a.elm,true);if(e){e.innerHTML=b[c]}}}};this.create=function(a){if(a.elm!==b){return}var c=g.cloneNode(true);c.id="";a.elm=c;i.set(a,a.values())};this.remove=function(a){f.removeChild(a.elm)};this.show=function(a){k.created(a);f.appendChild(a.elm)};this.hide=function(a){if(a.elm!==b&&a.elm.parentNode===f){f.removeChild(a.elm)}};this.clear=function(){if(f.hasChildNodes()){while(f.childNodes.length>=1){f.removeChild(f.firstChild)}}}};d={getByClass:function(){if(c.getElementsByClassName){return function(a,b,c){if(c){return b.getElementsByClassName(a)[0]}else{return b.getElementsByClassName(a)}}}else{return function(a,b,d){var e=[],f="*";if(b==null){b=c}var g=b.getElementsByTagName(f);var h=g.length;var i=new RegExp("(^|\\s)"+a+"(\\s|$)");for(var j=0,k=0;j<h;j++){if(i.test(g[j].className)){if(d){return g[j]}else{e[k]=g[j];k++}}}return e}}}(),addEvent:function(a,c){if(c.addEventListener){return function(c,e,f){if(c&&!(c instanceof Array)&&!c.length&&!d.isNodeList(c)&&c.length!==0||c===a){c.addEventListener(e,f,false)}else if(c&&c[0]!==b){var g=c.length;for(var i=0;i<g;i++){d.addEvent(c[i],e,f)}}}}else if(c.attachEvent){return function(c,e,f){if(c&&!(c instanceof Array)&&!c.length&&!d.isNodeList(c)&&c.length!==0||c===a){c.attachEvent("on"+e,function(){return f.call(c,a.event)})}else if(c&&c[0]!==b){var g=c.length;for(var i=0;i<g;i++){d.addEvent(c[i],e,f)}}}}}(this,c),getAttribute:function(a,c){var d=a.getAttribute&&a.getAttribute(c)||null;if(!d){var e=a.attributes;var f=e.length;for(var g=0;g<f;g++){if(c[g]!==b){if(c[g].nodeName===c){d=c[g].nodeValue}}}}return d},isNodeList:function(a){var b=Object.prototype.toString.call(a);if(typeof a==="object"&&/^\[object (HTMLCollection|NodeList|Object)\]$/.test(b)&&(a.length==0||typeof node==="object"&&a[0].nodeType>0)){return true}return false},hasClass:function(a,b){var c=this.getAttribute(a,"class")||this.getAttribute(a,"className")||"";return c.search(b)>-1},addClass:function(a,b){if(!this.hasClass(a,b)){var c=this.getAttribute(a,"class")||this.getAttribute(a,"className")||"";c=c+" "+b+" ";c=c.replace(/\s{2,}/g," ");a.setAttribute("class",c)}},removeClass:function(a,b){if(this.hasClass(a,b)){var c=this.getAttribute(a,"class")||this.getAttribute(a,"className")||"";c=c.replace(b,"");a.setAttribute("class",c)}},sorter:{alphanum:function(a,c,d){if(a===b||a===null){a=""}if(c===b||c===null){c=""}a=a.toString().replace(/&(lt|gt);/g,function(a,b){return b=="lt"?"<":">"});a=a.replace(/<\/?[^>]+(>|$)/g,"");c=c.toString().replace(/&(lt|gt);/g,function(a,b){return b=="lt"?"<":">"});c=c.replace(/<\/?[^>]+(>|$)/g,"");var e=this.chunkify(a);var f=this.chunkify(c);for(var g=0;e[g]&&f[g];g++){if(e[g]!==f[g]){var h=Number(e[g]),i=Number(f[g]);if(d){if(h==e[g]&&i==f[g]){return h-i}else{return e[g]>f[g]?1:-1}}else{if(h==e[g]&&i==f[g]){return i-h}else{return e[g]>f[g]?-1:1}}}}return e.length-f.length},chunkify:function(a){var b=[],c=0,d=-1,e=0,f,g;while(f=(g=a.charAt(c++)).charCodeAt(0)){var h=f==45||f==46||f>=48&&f<=57;if(h!==e){b[++d]="";e=h}b[d]+=g}return b}}};a.List=e;a.ListJsHelpers=d})(window)


$.extend( $.fn.dataTableExt.oStdClasses, {
	"sWrapper": "dataTables_wrapper form-inline"
} );
$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings ){
	return {
		"iStart":		 oSettings._iDisplayStart,
		"iEnd":		   oSettings.fnDisplayEnd(),
		"iLength":		oSettings._iDisplayLength,
		"iTotal":		 oSettings.fnRecordsTotal(),
		"iFilteredTotal": oSettings.fnRecordsDisplay(),
		"iPage":		  Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
		"iTotalPages":	Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
	};
}
$.extend( $.fn.dataTableExt.oPagination, {
	"bootstrap": {
		"fnInit": function( oSettings, nPaging, fnDraw ) {
			var oLang = oSettings.oLanguage.oPaginate;
			var fnClickHandler = function ( e ) {
				e.preventDefault();
				if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
					fnDraw( oSettings );
				}
			};
			$(nPaging).addClass('pagination').append(
				'<ul>'+
					'<li class="prev disabled"><a href="#">&larr; '+oLang.sPrevious+'</a></li>'+
					'<li class="next disabled"><a href="#">'+oLang.sNext+' &rarr; </a></li>'+
				'</ul>'
			);
			var els = $('a', nPaging);
			$(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
			$(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
		},
		"fnUpdate": function ( oSettings, fnDraw ) {
			var iListLength = 5;
			var oPaging = oSettings.oInstance.fnPagingInfo();
			var an = oSettings.aanFeatures.p;
			var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

			if ( oPaging.iTotalPages < iListLength) {
				iStart = 1;
				iEnd = oPaging.iTotalPages;
			}
			else if ( oPaging.iPage <= iHalf ) {
				iStart = 1;
				iEnd = iListLength;
			} else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
				iStart = oPaging.iTotalPages - iListLength + 1;
				iEnd = oPaging.iTotalPages;
			} else {
				iStart = oPaging.iPage - iHalf + 1;
				iEnd = iStart + iListLength - 1;
			}
			for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
				$('li:gt(0)', an[i]).filter(':not(:last)').remove();
				for ( j=iStart ; j<=iEnd ; j++ ) {
					sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
					$('<li '+sClass+'><a href="#">'+j+'</a></li>')
						.insertBefore( $('li:last', an[i])[0] )
						.bind('click', function (e) {
							e.preventDefault();
							oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
							fnDraw( oSettings );
						} );
				}
				if ( oPaging.iPage === 0 ) {
					$('li:first', an[i]).addClass('disabled');
				} else {
					$('li:first', an[i]).removeClass('disabled');
				}

				if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
					$('li:last', an[i]).addClass('disabled');
				} else {
					$('li:last', an[i]).removeClass('disabled');
				}
			}
		}
	}
} );

(function ($, undefined) {
	"use strict";
	/*global document, window, jQuery, console */

	if (window.Select2 !== undefined) {
		return;
	}

	var KEY, AbstractSelect2, SingleSelect2, MultiSelect2;

	KEY = {
		TAB: 9,
		ENTER: 13,
		ESC: 27,
		SPACE: 32,
		LEFT: 37,
		UP: 38,
		RIGHT: 39,
		DOWN: 40,
		SHIFT: 16,
		CTRL: 17,
		ALT: 18,
		PAGE_UP: 33,
		PAGE_DOWN: 34,
		HOME: 36,
		END: 35,
		BACKSPACE: 8,
		DELETE: 46,
		isArrow: function (k) {
			k = k.which ? k.which : k;
			switch (k) {
			case KEY.LEFT:
			case KEY.RIGHT:
			case KEY.UP:
			case KEY.DOWN:
				return true;
			}
			return false;
		},
		isControl: function (k) {
			k = k.which ? k.which : k;
			switch (k) {
			case KEY.SHIFT:
			case KEY.CTRL:
			case KEY.ALT:
				return true;
			}
			return false;
		},
		isFunctionKey: function (k) {
			k = k.which ? k.which : k;
			return k >= 112 && k <= 123;
		}
	};

	function indexOf(value, array) {
		var i = 0, l = array.length, v;

		if (typeof value == 'undefined') {
		  return -1;
		}

		if (value.constructor === String) {
			for (; i < l; i = i + 1) if (value.localeCompare(array[i]) === 0) return i;
		} else {
			for (; i < l; i = i + 1) {
				v = array[i];
				if (v.constructor === String) {
					if (v.localeCompare(value) === 0) return i;
				} else {
					if (v === value) return i;
				}
			}
		}
		return -1;
	}

	/**
	 * Compares equality of a and b taking into account that a and b may be strings, in which case localCompare is used
	 * @param a
	 * @param b
	 */
	function equal(a, b) {
		if (a === b) return true;
		if (a === undefined || b === undefined) return false;
		if (a === null || b === null) return false;
		if (a.constructor === String) return a.localeCompare(b) === 0;
		if (b.constructor === String) return b.localeCompare(a) === 0;
		return false;
	}

	/**
	 * Splits the string into an array of values, trimming each value. An empty array is returned for nulls or empty
	 * strings
	 * @param string
	 * @param separator
	 */
	function splitVal(string, separator) {
		var val, i, l;
		if (string === null || string.length < 1) return [];
		val = string.split(separator);
		for (i = 0, l = val.length; i < l; i = i + 1) val[i] = $.trim(val[i]);
		return val;
	}

	function getSideBorderPadding(element) {
		return element.outerWidth() - element.width();
	}

	function installKeyUpChangeEvent(element) {
		element.bind("keydown", function () {
			element.data("keyup-change-value", element.val());
		});
		element.bind("keyup", function () {
			if (element.val() !== element.data("keyup-change-value")) {
				element.trigger("keyup-change");
			}
		});
	}

	/**
	 * filters mouse events so an event is fired only if the mouse moved.
	 *
	 * filters out mouse events that occur when mouse is stationary but
	 * the elements under the pointer are scrolled.
	 */
	$(document).delegate("*", "mousemove", function (e) {
		$(document).data("select2-lastpos", {x: e.pageX, y: e.pageY});
	});
	function installFilteredMouseMove(element) {
		element.bind("mousemove", function (e) {
			var lastpos = $(document).data("select2-lastpos");
			if (lastpos === undefined || lastpos.x !== e.pageX || lastpos.y !== e.pageY) {
				$(e.target).trigger("mousemove-filtered", e);
			}
		});
	}

	/**
	 * Debounces a function. Returns a function that calls the original fn function only if no invocations have been made
	 * within the last quietMillis milliseconds.
	 *
	 * @param quietMillis number of milliseconds to wait before invoking fn
	 * @param fn function to be debounced
	 * @return debounced version of fn
	 */
	function debounce(quietMillis, fn) {
		var timeout;
		return function () {
			window.clearTimeout(timeout);
			timeout = window.setTimeout(fn, quietMillis);
		};
	}

	function installDebouncedScroll(threshold, element) {
		var notify = debounce(threshold, function (e) { element.trigger("scroll-debounced", e);});
		element.bind("scroll", function (e) {
			if (indexOf(e.target, element.get()) >= 0) notify(e);
		});
	}

	function killEvent(event) {
		event.preventDefault();
		event.stopPropagation();
	}

	function measureTextWidth(e) {
		var sizer, width;
		sizer = $("<div></div>").css({
			position: "absolute",
			left: "-1000px",
			top: "-1000px",
			display: "none",
			fontSize: e.css("fontSize"),
			fontFamily: e.css("fontFamily"),
			fontStyle: e.css("fontStyle"),
			fontWeight: e.css("fontWeight"),
			letterSpacing: e.css("letterSpacing"),
			textTransform: e.css("textTransform"),
			whiteSpace: "nowrap"
		});
		sizer.text(e.val());
		$("body").append(sizer);
		width = sizer.width();
		sizer.remove();
		return width;
	}

	/**
	 * Produces an ajax-based query function
	 *
	 * @param options object containing configuration paramters
	 * @param options.transport function that will be used to execute the ajax request. must be compatible with parameters supported by $.ajax
	 * @param options.url url for the data
	 * @param options.data a function(searchTerm, pageNumber, context) that should return an object containing query string parameters for the above url.
	 * @param options.dataType request data type: ajax, jsonp, other datatatypes supported by jQuery's $.ajax function or the transport function if specified
	 * @param options.quietMillis (optional) milliseconds to wait before making the ajaxRequest, helps debounce the ajax function if invoked too often
	 * @param options.results a function(remoteData, pageNumber) that converts data returned form the remote request to the format expected by Select2.
	 *	  The expected format is an object containing the following keys:
	 *	  results array of objects that will be used as choices
	 *	  more (optional) boolean indicating whether there are more results available
	 *	  Example: {results:[{id:1, text:'Red'},{id:2, text:'Blue'}], more:true}
	 */
	function ajax(options) {
		var timeout, // current scheduled but not yet executed request
			requestSequence = 0, // sequence used to drop out-of-order responses
			handler = null,
			quietMillis = options.quietMillis || 100;

		return function (query) {
			window.clearTimeout(timeout);
			timeout = window.setTimeout(function () {
				requestSequence += 1; // increment the sequence
				var requestNumber = requestSequence, // this request's sequence number
					data = options.data, // ajax data function
					transport = options.transport || $.ajax;

				data = data.call(this, query.term, query.page, query.context);

				if( null !== handler){
					handler.abort();
				}
				handler = transport.call(null, {
					url: options.url,
					dataType: options.dataType,
					data: data,
					success: function (data) {
						if (requestNumber < requestSequence) {
							return;
						}
						// TODO 3.0 - replace query.page with query so users have access to term, page, etc.
						var results = options.results(data, query.page);
						self.context = results.context;
						query.callback(results);
					}
				});
			}, quietMillis);
		};
	}

	/**
	 * Produces a query function that works with a local array
	 *
	 * @param options object containing configuration parameters. The options parameter can either be an array or an
	 * object.
	 *
	 * If the array form is used it is assumed that it contains objects with 'id' and 'text' keys.
	 *
	 * If the object form is used ti is assumed that it contains 'data' and 'text' keys. The 'data' key should contain
	 * an array of objects that will be used as choices. These objects must contain at least an 'id' key. The 'text'
	 * key can either be a String in which case it is expected that each element in the 'data' array has a key with the
	 * value of 'text' which will be used to match choices. Alternatively, text can be a function(item) that can extract
	 * the text.
	 */
	function local(options) {
		var data = options, // data elements
			text = function (item) { return ""+item.text; }; // function used to retrieve the text portion of a data item that is matched against the search

		if (!$.isArray(data)) {
			text = data.text;
			// if text is not a function we assume it to be a key name
			if (!$.isFunction(text)) text = function (item) { return item[data.text]; };
			data = data.results;
		}

		return function (query) {
			var t = query.term.toUpperCase(), filtered = {};
			if (t === "") {
				query.callback({results: data});
				return;
			}
			filtered.results = $(data)
				.filter(function () {return text(this).toUpperCase().indexOf(t) >= 0;})
				.get();
			query.callback(filtered);
		};
	}

	// TODO javadoc
	function tags(data) {
		// TODO even for a function we should probably return a wrapper that does the same object/string check as
		// the function for arrays. otherwise only functions that return objects are supported.
		if ($.isFunction(data)) {
			return data;
		}

		// if not a function we assume it to be an array

		return function (query) {
			var t = query.term.toUpperCase(), filtered = {results: []};
			$(data).each(function () {
				var isObject = this.text !== undefined,
					text = isObject ? this.text : this;
				if (t === "" || text.toUpperCase().indexOf(t) >= 0) {
					filtered.results.push(isObject ? this : {id: this, text: this});
				}
			});
			query.callback(filtered);
		};
	}

	/**
	 * blurs any Select2 container that has focus when an element outside them was clicked or received focus
	 */
	$(document).ready(function () {
		$(document).delegate("*", "mousedown focusin", function (e) {
			var target = $(e.target).closest("div.select2-container").get(0);
			$(document).find("div.select2-container-active").each(function () {
				if (this !== target) $(this).data("select2").blur();
			});
		});
	});

	/**
	 * Creates a new class
	 *
	 * @param superClass
	 * @param methods
	 */
	function clazz(SuperClass, methods) {
		var constructor = function () {};
		constructor.prototype = new SuperClass;
		constructor.prototype.constructor = constructor;
		constructor.prototype.parent = SuperClass.prototype;
		constructor.prototype = $.extend(constructor.prototype, methods);
		return constructor;
	}

	AbstractSelect2 = clazz(Object, {

		bind: function (func) {
			var self = this;
			return function () {
				func.apply(self, arguments);
			};
		},

		init: function (opts) {
			var results, search, resultsSelector = ".select2-results";

			// prepare options
			this.opts = opts = this.prepareOpts(opts);

			this.id=opts.id;

			// destroy if called on an existing component
			if (opts.element.data("select2") !== undefined &&
				opts.element.data("select2") !== null) {
				this.destroy();
			}

			this.enabled=true;
			this.container = this.createContainer();

			if (opts.element.attr("class") !== undefined) {
				this.container.addClass(opts.element.attr("class"));
			}

			// swap container for the element
			this.opts.element
				.data("select2", this)
				.hide()
				.after(this.container);
			this.container.data("select2", this);

			this.dropdown = this.container.find(".select2-drop");
			this.results = results = this.container.find(resultsSelector);
			this.search = search = this.container.find("input[type=text]");

			this.resultsPage = 0;
			this.context = null;

			// initialize the container
			this.initContainer();

			installFilteredMouseMove(this.results);
			this.container.delegate(resultsSelector, "mousemove-filtered", this.bind(this.highlightUnderEvent));

			installDebouncedScroll(80, this.results);
			this.container.delegate(resultsSelector, "scroll-debounced", this.bind(this.loadMoreIfNeeded));

			// if jquery.mousewheel plugin is installed we can prevent out-of-bounds scrolling of results via mousewheel
			if ($.fn.mousewheel) {
				results.mousewheel(function (e, delta, deltaX, deltaY) {
					var top = results.scrollTop(), height;
					if (deltaY > 0 && top - deltaY <= 0) {
						results.scrollTop(0);
						killEvent(e);
					} else if (deltaY < 0 && results.get(0).scrollHeight - results.scrollTop() + deltaY <= results.height()) {
						results.scrollTop(results.get(0).scrollHeight - results.height());
						killEvent(e);
					}
				});
			}

			installKeyUpChangeEvent(search);
			search.bind("keyup-change", this.bind(this.updateResults));
			search.bind("focus", function () { search.addClass("select2-focused");});
			search.bind("blur", function () { search.removeClass("select2-focused");});

			this.container.delegate(resultsSelector, "click", this.bind(function (e) {
				if ($(e.target).closest(".select2-result:not(.select2-disabled)").length > 0) {
					this.highlightUnderEvent(e);
					this.selectHighlighted(e);
				} else {
					killEvent(e);
					this.focusSearch();
				}
			}));

			if ($.isFunction(this.opts.initSelection)) {
				// initialize selection based on the current value of the source element
				this.initSelection();

				// if the user has provided a function that can set selection based on the value of the source element
				// we monitor the change event on the element and trigger it, allowing for two way synchronization
				this.monitorSource();
			}

			if (opts.element.is(":disabled")) this.disable();
		},

		destroy: function () {
			var select2 = this.opts.element.data("select2");
			if (select2 !== undefined) {
				select2.container.remove();
				select2.opts.element
					.removeData("select2")
					.unbind(".select2")
					.show();
			}
		},

		prepareOpts: function (opts) {
			var element, select, idKey;

			element = opts.element;

			if (element.get(0).tagName.toLowerCase() === "select") {
				this.select = select = opts.element;
			}

			if (select) {
				// these options are not allowed when attached to a select because they are picked up off the element itself
				$.each(["id", "multiple", "ajax", "query", "createSearchChoice", "initSelection", "data", "tags"], function () {
					if (this in opts) {
						throw new Error("Option '" + this + "' is not allowed for Select2 when attached to a <select> element.");
					}
				});
			}

			opts = $.extend({}, {
				formatResult: function (data) { return data.text; },
				formatSelection: function (data) { return data.text; },
				formatNoMatches: function () { return "No matches found"; },
				formatInputTooShort: function (input, min) { return "Please enter " + (min - input.length) + " more characters"; },
				minimumResultsForSearch: 0,
				minimumInputLength: 0,
				id: function (e) { return e.id; }
			}, opts);

			if (typeof(opts.id) !== "function") {
				idKey = opts.id;
				opts.id = function (e) { return e[idKey]; };
			}

			if (select) {
				opts.query = this.bind(function (query) {
					var data = {results: [], more: false},
						term = query.term.toUpperCase(),
						placeholder = this.getPlaceholder();
					element.find("option").each(function (i) {
						var e = $(this),
							text = e.text();

						if (i === 0 && placeholder !== undefined && text === "") return true;

						if (text.toUpperCase().indexOf(term) >= 0) {
							data.results.push({id: e.attr("value"), text: text});
						}
					});
					query.callback(data);
				});
				// this is needed because inside val() we construct choices from options and there id is hardcoded
				opts.id=function(e) { return e.id; };
			} else {
				if (!("query" in opts)) {
					if ("ajax" in opts) {
						opts.query = ajax(opts.ajax);
					} else if ("data" in opts) {
						opts.query = local(opts.data);
					} else if ("tags" in opts) {
						opts.query = tags(opts.tags);
						opts.createSearchChoice = function (term) { return {id: term, text: term}; };
						opts.initSelection = function (element) {
							var data = [];
							$(splitVal(element.val(), ",")).each(function () {
								data.push({id: this, text: this});
							});
							return data;
						};
					}
				}
			}
			if (typeof(opts.query) !== "function") {
				throw "query function not defined for Select2 " + opts.element.attr("id");
			}

			return opts;
		},

		/**
		 * Monitor the original element for changes and update select2 accordingly
		 */
		monitorSource: function () {
			this.opts.element.bind("change.select2", this.bind(function (e) {
				if (this.opts.element.data("select2-change-triggered") !== true) {
					this.initSelection();
				}
			}));
		},

		/**
		 * Triggers the change event on the source element
		 */
		triggerChange: function () {
			// Prevents recursive triggering
			this.opts.element.data("select2-change-triggered", true);
			this.opts.element.trigger("change");
			this.opts.element.data("select2-change-triggered", false);
		},


		enable: function() {
			if (this.enabled) return;

			this.enabled=true;
			this.container.removeClass("select2-container-disabled");
		},

		disable: function() {
			if (!this.enabled) return;

			this.close();

			this.enabled=false;
			this.container.addClass("select2-container-disabled");
		},

		opened: function () {
			return this.container.hasClass("select2-dropdown-open");
		},

		open: function () {
			if (this.opened()) return;

			this.container.addClass("select2-dropdown-open").addClass("select2-container-active");

			this.updateResults(true);
			this.dropdown.show();
			this.ensureHighlightVisible();
			this.focusSearch();
		},

		close: function () {
			if (!this.opened()) return;

			this.dropdown.hide();
			this.container.removeClass("select2-dropdown-open");
			this.results.empty();
			this.clearSearch();
		},

		clearSearch: function () {

		},

		ensureHighlightVisible: function () {
			var results = this.results, children, index, child, hb, rb, y, more;

			children = results.children(".select2-result");
			index = this.highlight();

			if (index < 0) return;

			child = $(children[index]);

			hb = child.offset().top + child.outerHeight();

			// if this is the last child lets also make sure select2-more-results is visible
			if (index === children.length - 1) {
				more = results.find("li.select2-more-results");
				if (more.length > 0) {
					hb = more.offset().top + more.outerHeight();
				}
			}

			rb = results.offset().top + results.outerHeight();
			if (hb > rb) {
				results.scrollTop(results.scrollTop() + (hb - rb));
			}
			y = child.offset().top - results.offset().top;

			// make sure the top of the element is visible
			if (y < 0) {
				results.scrollTop(results.scrollTop() + y); // y is negative
			}
		},

		moveHighlight: function (delta) {
			var choices = this.results.children(".select2-result"),
				index = this.highlight();

			while (index > -1 && index < choices.length) {
				index += delta;
				if (!$(choices[index]).hasClass("select2-disabled")) {
					this.highlight(index);
					break;
				}
			}
		},

		highlight: function (index) {
			var choices = this.results.children(".select2-result");

			if (arguments.length === 0) {
				return indexOf(choices.filter(".select2-highlighted")[0], choices.get());
			}

			choices.removeClass("select2-highlighted");

			if (index >= choices.length) index = choices.length - 1;
			if (index < 0) index = 0;

			$(choices[index]).addClass("select2-highlighted");
			this.ensureHighlightVisible();

			if (this.opened()) this.focusSearch();
		},

		highlightUnderEvent: function (event) {
			var el = $(event.target).closest(".select2-result");
			if (el.length > 0) {
				this.highlight(el.index());
			}
		},

		loadMoreIfNeeded: function () {
			var results = this.results,
				more = results.find("li.select2-more-results"),
				below, // pixels the element is below the scroll fold, below==0 is when the element is starting to be visible
				offset = -1, // index of first element without data
				page = this.resultsPage + 1;

			if (more.length === 0) return;

			below = more.offset().top - results.offset().top - results.height();

			if (below <= 0) {
				more.addClass("select2-active");
				this.opts.query({
						term: this.search.val(),
						page: page,
						context: self.context,
						callback: this.bind(function (data) {
					var parts = [], self = this;
					$(data.results).each(function () {
						parts.push("<li class='select2-result'>");
						parts.push(self.opts.formatResult(this));
						parts.push("</li>");
					});
					more.before(parts.join(""));
					results.find(".select2-result").each(function (i) {
						var e = $(this);
						if (e.data("select2-data") !== undefined) {
							offset = i;
						} else {
							e.data("select2-data", data.results[i - offset - 1]);
						}
					});
					if (data.more) {
						more.removeClass("select2-active");
					} else {
						more.remove();
					}
					this.resultsPage = page;
				})});
			}
		},

		/**
		 * @param initial whether or not this is the call to this method right after the dropdown has been opened
		 */
		updateResults: function (initial) {
			var search = this.search, results = this.results, opts = this.opts, self=this;

			search.addClass("select2-active");

			function render(html) {
				results.html(html);
				results.scrollTop(0);
				search.removeClass("select2-active");
			}

			if (search.val().length < opts.minimumInputLength) {
				render("<li class='select2-no-results'>" + opts.formatInputTooShort(search.val(), opts.minimumInputLength) + "</li>");
				return;
			}

			this.resultsPage = 1;
			opts.query({
					term: search.val(),
					page: this.resultsPage,
					context: null,
					callback: this.bind(function (data) {
				var parts = [], // html parts
					def; // default choice

				// create a default choice and prepend it to the list
				if (this.opts.createSearchChoice && search.val() !== "") {
					def = this.opts.createSearchChoice.call(null, search.val(), data.results);
					if (def !== undefined && def !== null && self.id(def) !== undefined && self.id(def) !== null) {
						if ($(data.results).filter(
							function () {
								return equal(self.id(this), self.id(def));
							}).length === 0) {
							data.results.unshift(def);
						}
					}
				}

				if (data.results.length === 0) {
					render("<li class='select2-no-results'>" + opts.formatNoMatches(search.val()) + "</li>");
					return;
				}

				$(data.results).each(function () {
					parts.push("<li class='select2-result'>");
					parts.push(opts.formatResult(this));
					parts.push("</li>");
				});

				if (data.more === true) {
					parts.push("<li class='select2-more-results'>Loading more results...</li>");
				}

				render(parts.join(""));
				results.children(".select2-result").each(function (i) {
					var d = data.results[i];
					$(this).data("select2-data", d);
				});
				this.postprocessResults(data, initial);
			})});
		},

		cancel: function () {
			this.close();
		},

		blur: function () {
			/* we do this in a timeout so that current event processing can complete before this code is executed.
			 this allows tab index to be preserved even if this code blurs the textfield */
			window.setTimeout(this.bind(function () {
				this.close();
				this.container.removeClass("select2-container-active");
				this.clearSearch();
				this.selection.find(".select2-search-choice-focus").removeClass("select2-search-choice-focus");
				this.search.blur();
			}), 10);
		},

		focusSearch: function () {
			/* we do this in a timeout so that current event processing can complete before this code is executed.
			 this makes sure the search field is focussed even if the current event would blur it */
			window.setTimeout(this.bind(function () {
				this.search.focus();
			}), 10);
		},

		selectHighlighted: function () {
			var data = this.results.find(".select2-highlighted:not(.select2-disabled)").data("select2-data");
			if (data) {
				this.onSelect(data);
			}
		},

		getPlaceholder: function () {
			return this.opts.element.attr("placeholder") || this.opts.element.data("placeholder") || this.opts.placeholder;
		},

		/**
		 * Get the desired width for the container element.  This is
		 * derived first from option `width` passed to select2, then
		 * the inline 'style' on the original element, and finally
		 * falls back to the jQuery calculated element width.
		 *
		 * @returns The width string (with units) for the container.
		 */
		getContainerWidth: function () {
			var style, attrs, matches, i, l;
			if (this.opts.width !== undefined)
				return this.opts.width;

			style = this.opts.element.attr('style');
			if (style !== undefined) {
				attrs = style.split(';');
				for (i = 0, l = attrs.length; i < l; i = i + 1) {
					matches = attrs[i].replace(/\s/g, '')
						.match(/width:(([-+]?([0-9]*\.)?[0-9]+)(px|em|ex|%|in|cm|mm|pt|pc))/);
					if (matches !== null && matches.length >= 1)
						return matches[1];
				}
			}
			return this.opts.element.width() + 'px';
		}
	});

	SingleSelect2 = clazz(AbstractSelect2, {

		createContainer: function () {
			return $("<div></div>", {
				"class": "select2-container",
				"style": "width: " + this.getContainerWidth()
			}).html([
				"	<a href='javascript:void(0)' class='select2-choice'>",
				"   <span></span><abbr class='select2-search-choice-close' style='display:none;'></abbr>",
				"   <div><b></b></div>" ,
				"</a>",
				"	<div class='select2-drop' style='display:none;'>" ,
				"   <div class='select2-search'>" ,
				"	   <input type='text' autocomplete='off'/>" ,
				"   </div>" ,
				"   <ul class='select2-results'>" ,
				"   </ul>" ,
				"</div>"].join(""));
		},

		open: function () {

			if (this.opened()) return;

			this.parent.open.apply(this, arguments);

		},

		close: function () {
			if (!this.opened()) return;
			this.parent.close.apply(this, arguments);
		},

		focus: function () {
			this.close();
			this.selection.focus();
		},

		isFocused: function () {
			return this.selection.is(":focus");
		},

		cancel: function () {
			this.parent.cancel.apply(this, arguments);
			this.selection.focus();
		},

		initContainer: function () {

			var selection, container = this.container, clickingInside = false,
				selector = ".select2-choice";

			this.selection = selection = container.find(selector);

			this.search.bind("keydown", this.bind(function (e) {
				switch (e.which) {
				case KEY.UP:
				case KEY.DOWN:
					this.moveHighlight((e.which === KEY.UP) ? -1 : 1);
					killEvent(e);
					return;
				case KEY.TAB:
				case KEY.ENTER:
					this.selectHighlighted();
					killEvent(e);
					return;
				case KEY.ESC:
					this.cancel(e);
					e.preventDefault();
					return;
				}
			}));

			container.delegate(selector, "click", this.bind(function (e) {
				clickingInside = true;

				if (this.opened()) {
					this.close();
					selection.focus();
				} else if (this.enabled) {
					this.open();
				}
				e.preventDefault();

				clickingInside = false;
			}));
			container.delegate(selector, "keydown", this.bind(function (e) {
				if (!this.enabled || e.which === KEY.TAB || KEY.isControl(e) || KEY.isFunctionKey(e) || e.which === KEY.ESC) {
					return;
				}
				this.open();
				if (e.which === KEY.PAGE_UP || e.which === KEY.PAGE_DOWN || e.which === KEY.SPACE) {
					// prevent the page from scrolling
					killEvent(e);
				}
				if (e.which === KEY.ENTER) {
					// do not propagate the event otherwise we open, and propagate enter which closes
					killEvent(e);
				}
			}));
			container.delegate(selector, "focus", function () { if (this.enabled) container.addClass("select2-container-active"); });
			container.delegate(selector, "blur", this.bind(function () {
				if (clickingInside) return;
				if (!this.opened()) this.blur();
			}));

			selection.delegate("abbr", "click", this.bind(function (e) {
				if (!this.enabled) return;
				this.val("");
				killEvent(e);
				this.close();
				this.triggerChange();
			}));

			this.setPlaceholder();
		},

		/**
		 * Sets selection based on source element's value
		 */
		initSelection: function () {
			var selected;
			if (this.opts.element.val() === "") {
				this.updateSelection({id: "", text: ""});
			} else {
				selected = this.opts.initSelection.call(null, this.opts.element);
				if (selected !== undefined && selected !== null) {
					this.updateSelection(selected);
				}
			}

			this.close();
			this.setPlaceholder();
		},

		prepareOpts: function () {
			var opts = this.parent.prepareOpts.apply(this, arguments);

			if (opts.element.get(0).tagName.toLowerCase() === "select") {
				// install sthe selection initializer
				opts.initSelection = function (element) {
					var selected = element.find(":selected");
					// a single select box always has a value, no need to null check 'selected'
					return {id: selected.attr("value"), text: selected.text()};
				};
			}

			return opts;
		},

		setPlaceholder: function () {
			var placeholder = this.getPlaceholder();

			if (this.opts.element.val() === "" && placeholder !== undefined) {

				// check for a first blank option if attached to a select
				if (this.select && this.select.find("option:first").text() !== "") return;

				if (typeof(placeholder) === "object") {
					this.updateSelection(placeholder);
				} else {
					this.selection.find("span").html(placeholder);
				}
				this.selection.addClass("select2-default");

				this.selection.find("abbr").hide();
			}
		},

		postprocessResults: function (data, initial) {
			var selected = 0, self = this, showSearchInput = true;

			// find the selected element in the result list

			this.results.find(".select2-result").each(function (i) {
				if (equal(self.id($(this).data("select2-data")), self.opts.element.val())) {
					selected = i;
					return false;
				}
			});

			// and highlight it

			this.highlight(selected);

			// hide the search box if this is the first we got the results and there are a few of them

			if (initial === true) {
				showSearchInput = data.results.length >= this.opts.minimumResultsForSearch;
				this.search.parent().toggle(showSearchInput);

				//add "select2-with-searchbox" to the container if search box is shown
				this.container[showSearchInput ? "addClass" : "removeClass"]("select2-with-searchbox");
			}

		},

		onSelect: function (data) {
			var old = this.opts.element.val();

			this.opts.element.val(this.id(data));
			this.updateSelection(data);
			this.close();
			this.selection.focus();

			if (!equal(old, this.id(data))) { this.triggerChange(); }
		},

		updateSelection: function (data) {
			this.selection
				.find("span")
				.html(this.opts.formatSelection(data));

			this.selection.removeClass("select2-default");

			if (this.opts.allowClear && this.getPlaceholder() !== undefined) {
				this.selection.find("abbr").show();
			}
		},

		val: function () {
			var val, data = null;

			if (arguments.length === 0) {
				return this.opts.element.val();
			}

			val = arguments[0];

			if (this.select) {
				// val is an id
				this.select
					.val(val)
					.find(":selected").each(function () {
						data = {id: $(this).attr("value"), text: $(this).text()};
						return false;
					});
				this.updateSelection(data);
			} else {
				// val is an object. !val is true for [undefined,null,'']
				this.opts.element.val(!val ? "" : this.id(val));
				this.updateSelection(val);
			}
			this.setPlaceholder();

		},

		clearSearch: function () {
			this.search.val("");
		}
	});

	MultiSelect2 = clazz(AbstractSelect2, {

		createContainer: function () {
			return $("<div></div>", {
				"class": "select2-container select2-container-multi",
				"style": "width: " + this.getContainerWidth()
			}).html([
				"	<ul class='select2-choices'>",
				//"<li class='select2-search-choice'><span>California</span><a href="javascript:void(0)" class="select2-search-choice-close"></a></li>" ,
				"  <li class='select2-search-field'>" ,
				"	<input type='text' autocomplete='off' style='width: 25px;'>" ,
				"  </li>" ,
				"</ul>" ,
				"<div class='select2-drop' style='display:none;'>" ,
				"   <ul class='select2-results'>" ,
				"   </ul>" ,
				"</div>"].join(""));
		},

		prepareOpts: function () {
			var opts = this.parent.prepareOpts.apply(this, arguments);

			opts = $.extend({}, {
				closeOnSelect: true
			}, opts);

			// TODO validate placeholder is a string if specified

			if (opts.element.get(0).tagName.toLowerCase() === "select") {
				// install sthe selection initializer
				opts.initSelection = function (element) {
					var data = [];
					element.find(":selected").each(function () {
						data.push({id: $(this).attr("value"), text: $(this).text()});
					});
					return data;
				};
			}

			return opts;
		},

		initContainer: function () {

			var selector = ".select2-choices", selection;

			this.searchContainer = this.container.find(".select2-search-field");
			this.selection = selection = this.container.find(selector);

			this.search.bind("keydown", this.bind(function (e) {
				if (!this.enabled) return;

				if (e.which === KEY.BACKSPACE && this.search.val() === "") {
					this.close();

					var choices,
						selected = selection.find(".select2-search-choice-focus");
					if (selected.length > 0) {
						this.unselect(selected.first());
						this.search.width(10);
						killEvent(e);
						return;
					}

					choices = selection.find(".select2-search-choice");
					if (choices.length > 0) {
						choices.last().addClass("select2-search-choice-focus");
					}
				} else {
					selection.find(".select2-search-choice-focus").removeClass("select2-search-choice-focus");
				}

				if (this.opened()) {
					switch (e.which) {
					case KEY.UP:
					case KEY.DOWN:
						this.moveHighlight((e.which === KEY.UP) ? -1 : 1);
						killEvent(e);
						return;
					case KEY.ENTER:
					case KEY.TAB:
						this.selectHighlighted();
						killEvent(e);
						return;
					case KEY.ESC:
						this.cancel(e);
						e.preventDefault();
						return;
					}
				}

				if (e.which === KEY.TAB || KEY.isControl(e) || KEY.isFunctionKey(e) || e.which === KEY.BACKSPACE || e.which === KEY.ESC) {
					return;
				}

				this.open();

				if (e.which === KEY.PAGE_UP || e.which === KEY.PAGE_DOWN) {
					// prevent the page from scrolling
					killEvent(e);
				}
			}));

			this.search.bind("keyup", this.bind(this.resizeSearch));

			this.container.delegate(selector, "click", this.bind(function (e) {
				if (!this.enabled) return;
				this.open();
				this.focusSearch();
				e.preventDefault();
			}));

			this.container.delegate(selector, "focus", this.bind(function () {
				if (!this.enabled) return;
				this.container.addClass("select2-container-active");
				this.clearPlaceholder();
			}));

			// set the placeholder if necessary
			this.clearSearch();
		},

		enable: function() {
			if (this.enabled) return;

			this.parent.enable.apply(this, arguments);

			this.search.show();
		},

		disable: function() {
			if (!this.enabled) return;

			this.parent.disable.apply(this, arguments);

			this.search.hide();
		},

		initSelection: function () {
			var data;
			if (this.opts.element.val() === "") {
				this.updateSelection([]);
			}
			if (this.select || this.opts.element.val() !== "") {
				data = this.opts.initSelection.call(null, this.opts.element);
				if (data !== undefined && data !== null) {
					this.updateSelection(data);
				}
			}

			this.close();

			// set the placeholder if necessary
			this.clearSearch();
		},

		clearSearch: function () {
			var placeholder = this.getPlaceholder();

			if (placeholder !== undefined
				&& this.getVal().length === 0
				&& this.search.hasClass("select2-focused") === false) {

				this.search.val(placeholder).addClass("select2-default");
				// stretch the search box to full width of the container so as much of the placeholder is visible as possible
				this.search.width(this.getContainerWidth());
			} else {
				this.search.val("").width(10);
			}
		},

		clearPlaceholder: function () {
			if (this.search.hasClass("select2-default")) {
				this.search.val("").removeClass("select2-default");
			}
		},

		open: function () {
			if (this.opened()) return;
			this.parent.open.apply(this, arguments);
			this.resizeSearch();
			this.focusSearch();
		},

		close: function () {
			if (!this.opened()) return;
			this.parent.close.apply(this, arguments);
		},

		focus: function () {
			this.close();
			this.search.focus();
		},

		isFocused: function () {
			return this.search.hasClass("select2-focused");
		},

		updateSelection: function (data) {
			var ids = [], filtered = [], self = this;

			// filter out duplicates
			$(data).each(function () {
				if (indexOf(self.id(this), ids) < 0) {
					ids.push(self.id(this));
					filtered.push(this);
				}
			});
			data = filtered;

			this.selection.find(".select2-search-choice").remove();
			$(data).each(function () {
				self.addSelectedChoice(this);
			});
			self.postprocessResults();
		},

		onSelect: function (data) {
			this.addSelectedChoice(data);
			if (this.select) { this.postprocessResults(); }

			if (this.opts.closeOnSelect) {
				this.close();
				this.search.width(10);
			} else {
				this.search.width(10);
				this.resizeSearch();
			}

			// since its not possible to select an element that has already been
			// added we do not need to check if this is a new element before firing change
			this.triggerChange();

			this.focusSearch();
		},

		cancel: function () {
			this.close();
			this.focusSearch();
		},

		addSelectedChoice: function (data) {
			var choice,
				id = this.id(data),
				parts,
				val = this.getVal();

			parts = ["<li class='select2-search-choice'>",
				this.opts.formatSelection(data),
				"<a href='javascript:void(0)' class='select2-search-choice-close' tabindex='-1'></a>",
				"</li>"
			];

			choice = $(parts.join(""));
			choice.find("a")
				.bind("click dblclick", this.bind(function (e) {
				if (!this.enabled) return;

				this.unselect($(e.target));
				this.selection.find(".select2-search-choice-focus").removeClass("select2-search-choice-focus");
				killEvent(e);
				this.close();
				this.focusSearch();
			})).bind("focus", this.bind(function () {
				if (!this.enabled) return;
				this.container.addClass("select2-container-active");
			}));

			choice.data("select2-data", data);
			choice.insertBefore(this.searchContainer);

			val.push(id);
			this.setVal(val);
		},

		unselect: function (selected) {
			var val = this.getVal(),
				index;

			selected = selected.closest(".select2-search-choice");

			if (selected.length === 0) {
				throw "Invalid argument: " + selected + ". Must be .select2-search-choice";
			}

			index = indexOf(this.id(selected.data("select2-data")), val);

			if (index >= 0) {
				val.splice(index, 1);
				this.setVal(val);
				if (this.select) this.postprocessResults();
			}
			selected.remove();
			this.triggerChange();
		},

		postprocessResults: function () {
			var val = this.getVal(),
				choices = this.results.find(".select2-result"),
				self = this;

			choices.each(function () {
				var choice = $(this), id = self.id(choice.data("select2-data"));
				if (indexOf(id, val) >= 0) {
					choice.addClass("select2-disabled");
				} else {
					choice.removeClass("select2-disabled");
				}
			});

			choices.each(function (i) {
				if (!$(this).hasClass("select2-disabled")) {
					self.highlight(i);
					return false;
				}
			});

		},

		resizeSearch: function () {

			var minimumWidth, left, maxWidth, containerLeft, searchWidth;

			minimumWidth = measureTextWidth(this.search) + 10;

			left = this.search.offset().left;

			maxWidth = this.selection.width();
			containerLeft = this.selection.offset().left;

			searchWidth = maxWidth - (left - containerLeft) - getSideBorderPadding(this.search);

			if (searchWidth < minimumWidth) {
				searchWidth = maxWidth - getSideBorderPadding(this.search);
			}

			if (searchWidth < 40) {
				searchWidth = maxWidth - getSideBorderPadding(this.search);
			}
			this.search.width(searchWidth);
		},

		getVal: function () {
			var val;
			if (this.select) {
				val = this.select.val();
				return val === null ? [] : val;
			} else {
				val = this.opts.element.val();
				return splitVal(val, ",");
			}
		},

		setVal: function (val) {
			var unique;
			if (this.select) {
				this.select.val(val);
			} else {
				unique = [];
				// filter out duplicates
				$(val).each(function () {
					if (indexOf(this, unique) < 0) unique.push(this);
				});
				this.opts.element.val(unique.length === 0 ? "" : unique.join(","));
			}
		},

		val: function () {
			var val, data = [], self=this;

			if (arguments.length === 0) {
				return this.getVal();
			}

			val = arguments[0];

			if (this.select) {
				// val is a list of ids
				this.setVal(val);
				this.select.find(":selected").each(function () {
					data.push({id: $(this).attr("value"), text: $(this).text()});
				});
				this.updateSelection(data);
			} else {
				val = (val === null) ? [] : val;
				this.setVal(val);
				// val is a list of objects
																									 st
				$(val).each(function () { data.push(self.id(this)); });
				this.setVal(data);
				this.updateSelection(val);
			}

			this.clearSearch();
		},
		onSortStart: function() {
			if (this.select) {
				throw new Error("Sorting of elements is not supported when attached to <select>. Attach to <input type='hidden'/> instead.");
			}

			// collapse search field into 0 width so its container can be collapsed as well
			this.search.width(0);
			// hide the container
			this.searchContainer.hide();
		},
		onSortEnd:function() {

			var val=[], self=this;

			// show search and move it to the end of the list
			this.searchContainer.show();
			// make sure the search container is the last item in the list
			this.searchContainer.appendTo(this.searchContainer.parent());
			// since we collapsed the width in dragStarteed, we resize it here
			this.resizeSearch();

			// update selection

			this.selection.find(".select2-search-choice").each(function() {
				val.push(self.opts.id($(this).data("select2-data")));
			});
			this.setVal(val);
			this.triggerChange();
		}
	});

	$.fn.select2 = function () {

		var args = Array.prototype.slice.call(arguments, 0),
			opts,
			select2,
			value, multiple, allowedMethods = ["val", "destroy", "open", "close", "focus", "isFocused", "container", "onSortStart", "onSortEnd", "enable", "disable"];

		this.each(function () {
			if (args.length === 0 || typeof(args[0]) === "object") {
				opts = args.length === 0 ? {} : $.extend({}, args[0]);
				opts.element = $(this);

				if (opts.element.get(0).tagName.toLowerCase() === "select") {
					multiple = opts.element.attr("multiple");
				} else {
					multiple = opts.multiple || false;
					if ("tags" in opts) {opts.multiple = multiple = true;}
				}

				select2 = multiple ? new MultiSelect2() : new SingleSelect2();
				select2.init(opts);
			} else if (typeof(args[0]) === "string") {

				if (indexOf(args[0], allowedMethods) < 0) {
					throw "Unknown method: " + args[0];
				}

				value = undefined;
				select2 = $(this).data("select2");
				if (select2 === undefined) return;
				if (args[0] === "container") {
					value=select2.container;
				} else {
					value = select2[args[0]].apply(select2, args.slice(1));
				}
				if (value !== undefined) {return false;}
			} else {
				throw "Invalid arguments to select2 plugin: " + args;
			}
		});
		return (value === undefined) ? this : value;
	};

	// exports
	window.Select2 = {
		query: {
			ajax: ajax,
			local: local,
			tags: tags
		}, util: {
			debounce: debounce
		}, "class": {
			"abstract": AbstractSelect2,
			"single": SingleSelect2,
			"multi": MultiSelect2
		}
   };

}(jQuery));