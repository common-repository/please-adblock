jQuery(document).ready(function($) {
	var adBlockDetected = function() {
		$('.security_first').hide();
	}
	if(typeof  FuckAdBlock === 'undefined') {
		$(document).ready(adBlockDetected);
	} else {
		fuckAdBlock.on(true, adBlockDetected).on(false, adBlockUndetected);
	}
	fuckAdBlock = undefined;
});
