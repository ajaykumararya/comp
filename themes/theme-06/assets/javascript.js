// start slick slider
$('.responsive').slick({
    dots: true,
    autoplay:true,
    infinite: true,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [
        {
        breakpoint: 1024,
        settings: {
        slidesToShow: 4,
        slidesToScroll: 1,
        infinite: true,
        dots: true
        }
        },
        {
        breakpoint: 600,
        settings: {
        slidesToShow: 4,
        slidesToScroll: 1
        }
        },
        {
        breakpoint: 480,
        settings: {
        slidesToShow: 1,
        slidesToScroll: 1
        }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});
$('.client-responsive').slick({
    autoplay : true,
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 6,
    slidesToScroll: 1,
    responsive: [
        {
        breakpoint: 1024,
        settings: {
        slidesToShow: 6,
        slidesToScroll: 1,
        infinite: true,
        dots: true
        }
        },
        {
        breakpoint: 600,
        settings: {
        slidesToShow: 4,
        slidesToScroll: 1
        }
        },
        {
        breakpoint: 480,
        settings: {
        slidesToShow: 1,
        slidesToScroll: 1
        }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});
// end slick slider
$(document).ready(function(){
    $('.ne-content .news-event-content p').addClass('ne-para');

// start program finder
    $("select#pf_programme").change(function(){
        var pf_programme_id = $("#pf_programme option:selected").val();
        $.ajax({
            url:"ajax/department_ajax.php",
            method:"post",
            data:{pf_programme_id:pf_programme_id},
            success:function(data){
                $('#pf_department').html(data);
            }
        });
    });
    $("select#pf_department").change(function(){
        var pf_programme_id = $("#pf_programme option:selected").val();
        var pf_department_id = $("#pf_department option:selected").val();
        $.ajax({
            url:"ajax/course_ajax.php",
            method:"post",
            data:{pf_programme_id:pf_programme_id,pf_department_id:pf_department_id},
            success:function(data){
                $('#pf_course').html(data);
            }
        });
    });
// end program finder



});

    $(window).on('load',function(){
        // $('#myModalEnqForm').modal('show');
        $('#myModalEnqForm').modal({
            backdrop:'static',
            keyboard:false,
            show:true
        });
    });

$(document).ready(function(){
        $(".enquform").click(function(){
            var name = $(".name").val();
            var mobile = $(".mobile").val();
            var email = $(".email").val();
            var course = $(".course").val();
            var message = $(".msg").val();
            if(name!== '' && mobile !== '' && email !== '' && course !== '' && message !== ''){
                // alert('hello');
                $('#myModalEnqForm').modal('hide');
                $.ajax({
                    url:"ajax/ajaxenqform.php",
                    method:"post",
                    data:{name:name,mobile:mobile,email:email,course:course,message:message},
                    dataType:"text",
                    success:function(data){
                        // if(data == true){
                                $('#thank-gen2').modal('show');
                        // }else{
                        //     alert("try again after some time");
                        // }
                        
                    }
                });
            }
            else{
                // if(confirm('All fields are mandatory')){
                //     window.location.reload();  
                // }
                alert("All fields are mandatory");
                // $(this).load("index.php");
                
                
            }     
        });

        $(".feedback").click(function(){
            var fname = $(".fname").val();
            var lname = $(".lname").val();
            var mobile = $(".mobile").val();
            var email = $(".email").val();
            var message = $(".msg").val();
            if(fname!== '' && lname!== '' && mobile !== '' && email !== '' && message !== ''){
                // alert('hello');
                // $('#myModalEnqForm').modal('hide');
                $.ajax({
                    url:"ajax/feedback_ajax.php",
                    method:"post",
                    data:{fname:fname,lname:lname,mobile:mobile,email:email,message:message},
                    dataType:"text",
                    success:function(data){
                        // if(data == true){
                                $('#thank-gen2').modal('show');
                                $(".fname").val('');
                                $(".lname").val('');
                                $(".mobile").val('');
                                $(".email").val('');
                                $(".msg").val('');
                                // alert('hi');
                        // }else{
                        //     alert("try again after some time");
                        // }
                        
                    }
                });
            }
            else{
                // if(confirm('All fields are mandatory')){
                //     window.location.reload();  
                // }
                alert("All fields are mandatory");
                // $(this).load("index.php");
                
                
            }     
        });

        $(".apply_now").click(function(){
            var name = $(".name_an").val();
            var mobile = $(".mobile_an").val();
            var email = $(".email_an").val();
            // var state = $(".state_an").val();
            // var city = $(".city_an").val();
            // var program = $(".program_an").val();
            var course = $(".course_an").val();
            var msg = $('.msg_an').val();
            // if(name != '' && mobile != '' && email != '' && state != '' && city != '' && program != '' && course != ''){
            if(name != '' && mobile != '' && email != '' && course != '' && msg !=''){
                // alert('hello');
                // $('#myModalEnqForm').modal('hide');
                $.ajax({
                    url:"ajax/apply_now_ajax.php",
                    method:"post",
                    // data:{name:name,mobile:mobile,email:email,state:state,city:city,program:program,course:course},
                    data:{name:name,mobile:mobile,email:email,course:course,msg:msg},
                    dataType:"text",
                    success:function(data){
                        // if(data == true){
                                $('#thank-gen2').modal('show');
                                $(".name_an").val('');
                                $(".mobile_an").val('');
                                $(".email_an").val('');
                                // $(".state_an").val('');
                                // $(".city_an").val('');
                                // $(".program_an").val('');
                                $(".course_an").val('');
                                $(".msg_an").val('');
                                // alert('hi');
                        // }else{
                        //     alert("try again after some time");
                        // }
                        
                    }
                });
            }
            else{
                // if(confirm('All fields are mandatory')){
                //     window.location.reload();  
                // }
                alert("All fields are mandatory");
                // $(this).load("index.php");
                
                
            }     
        });

        $(".lacmnt").click(function(){
            var name = $(".name_fc").val();
            var mobile = $(".mobile_fc").val();
            var email = $(".email_fc").val();
            var message = $(".msg_fc").val();
            if(name != '' && mobile != '' && email != '' && message != ''){
                // alert('hello');
                // $('#myModalEnqForm').modal('hide');
                $.ajax({
                    url:"ajax/comment_ajax.php",
                    method:"post",
                    data:{name:name,mobile:mobile,email:email,message:message},
                    dataType:"text",
                    success:function(data){
                        // if(data == true){
                                $('#thank-gen2').modal('show');
                                $(".name_fc").val('');
                                $(".mobile_fc").val('');
                                $(".email_fc").val('');
                                $(".msg_fc").val('');
                                // alert('hi');
                        // }else{
                        //     alert("try again after some time");
                        // }
                        
                    }
                });
            }
            else{
                // if(confirm('All fields are mandatory')){
                //     window.location.reload();  
                // }
                alert("All fields are mandatory");
                // $(this).load("index.php");
                
                
            }     
        });


        $(".subscribe_btn").click(function(){
            var email = $(".sub_email").val();
            if(email != ''){
                // alert('hello');
                // $('#myModalEnqForm').modal('hide');
                $.ajax({
                    url:"ajax/subscribe_ajax.php",
                    method:"post",
                    data:{email:email},
                    dataType:"text",
                    success:function(data){
                        // if(data == true){
                                $('#thank-gen2').modal('show');
                                $(".sub_email").val('');
                                // alert('hi');
                        // }else{
                        //     alert("try again after some time");
                        // }
                        
                    }
                });
            }
            else{
                // if(confirm('All fields are mandatory')){
                //     window.location.reload();  
                // }
                alert("All fields are mandatory");
                // $(this).load("index.php");
                
                
            }     
        });


        
        $(".btn-phdform").click(function(){
            var name = $(".phd_name").val();
            var mobile = $(".phd_mobile").val();
            var email = $(".phd_email").val();
            if(name!== '' && mobile !== '' && email !== ''){
                // alert('hello');
                $('#myModalPhdForm').modal('hide');
                $.ajax({
                    url:"ajax/phd_form_ajax.php",
                    method:"post",
                    data:{name:name,mobile:mobile,email:email},
                    dataType:"text",
                    success:function(data){
                        // if(data == true){
                                $('#thank-gen2').modal('show');
                                $(".phd_name").val('');
                                $(".phd_mobile").val('');
                                $(".phd_email").val('');
                        // }else{
                        //     alert("try again after some time");
                        // }
                        
                    }
                });
            }
            else{
                // if(confirm('All fields are mandatory')){
                //     window.location.reload();  
                // }
                alert("All fields are mandatory");
                // $(this).load("index.php");
                
                
            }     
        });
    });