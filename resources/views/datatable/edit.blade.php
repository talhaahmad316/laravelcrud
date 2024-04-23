<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4 p-4">
                    <div class="mb-3">
                        <a href="{{ route('student.index') }}" class="btn btn-primary mb-3">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>

                    <h3>Edit</h3>
                    <form action="{{ route('student.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Name" value="{{ $student->name }}">
                        </div>
                        @if ($errors->has('name'))
                            <p class="text-danger">{{ $errors->first('name') }}</p>
                        @endif
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="email" placeholder="Enter Email" value="{{ $student->email }}">
                        </div>
                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Phone</label>
                            <input type="tell" class="form-control @error('phone') is-invalid @enderror" id="exampleInputPassword1" name="phone"
                                placeholder="Enter Phone" value="{{ $student->phone }}">
                        </div>
                        @if ($errors->has('phone'))
                            <p class="text-danger">{{ $errors->first('phone') }}</p>
                        @endif
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Select Image</label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image">
                          </div>
                          @if ($errors->has('image'))
                            <p class="text-danger">{{ $errors->first('image') }}</p>
                        @endif
                        <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
