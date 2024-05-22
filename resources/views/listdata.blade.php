<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <title>IT-BRU-CRUD</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">IT-BRU-CRUD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="/showdata">ShowData</a>
                    <a class="nav-link" href="#">Features</a>
                    <a class="nav-link" href="#">Pricing</a>
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col-1">ID</th>
                    <th scope="col-2">Name</th>
                    <th scope="col-4">Email</th>
                    <th scope="col-3">Password</th>
                    <th scope="col-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td style="display: flex; gap:15px;">
                            

                            <form action="{{route('user.edit' , $user->id)}}" method="GET">
                                @csrf
                                @method('GET');
                                <button class="btn btn-warning">Edit</button>
                            </form>

                            <form action="{{ route('user.delete', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE');
                                <button class="btn btn-danger  del-btn">delete</button>
                            </form>

                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        @if (session('delete'))
            <div class="alert alert-danger mt-3" role="alert">
                {{ session('delete') }}
            </div>
        @endif
    </div>
</body>

<script>
    $(document).ready(function() {
        $('.del-btn').click(function(event) {
            event.preventDefault();
            var form = $(this).closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "It will be permanently deleted!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

</html>
