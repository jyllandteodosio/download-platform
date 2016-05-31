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
            }
            
        });
        
        if($.isEmptyObject(editedfields)){
            
        }else{
            $.confirm({
                title: 'Please confirm your edit.',
                content: 'Are you sure you want to save your edits?' ,
                confirm: function(){
                   $('#post').submit();
                },
                 backgroundDismiss: true,
            });
        }
    });
});