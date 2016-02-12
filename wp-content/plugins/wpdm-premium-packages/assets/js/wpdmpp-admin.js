jQuery(function($){

    /**
     *  Re-calculate Sales Amount of a product
     */
    $('.recal-sa').on('click', function(e){
        e.preventDefault();
        var $this = $(this);
        var id = $(this).attr('rel');
        $this.html("<i class='fa fa-spinner fa-spin'></i>");
        $.post(ajaxurl, {action: 'RecalculateSales', id: $(this).attr('rel')}, function(res){
            $this.html(res.sales_amount);
            $('#sc-'+id).html(res.sales_quantity);
        });
    });


    /**
     *  Settings >> Premium Package >> Basic Settings
     */

    $('body').on('click', '#allowed_cn', function () {
        $('.ccb').prop('checked', this.checked);
    });
});