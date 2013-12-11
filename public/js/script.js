$(document).ready(function() {
	$('textarea').focus().tabby();
	$('.save').click(function() {
		$('#submit').click();
	});

	function createPaste() {
		$("#paster").submit();
	}
});
