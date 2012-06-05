$.extend( $.fn.dataTableExt.oStdClasses, {
	"sWrapper": "dataTables_wrapper form-inline"
} );
$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings ){
	return {
		"iStart":         oSettings._iDisplayStart,
		"iEnd":           oSettings.fnDisplayEnd(),
		"iLength":        oSettings._iDisplayLength,
		"iTotal":         oSettings.fnRecordsTotal(),
		"iFilteredTotal": oSettings.fnRecordsDisplay(),
		"iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
		"iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
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

$(document).ready(function(){
	$('form').submit(function(e){
		return checkrequireds(e);
	});
	$('#topbar').dropdown();
	$('#datatable table').dataTable( {
		"sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
		"sPaginationType": "bootstrap",
		"oLanguage": {
			"sLengthMenu": "_MENU_ records per page"
		}
	} );

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

function isEmpty(el){
	var value=el.val();
	if(value==undefined){
		return true;
	}
	if((el.val()==el.attr('placeholder')) || (el.val()=='')){	
		return true;
	}
}
function checkrequireds(ev){
	var enableSubmitButton = true;
	var missingfields = "";
	$('.hasPlaceHolder').each(function(){ 
		var def = $(this).siblings('span.placeHolderValue').text();
		if( $(this).val() == def ) $(this).val('');
	});
	$('input.required').each(function(){ 
		if($(this).val() == '' ){
			$(this).addClass('error');
			missingfields+= jQuery('label[for="'+$(this).attr("id")+'"]').text()+"\n";
			enableSubmitButton = false; 
		}else{
			$(this).removeClass('error');
		}
	});	
	$('select.required').each(function(){
		if($(this).val() == '-1' ){
			$(this).addClass('error');
			missingfields+= jQuery('label[for="'+$(this).attr("name")+'"]').text()+"\n";
			enableSubmitButton = false; 
		}else{
			$(this).removeClass('error');
		}
	});
	$('textarea.required').each(function(){
		if($(this).val() == '' ){
			$(this).addClass('error');
			missingfields+= jQuery('label[for="'+$(this).attr("name")+'"]').text()+"\n";
			enableSubmitButton = false; 
		}else{
			$(this).removeClass('error');
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