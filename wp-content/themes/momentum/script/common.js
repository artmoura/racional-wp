jQuery(document).ready(function(){



    //MENU
    jQuery("ul.sf-menu").superfish();


        jQuery('.sf-menu li:first').attr('style', 'margin-left: 0');

        jQuery('.stay-tuned ul li:first').attr('style', 'margin-left: 0');

        jQuery('.breadcrumbs-content ul li:last').attr('style', 'background:none !important');

        jQuery('.projects-filter ul li:last').attr('style', 'background: none');
        jQuery('.projects-filter ul li:first').attr('style', 'background: none');

        jQuery('.projects-border:last').attr('style', 'border: none');



    // FLEXSLIDER
        jQuery(window).load(function() {
        jQuery('.flexslider').flexslider({
        slideshow: true,
        slideshowSpeed: 7000, //Integer: Set the speed of the slideshow cycling, in milliseconds
        animationSpeed: 600 //Integer: Set the speed of animations, in milliseconds
        });
    });


    // PIRO BOX
    jQuery().piroBox({
        my_speed: 300, //animation speed
        bg_alpha: 0.5, //background opacity
        slideShow : 'true', // true == slideshow on, false == slideshow off
        slideSpeed : 3, //slideshow
        close_all : '.piro_close' // add class .piro_overlay(with comma)if you want overlay click close piroBox
    });

    jQuery('#searchsubmit').click(function(e){
        e.preventDefault();
        var search_val = jQuery('#s').val();
        if(search_val !== ""){
            jQuery('#searchform').submit();
        }
    });

    jQuery('#searchsubmit').click(function(e){
        e.preventDefault();
        var search_val = jQuery('.search-input').val();
        if(search_val !== ""){
            jQuery('#searchform').submit();
        }
    });


    // HOVER-IMAGES
    jQuery('.news-home-images').hover(function(){
        jQuery('a',this).attr('style', 'display: block;');
    },function(){
        jQuery('a',this).attr('style', 'display: none;');
    });

    jQuery('.latest-projects-images').hover(function(){
        jQuery('a',this).attr('style', 'display: block;');
    },function(){
        jQuery('a',this).attr('style', 'display: none;');
    });

    jQuery('.blog-one-images').hover(function(){
        jQuery('a',this).attr('style', 'display: block;');
    },function(){
        jQuery('a',this).attr('style', 'display: none;');
    });


});


jQuery(function() {


    jQuery("<select />").appendTo("nav");

    // Create default option "Go to..."
    jQuery("<option />", {
     "selected": "selected",
     "value"   : "",
     "text"    : "Ir para..."
    }).appendTo("nav select");

    // Populate dropdown with menu items
    jQuery("nav a").each(function() {
    var el = jQuery(this);
    jQuery("<option />", {
       "value"   : el.attr("href"),
       "text"    : el.text()
    }).appendTo("nav select");
    });

       // To make dropdown actually work
       // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
    jQuery("nav select").change(function() {
    window.location = jQuery(this).find("option:selected").val();
    });

});