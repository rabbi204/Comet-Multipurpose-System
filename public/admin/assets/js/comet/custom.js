(function($){
    $(document).ready( function(){
        // logout Features
        $(document).on('click','#logout_btn', function(e){
            e.preventDefault();
            $('#logout_form').submit();
        });
    });

    // for Category status toggle button
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

    // for Tag status toggle button
    $(document).on('change','input.tag_check', function(e){
        // e.preventDefault();
        let status_id = $(this).attr('status_id');
        let checked = $(this).attr('checked');

        if(checked == 'checked'){
            $.ajax({
                url : 'tag/status-inactive/' + status_id,
                success : function(data){
                    swal('Status inactive successful');
                }
            });
        }
        else{
            $.ajax({
                url : 'tag/status-active/' + status_id,
                success : function(data){
                    swal('Status active successful');
                }
            });
        }

    });














})(jQuery)
