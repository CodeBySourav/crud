<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{url('frontend/css/index.css')}}">
    <script type="text/javascript" src="{{url('frontend/js/jquery.js')}}" ></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body class="m-5">
    <div id="error-message" class="messages"></div>
    <div id="success-message" class="messages"></div>
    @if(session()->has('message'))
            <script>
                alartmessage('new data created',true);
                function alartmessage(message,status){
                    if(status == true){
                    $("#success-message").html(message).slideDown();
                    $("#error-message").slideUp();
                    setTimeout(function(){
                        $("#success-message").slideUp();
                    },4000);

                    }else if(status == false){
                    $("#error-message").html(message).slideDown();
                    $("#success-message").slideUp();
                    setTimeout(function(){
                        $("#error-message").slideUp();
                    },4000);
                    }
                }
                
            </script>
        {{-- {{ session()->get('message') }} --}}
@endif

{{-- <div id="showmessage" class="alert alert-success"></div> --}}
    <h1>Dashboard</h1>
    <a href="/index"><button class="btn btn-primary">User Submit</button></a>

    <table class="table">
    <thead>
        <tr>
            <th>name</th>
            <th>Roll no</th>
            <th>Phone no</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>

        </tr>
    </thead>
    <tbody id="table-data">
        
    </tbody>
</table>
<!-- Popup Model Box For Update the Reccord    -->
<div id="modal">
    <div id="modal-form">
        <h2>Updata Form</h2>
        <form action="" id="edit-form">
            <table cellpadding="10px" Width="100%">
                <tr>
                    <td width="90px">Name</td>
                    <td><input type="text"  value="" name="name" id="name">
                         <input type="text" value="" name="id" id="id" hidden="">
                    </td>        
                    <tr><td>Roll No</td>
                        <td><input type="text" name="roll_no" value="" id="roll_no"></td>
                    </tr>
                    <tr><td>phone no</td>
                        <td><input type="text" name="phone no" value="" id="phone_no"></td> 
                    </tr>
                    <td><input type="submit"  id="edit-submit"  value="Update"></td>
                </tr>
            </table>
        </form>
        <div id="close-btn">X</div>
    </div>
</div>
</body>
<script> 

//show all data 
$(document).ready(function(){
    $.ajax({
        url :"load_all_data",
        type:"GET",
        success:function(data){

            $('#table-data').html(data);

        }
    });
});

$(document).on('click','#delete-button',function(){
                if(confirm("Do you really want to delete this record?")){
                    var userdelete = $(this).data('userdelete-id');
                    var $forfade = this;

                $.ajax({
                    url : userdelete,
                    type : "GET",
                    success : function(data){
                        if(data == 1){
                           alartmessage('successfully deleted data',true);
                        $($forfade).closest("tr").fadeOut();
                        }
                        else{
                            alert("no delete");
                        }
                    }
                });
            };
          });

          

          $(document).ready(function(){
            // $("#load-button").on("click",function(e){
                $(document).on('click','#edit-button', function () { 
                var userupdate = $(this).data('userupdate-id');

                $.ajax({
                    url : userupdate,
                    type : "GET",
                    success : function(data){
                        $('#id').val(data.id);
                        $('#name').val(data.name); 
                        $('#roll_no').val(data.rollno);  
                        $('#phone_no').val(data.phone_no);
                        //Show in Modal Box 
                        $("#modal").show();
                    }
                });
            }); 
        });

        $("#close-btn").on("click",function(){
        $("#modal").hide(); 
        });

        $('body').on('click','#edit-submit',function(e){
            e.preventDefault();
            var stiId = $('#id').val(); 
            var name = $('#name').val();
            var roll_no = $('#roll_no').val();
            var phone_no = $('#phone_no').val();


            $.ajax({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                url : 'update_user_data' ,
                type : "POST",
                data : {id: stiId, uname: name, uroll_no: roll_no, uphone_no: phone_no,}, 
                success : function(data){
                    if(data == 1){

                        $("#modal").hide();
                        alartmessage('successfully data updated',true);
                        location.reload();
                        
                    }
                }
            });

});
function alartmessage(message,status){
    if(status == true){
      $("#success-message").html(message).slideDown();
      $("#error-message").slideUp();
      setTimeout(function(){
        $("#success-message").slideUp();
      },4000);

    }else if(status == false){
      $("#error-message").html(message).slideDown();
      $("#success-message").slideUp();
      setTimeout(function(){
        $("#error-message").slideUp();
      },4000);
    }
  }
</script>
</html>