<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--    Bootstrap css--}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    {{--    Font Awesome--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            padding: 100px;
        }
    </style>
    <title>Index Page</title>
</head>
<body>
<div class="container">
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h5>Posts</h5>
        <a href="{{url('/posts/create')}}">
            <button class="btn btn-primary btn-sm float-right mb-2">
                <i class="fa fa-plus-circle"></i> Add new
            </button>
        </a>
    @if(Session('successAlert'))
        <div class="alert alert-success alert-dismissible show fade">
            <strong>{{ Session('successAlert')  }}</strong>
            <button class="close" data-dismiss="alert">&times</button>
        </div>
        @endif
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        <td>
                            <form action="{{ url('posts/'. $post->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ url('posts/'. $post->id .'/edit') }}">
                                    <Button type="button" class="btn btn-success btn-sm">
                                        <i class="fa fa-edit"></i>
                                        Edit
                                    </Button>
                                </a>
                                    <Button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to destroy?')">
                                        <i class="fa fa-trash"></i>
                                        Delete
                                    </Button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$posts->links()}}
    </div>
    <div class="col-md-2"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>
