<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <div class="container p-5 m-5">
        <h1 class="fw-bold">Trainer</h1>
        <p>Edit trainer information</p>
        <a href="{{ route('trainerPage') }}" class="btn btn-light btn-sm">← Go back</a>
        <div class="card py-5 px-4 mt-3">
            <form method="POST" action="{{ route('update') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Trainer name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $trainer->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $trainer->email }}" required>
                </div>
                <!-- hard coded drop down for Mem type -->
                <div class="col-9 p-2">
                    <div class="form-group">
                      <label for="specialization">Specialization</label>
                      <select id="specialization" name="specialization" class="form-control custom-select" value="{{ $trainer->specialization }}">
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
                <div class="mb-3">
                    <label for="phone">Phone Number:</label>
                    <input type="number" id="phone" name="phone" value="{{ $trainer->phone }}" required>
                    <input type="hidden" name="id" value="{{ $trainer->id }}">
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

</body>

</html>