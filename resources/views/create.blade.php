<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>TODO | Create</title>

    <style>
        .create-form {
            height: 50vh;
            /* background:red; */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .header {
            margin: 30px auto;
        }

        label {
            text-align: right !important;
        }

        .form-group input {
            margin: 18px auto;
        }

        .form-group.date {
            margin: 5px;
        }
    </style>
</head>

<body style="text-align:center">
    <h1 class="header">Create Task</h1>
    <h3>
        <x-alert />
    </h3>

    <form class="create-form" action="/upload" method="post">
        @csrf
        <div class="form-group col-3">
            <label for="inputtesk">Task Name</label>
            <input name="task_name" type="text" class="form-control" id="inputtesk" placeholder="task ..." required>
        </div>
        <div class="form-group col-3">
            <label for="inputPriority">Priority</label>
            <select name="priority" id="inputPriority" class="form-control" required>
                {{-- <option selected>Choose...</option> --}}
                <option value=1>high</option>
                <option value=2>medium</option>
                <option value=3>low</option>
            </select>
        </div>
        <div class="duration d-flex justify-content-between col-3 ">
            <div class="form-group date col-md-5">
                <label for="start_date">Start Date</label>
                <input name="start_date" type="date" class="form-control" id="inputstart_date" required>
            </div>
            <div class="form-group date col-md-5">
                <label for="inputend_date">End Date</label>
                <input name="end_date" type="date" class="form-control" id="inputend_date" required>
            </div>
        </div>

        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>

    <a href="/">Back</a>
</body>

</html>
