$(document).ready(function(){
	$('form').submit(function(e){
		return checkrequireds(e);
	});
	$('#topbar').dropdown();
	$("#sortTable").tablesorter( { sortList: [[ 1, 0 ]] } )
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