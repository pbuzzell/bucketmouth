// JavaScript Document
jQuery(document).ready(function($){

	$(".rwd-container").hide();

	$("h3.rwd-toggle").click(function(){
	$(this).toggleClass("active").next().slideToggle("fast");
		return false; //Prevent the browser jump to the link anchor
	});
	$( "#sortable" ).sortable({
        placeholder: "ui-state-highlight",
        serialize: { key: "ordinal"}
    });
    /*$( "#sortable" ).disableSelection();*/

});

jQuery(document).ready(function ($) {
    setTimeout(function () {
        $(".fade").fadeOut("slow", function () {
            $(".fade").remove();
        });

    }, 2000);
    $('.icon_holder').click(function(event){
        var socialNetwork = $(this).attr('alt');
        $('#'+socialNetwork+'_icon').toggle();
        $('#'+socialNetwork).slideToggle();
    });
    var fieldID = null;
    var placeholderID = null;
    $('.upload_button').click(function(event) {
        socialNetwork = $(this).attr('id');
        targetField = '#'+socialNetwork+'_icon';
        tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
         return false;
    });

    window.send_to_editor = function(html) {
        jQuery('#'+socialNetwork+'_image_holder').append(html);
        imgurl = jQuery('#'+socialNetwork+'_image_holder img').attr('src');
        jQuery('#'+socialNetwork+'_icon_holder').attr('src',imgurl);
        jQuery(targetField).val(imgurl);
        tb_remove();

    }

});
jQuery(document).ready(function($) {
    $('#colorpicker').hide();
    $('#colorpicker').farbtastic('#color');

    $('#color').click(function() {
        $('#colorpicker').fadeIn();
    });

    $(document).mousedown(function() {
        $('#colorpicker').each(function() {
            var display = $(this).css('display');
            if ( display == 'block' )
                $(this).fadeOut();
        });
    });
    $('#colorpicker1').hide();
    $('#colorpicker1').farbtastic('#color1');

    $('#color1').click(function() {
        $('#colorpicker1').fadeIn();
    });

    $(document).mousedown(function() {
        $('#colorpicker1').each(function() {
            var display = $(this).css('display');
            if ( display == 'block' )
                $(this).fadeOut();
        });
    });
    $('#colorpicker2').hide();
    $('#colorpicker2').farbtastic('#color2');

    $('#color2').click(function() {
        $('#colorpicker2').fadeIn();
    });

    $(document).mousedown(function() {
        $('#colorpicker2').each(function() {
            var display = $(this).css('display');
            if ( display == 'block' )
                $(this).fadeOut();
        });
    });
});