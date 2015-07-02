if(!fn) { var fn = {}; }

function pa(arr)
{
	var str = ''; for(i in arr) { str += i+":"+arr[i]+"\n"; } alert(str);
}

fn.now = function() { return Math.round((new Date()).getTime() / 1000); }

fn.check = function(form)
{
	var $form = $(form);
	var error = '';
	$form.find('input[accept="true"], select[accept="true"], textarea[accept="true"]').each(function(){
		var alt = $(this).attr('alt'); if(alt==undefined || alt.length<1) alt = $(this).attr('name');
		var value = $(this).val(); $(this).bind('click.check', function(){ $(this).removeClass('error'); });
		if(value.length<1) { error += alt+"\n"; $(this).addClass('error'); }
	});
	
	if(error.length==0) return true; alert("Please complete the following:\n"+error); return false;
}

$().ready(function(){
	$('[placeholder]').focus(function(){
		var input = $(this);
		if(input.val() == input.attr('placeholder')) { input.val(''); input.removeClass('placeholder'); }
	})
	.blur(function(){
		var input = $(this);
		if(input.val() == '' || input.val() == input.attr('placeholder')) { input.addClass('placeholder'); input.val(input.attr('placeholder')); }
	})
	.blur().parents('form').submit(function(){
		$(this).find('[placeholder]').each(function(){ var input = $(this); if(input.val() == input.attr('placeholder')) { input.val(''); } })
	});
});