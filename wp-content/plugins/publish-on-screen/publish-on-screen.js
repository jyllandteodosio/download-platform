jQuery(function(){

    if(jQuery( window ).width() > 800) {
        var posp_container = "<div class='posp_container"+(isRtl==1 ? " posp_container_rtl":"")+"'></div>";
        var posp_status = 0;

        jQuery("body").append(posp_container);
        jQuery("#publish").clone().removeAttr("id").appendTo(".posp_container");

        jQuery(window).scroll(function ()
        {
            if (jQuery(window).scrollTop() >= jQuery("#submitdiv").offset().top + jQuery("#submitdiv").height() - 21)
            {
                if (posp_status == 0)
                {
                    posp_status = 1;
                    jQuery(".posp_container").fadeIn("slow");
                    jQuery(".posp_container").css("width", (jQuery(".posp_container input").width() + 47 < 80 ? 82 : jQuery(".posp_container input").width() + 47) );
                }

            } else {
                if (posp_status == 1)
                {
                    posp_status = 0;
                    jQuery(".posp_container").fadeOut("slow");
                }
            }
        });
    }

    jQuery(".posp_container input").click(function() {
        jQuery(this).addClass("disabled");
        jQuery("#publish").trigger("click");
    });

});
