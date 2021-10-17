<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task APp</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
</head>
<body>

<div class="container"> 
<div class="text-center">
   <h1>Daily Task App </h1>
   <div class="row">
       <div class="col-md-12">
        
       <!-- validation error show to user -->
       @foreach($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
         {{$error}} <!--print error object-->
        </div> 
       @endforeach
        <!-- if error occure the loop not exit -->

       <!-- savetask route -->
       <form method="post" action="/savetask">
        {{csrf_field()}} <!-- must for all forms-->
        <input type="text" class="form-control" name="task" placeholder="enter task">
        <br>
        <input type="submit" class="btn btn-primary" value="Save">
        <input type="button" class="btn btn-warning" value="clear">
        </form> 

        <br><br>
        <table class="table table-dark">
        <th>ID</th>
        <th>Task</th>
        <th>Completed</th>
        <th>Action</th>
        <th>Delete</th>
        <th>Update</th>
        
        <!-- dummy data row -- and again show db table data after every insertins -->
        @foreach($tasks1 as $task) <!--take view variable as task -->
        <tr>
            <td>{{$task->id}}</td> <!-- task variable db value -->
            <td>{{$task->task}}</td>
            
            <!-- show iscompleted as buttons -->
            <td>
            @if($task->iscompleted)
            <button class="btn btn-success">Completed</button>
            @else
            <button class="btn btn-danger">not Completed</button>
            @endif
            </td>
            <td>
            @if(!$task->iscompleted)
            <a href="/markascompleted/{{$task->id}}" class="btn btn-primary">Mark as completed</a>
            @else
            <a href="/markasnotcompleted/{{$task->id}}" class="btn btn-warning">Mark as not completed</a>
            @endif
            </td>
            <td>
            <a href="/deletetask/{{$task->id}}" class="btn btn-warning">Delete</a>
            </td>
            <td>
            <a href="/updatetask/{{$task->id}}" class="btn btn-success">Update</a>
            </td>
        </tr> <!--dummy row end -->
        @endforeach
        </table>   

        </div> 

   </div>
</div>
</div>

    
</body>
</html>