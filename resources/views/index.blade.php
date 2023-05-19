<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('assets/css/main.css') }}>

    <!-- Styles -->
    <style>
        #Layer_1 {
            margin-left: 20px;
            width: 30px;
            padding: 6px;
            border-radius: 2px;
            background: red;
            fill: white;
        }
    </style>
</head>

<body class="antialiased">
    <div class="App">
        <header>
            <div class="wrapper">
                <h1>
                    Task Management
                </h1>
            </div>
            {{-- <h3>
              <x-alert />
            </h3> --}}
        </header>
        <section class="add-section">
            <div class="wrapper">
                <select class="form-select" id="select-project" style="width:30%" aria-label="Default select example"
                    onchange="filterServices()">
                    <option value='all' selected>All Projects</option>
                    @if (count($projects) !== 0)
                        @foreach ($projects as $project)
                            <option value="{{ $project['project_name'] }}">{{ $project['project_name'] }}</option>
                        @endforeach
                    @endif

                </select>
                <a href="/create" class="btn btn-primary"> <span style="font-size: 20px; margin-right:10px">+</span> Add
                    Task</a>
            </div>
        </section>

        <div class="contents wrapper">
            <div class="content-list">
                @foreach ($tasks as $task)
                    <div class='task' draggable='true'>
                        <div class='task__tags'>

                            @if ($task['priority'] == 1)
                                <span class='task__tag task__priority--high'>high</span>
                            @elseif($task['priority'] == 2)
                                <span class='task__tag task__priority--medium'>medium</span>
                            @else
                                <span class='task__tag task__priority--low'>low</span>
                            @endif
                            <div class="icons">
                                <a href="{{ asset('/' . $task->id . '/edit') }}">Edit</a>


                                <a href="{{ asset('/' . $task->id . '/delete') }}"><svg id="Layer_1"
                                        data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 105.16 122.88">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill-rule: evenodd;
                                                }
                                            </style>
                                        </defs>
                                        <title>delete</title>
                                        <path class="cls-1"
                                            d="M11.17,37.16H94.65a8.4,8.4,0,0,1,2,.16,5.93,5.93,0,0,1,2.88,1.56,5.43,5.43,0,0,1,1.64,3.34,7.65,7.65,0,0,1-.06,1.44L94,117.31v0l0,.13,0,.28v0a7.06,7.06,0,0,1-.2.9v0l0,.06v0a5.89,5.89,0,0,1-5.47,4.07H17.32a6.17,6.17,0,0,1-1.25-.19,6.17,6.17,0,0,1-1.16-.48h0a6.18,6.18,0,0,1-3.08-4.88l-7-73.49a7.69,7.69,0,0,1-.06-1.66,5.37,5.37,0,0,1,1.63-3.29,6,6,0,0,1,3-1.58,8.94,8.94,0,0,1,1.79-.13ZM5.65,8.8H37.12V6h0a2.44,2.44,0,0,1,0-.27,6,6,0,0,1,1.76-4h0A6,6,0,0,1,43.09,0H62.46l.3,0a6,6,0,0,1,5.7,6V6h0V8.8h32l.39,0a4.7,4.7,0,0,1,4.31,4.43c0,.18,0,.32,0,.5v9.86a2.59,2.59,0,0,1-2.59,2.59H2.59A2.59,2.59,0,0,1,0,23.62V13.53H0a1.56,1.56,0,0,1,0-.31v0A4.72,4.72,0,0,1,3.88,8.88,10.4,10.4,0,0,1,5.65,8.8Zm42.1,52.7a4.77,4.77,0,0,1,9.49,0v37a4.77,4.77,0,0,1-9.49,0v-37Zm23.73-.2a4.58,4.58,0,0,1,5-4.06,4.47,4.47,0,0,1,4.51,4.46l-2,37a4.57,4.57,0,0,1-5,4.06,4.47,4.47,0,0,1-4.51-4.46l2-37ZM25,61.7a4.46,4.46,0,0,1,4.5-4.46,4.58,4.58,0,0,1,5,4.06l2,37a4.47,4.47,0,0,1-4.51,4.46,4.57,4.57,0,0,1-5-4.06l-2-37Z" />
                                    </svg></a>
                            </div>
                        </div>
                        <p>{{ $task['task_name'] }}</p>
                        <div class='task__stats d-flex justify-content-between'>
                            <div class="duration">
                                <span> Start : {{ $task['start_date'] }}</span>
                                <span> End : {{ $task['end_date'] }}</span>
                            </div>
                            @if ($task['project_name'] == null)
                                <a class="project-name" href="{{ asset('/' . $task->id . '/project') }}">add to
                                    project</a>
                            @else
                                <span class="project-name">{{ $task['project_name'] }}</span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script src={{ asset('assets/js/main.js') }}></script>
</body>

</html>
