<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>TODO | Create</title>

    <style>

        .projetct-form{
            height:20vh;
            /* background:red; */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .project-list{
            margin:0 auto;
            min-height: 200px !important;
        }
        .project-list li{
            list-style: none;
            width:100%;
          
            display:flex;
            justify-content:space-between;
            margin:8px auto;
            padding-left:0 !important;
        }
        .header{
            margin:30px auto;
        }
        label{
            text-align: right !important;
        }
        .form-group input{
            margin:18px auto;
        }
        .form-group.date{
            margin:5px;
        }
    </style>
</head>
<body style="text-align:center">
    <h1 class="header">Create Task</h1>
    <h3>
        <x-alert />
    </h3>

    <form class="projetct-form" action="/createProject" method="post">
        @csrf
          <div class="form-group col-3">
            <label for="inputproject">New project</label>
            <input name="project_name" type="text" class="form-control" id="inputtesk" placeholder="project ..." required>
          </div>
    
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

    <h3>Select project below</h3>
    <ul class="project-list col-3">

        @if (count($projects) == 0)
            <p>There is no available project, Please create one</p>
        @else
            @foreach ($projects as $project)
        
            <li>
                <span>{{ $project['project_name'] }}</span>
            
                <a href="{{ route('addToProject', ['project_id' => $project['id'], 'task_id' => $id]) }}">Add to this project</a>
            </li>
            @endforeach
        @endif
       
     </ul>

      <a href="/">Back</a>
</body>
</html>