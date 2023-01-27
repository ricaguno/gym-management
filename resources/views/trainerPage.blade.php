<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>


<!-- Modal -->
<div class="modal fade" id="addTrainer" tabindex="-1" aria-labelledby="addTrainer" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTrainer">Add New Member</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="card py-5 px-12 mt-3">
            <form method="POST" action="{{ route('store') }}">
                @csrf
                <div class="col-11 mb-3 p-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="col-11 mb-3 p-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
               <!-- hard coded drop down for Mem type -->
                <div class="col-9 p-2">
                    <div class="form-group">
                      <label for="specialization">Specialization</label>
                      <select id="specialization" name="specialization" class="form-control custom-select">
                        <option value="Yoga Specialization">Yoga Specialization</option>
                        <option value="Strength & Conditioning Specialization">Strength & Conditioning Specialization</option>
                        <option value="Corrective Exercise Specialization">Corrective Exercise Specialization</option>
                        <option value="Weight Management Specialization">Weight Management Specialization</option>
                        <span class="icon-down" style="color:black;"></span>
                      </select>
                    </div>
                    <script>
                      var select = document.getElementById("specialization");
                    var selectedValue = select.options[select.selectedIndex].value;
                    console.log(selectedValue);
                    </script>
                </div>
                <div class="col-11 mb-3 p-2">
                <label for="phone">Phone number:</label>
                    <input type="number" id="phone" name="phone" required>
                </div>
                <button type="submit" class="btn btn-primary ms-2">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card rounded shadow mb-2">
  <div class="card-body">
    
    <div class="container p-5 m-5">
        @if (session('success'))
            <div class="alert alert-success my-3" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('memberPage') }}" class="btn btn-light btn-sm">Go to Members Page</a>
        <h1 class="fw-bold">Trainer List</h1>
        <table class="table mt-3">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Specialization</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            @foreach($trainers as $trainer)
                <tr>
                    <td>{{ $trainer->id }}</td>
                    <td>{{ $trainer->name }}</td>
                    <td>{{ $trainer->email }}</td>
                    <td>{{ $trainer->specialization }}</td>
                    <td>{{ $trainer->phone }}</td>
                    <th>
                    <a class="btn btn-sm btn-danger" href="{{ route('destroy', $trainer->id) }}">Delete</a>
                    <a class="btn btn-sm btn-primary" href="{{ route('edit', $trainer->id) }}">Edit</a>
                    </th>
                    <td>
                </tr>
                @endforeach
            <tr>
            </tr>
        </table>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTrainer">
  Add Trainer
</button>
    </div>
    </div>
    </div>
    

    

    
       
    
</body>
</html>