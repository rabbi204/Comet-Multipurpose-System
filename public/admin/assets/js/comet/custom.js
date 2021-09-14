(function($){
    $(document).ready( function(){
        // logout Features
        $(document).on('click','#logout_btn', function(e){
            e.preventDefault();
            $('#logout_form').submit();
        });
    });

    // for status toggle button
    $(document).on('change', 'input.cat_check', function(){
        let checked = $(this).attr('checked');
        let status_id = $(this).attr('status_id');

        if( checked == 'checked' ){
            $.ajax({
                'url' : 'category/status-inactive/' + status_id,
                'success' : function(data){
                   swal('Status Inactive Successful');
                },
            });
        }else{
            $.ajax({
                'url' : 'category/status-active/' + status_id,
                'success' : function(data){
                    swal('Status Active Successful');
                },
            });
        }
    });














})(jQuery)
