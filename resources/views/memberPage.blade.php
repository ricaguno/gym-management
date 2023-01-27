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
<div class="modal fade" id="addMember" tabindex="-1" aria-labelledby="addMember" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addMember">Add New Member</h5>
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
                      <label for="membership_type">Membership Type</label>
                      <select id="membership_type" name="membership_type" class="form-control custom-select">
                        <option value="1">A - 1000</option>
                        <option value="2">B - 700</option>
                        <option value="3">C - 400</option>
                        <span class="icon-down"></span>
                      </select>
                    </div>
                    <script>
                      var select = document.getElementById("membership_type");
                    var selectedValue = select.options[select.selectedIndex].value;
                    console.log(selectedValue);
                    </script>
                </div>
                <div class="col-11 mb-3 p-2">
                <label for="trainer_id">Trainer:</label>
                    <input type="number" id="trainer_id" name="trainer_id" required>
                </div>
                <div class="col-11 mb-3 p-2">
                <label for="membership_expiration">Membership Expiration:</label>
                    <input type="date" id="membership_expiration" name="membership_expiration" required>
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
        <a href="{{ route('trainerPage') }}" class="btn btn-light btn-sm">Trainer List</a>
        <h1 class="fw-bold">Member List</h1>
        <table class="table mt-3">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Membership Type</th>
                <th>Membership Expiration</th>
                <th>Trainer</th>
                <th>Actions</th>
            </tr>
            @foreach($members as $member)
                <tr>
                    <td>{{ $member->id }}</td>
                    <td>{{ $member->name }}</td>
                    <td>{{ $member->email }}</td>
                    <td>{{ $member->membership->membership_type }}</td>
                    <td>{{ $member->membership_expiration }}</td>
                    <td>{{ $member->trainer->name }}</td>
                    <th>
                    <a class="btn btn-sm btn-danger" href="{{ route('destroy', $member->id) }}">Delete</a>
                    <a class="btn btn-sm btn-primary" href="{{ route('edit', $member->id) }}">Edit</a>
                    </th>
                    <td>
                </tr>
                @endforeach
            <tr>
            </tr>
        </table>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMember">
  Add Member
</button>
    </div>
    </div>
    </div>
    

    

    
       
    
</body>
</html>