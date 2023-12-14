<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
    <h1 class="mt-5">Blog Create</h1>
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form method="POST" action={{route('store')}} enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" class="form-control" id="" placeholder="Enter Name" name="blog_name" value="{{old('blog_name')}}" >
          @error('blog_name')
          <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" id="" placeholder="Enter Email" name="email"  value="{{old('email')}}" >
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
          <div class="form-group">
            <label for="">Description</label>
            <input type="text" class="form-control" id="" placeholder="Enter description" name="description" value="{{old('email')}}" >
          </div>
          <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control" id="" placeholder="Enter description" name="image" >
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
 </div>

</body>
</html>
