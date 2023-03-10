<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js"></script>
    <title>Todolist App</title>
</head>
<body>
    <div class="container w-25 mt-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3>To Do List</h3>
                <form action="/store" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="content" class="form-control" placeholder="Add To Do">
                        <button type="submit" class="btn btn-dark btn-sm px-4"><i class="fa fa-plus"></i></button>
                    </div>
                </form>
                {{-- if tast exist count --}}
                @if (count($todolists))
                    <ul class="list-group list-group-flush mt-3">
                        @foreach ($todolists as $todolist)
                            <li class="list-group-item">
                                <form action="/delete/{{$todolist->id}}" method="post">
                                    {{$todolist->content}}
                                    @csrf
                                    @method('delete')
                                <button type="submit" style="float:right;" class="btn btn-link btn-sm"><i class="fa fa-trash"></i></button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                    @else
                    <p class="text-center mt-3">No Tasks!</p>
                @endif
            </div>
            @if (count($todolists))
                <div class="card-footer">
                    You Have {{count($todolists)}} Pending Tasks
                </div>

            @endif
        </div>
    </div>
</body>
</html>