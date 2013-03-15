jQuery(function(){
    jQuery('input[placeholder], textarea[placeholder]').placeholder();
});

jQuery(document).ready(function(){

    jQuery("#wrapper").fitVids();
});

jQuery(".menu").tinyNav({
    active: 'current_page_item', 
	label: '', 
    header: '' 
});