  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <title>update task</title>
  </head>
  <body>
      
<!-- validation error show to user -->
@foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
         {{$error}} <!--print error object-->
        </div> 
       @endforeach
        <!-- if error occure the loop not exit -->


  <div class="container" >
      <br><br><br>
   <form action="/updatetasknew" method="post" align="center">
    {{csrf_field()}}
   <input type="text" class="form-control" name="task" value="{{$taskdata->task}}"/>
    <input type="hidden" name="id" value="{{$taskdata->id}}">
    <br><input type="submit" class="btn btn-warning" value="update"/>
    &nbsp;&nbsp;
    <a href="/task" class="btn btn-success">Cancel</a>
   </form>
  

 </div>

 </body>
  </html>