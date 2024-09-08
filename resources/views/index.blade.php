<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('frontend/css/index.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <h1>Crud Operation Cotocus</h1>
    <img src="{{url('frontend/image/cotocus.jpg')}}" alt="">
    <a href="/deshboard"><button class="btn btn-primary ms-5">Dashboard</button></a>

    <form action="{{url('/user_submit')}}" method="POST" class="m-5 mt-0" enctype='multipart/form-data'>
    @csrf
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputName1" aria-describedby="NameHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Roll No.</label>
    <input type="text" name="roll_no" class="form-control" id="exampleInputRollNo.1" aria-describedby="RollNo.Help">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Phone number</label>
    <input type="number" name="phone_no" class="form-control" id="exampleInputPhoneNo.1" aria-describedby="PhoneNo.Help"> 
  </div>
  <div class="mb-3">
    <label for="exampleInputName" class="form-label">Image</label>
    <input type="file" name="image" class="form-control" id="exampleInputPhoneNo.1" aria-describedby="fileHelp"> 
  </div>



  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>