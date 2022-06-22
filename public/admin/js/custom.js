$(document).ready(function(){
    $('#current_password').keyup(function(){
        var current_password = $('#current_password').val();
        // alert(current_password );

        $.ajax({
            type:'post',
            url:'/admin/check-current-password',
            data:{current_password:current_password},
            success:function(res){
               if(res==1){
                  $('#check').html("<p style='color:green;'>Password is correct!</p>")
               }
               if(res==0){
                   $('#check').html("<p style='color:red;'>Password is not correct!</p>")
               }
            },
            error:function(err){
                console.log(err);
            }
        })
    })
})