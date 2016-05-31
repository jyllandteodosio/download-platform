jQuery(document).ready(function($){
    console.log('Admin Edit Validation enabled!');
    
    //console.log(aevtovalidate);
    allfields = aevtovalidate.split(',');
    
    var itemTitle = $('#title').val();
    var fieldarrOriginal = {};
    $.each(allfields, function(ind, item){
        fieldarrOriginal[item] = $('#'+item).val();
    });
    console.log(fieldarrOriginal);
    
    $('#publish').on('click', function(e){
        e.preventDefault();        
        var editedfields = {};
        
        $.each(allfields, function(ind, item){
            if(fieldarrOriginal[item] === $('#'+item).val()){
                
            }else{
                editedfields[item] = $('#'+item).val();
                $('#'+item).addClass('aev-edited');
            }
            
        });
        
        if($.isEmptyObject(editedfields)){
            $('#post').submit();
        }else{
            $.confirm({
                title: 'Update Warning',
                content: 'You are about to make changes on all of the highlighted fields.',
                confirmButton: 'Update',
                cancelButton: 'Review Changes',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-default btn-close',                
                confirm: function(){
                   $('#post').submit();
                },
                onClose: function(){
                   // $('.aev-edited').removeClass('aev-edited');
                },
                 backgroundDismiss: true,
            });
        }
    });
});