$j = jQuery.noConflict();

$j(document).ready(function(){
	$j('#PageAnnouncementContainer').cycle ({
		fx: 'scrollHorz',
		delay: -100,
		speed: 1000,
		timeout: 10000,
		pause: true,
		slideExpr: 'div'
	});
});