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
    <title>Edit Form</title>
</head>

<body>
    <form action="{{route('user.update' , $user->id)}}" method="POST" id="updateForm">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <input type="text" class="form-control" name="name" placeholder="Enter Name" style="width: 400px"
                value="{{ $user->name }}">
        </div>
        <div class="mb-3">
            <input type="email" class="form-control" name="email" placeholder="Enter Email" style="width: 400px"
                value="{{ $user->email }}">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" name="password" placeholder="Enter Password"
                style="width: 400px" value="{{ $user->password }}">
        </div>

        <button type="submit" id="updatebtn" class="btn btn-primary    up-btn ">Update</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#updatebtn').click(function() {
                var form = $('#updateForm');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "It will be permanently updated!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, update it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire({
                            title: 'Loading...',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            willOpen: () => {
                                Swal.showLoading();
                            }
                        });
                        setTimeout(function() {
                            form.submit();
                        }, 5000);
                    }
                });
            });

            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            @endif
        });
    </script>
</body>

</html>
