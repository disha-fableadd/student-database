

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Data</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* background-color: #f0f2f5;  */
            font-family: 'Roboto', sans-serif; 
        }
        h2 {
            margin-top: 20px;
            margin-bottom: 20px;
            color: #333; 
        }
     
        a {
            color: white;
            text-decoration: none; 
        }
        .table th, .table td {
            /* vertical-align: middle;  */
            padding: 15px; 
        }
        .table thead {
            background-color:#d1e7fd; 
            color: black; 
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #e9ecef; 
        }
        .table-striped tbody tr:hover {
            background-color: aliceblue; 
        }
        .btn {
            margin: 5px;
        }
        .text-center {
            color: #007bff;
        }
   
        .container-fluid {
    width: 100%;
    padding-right: 80px;
    padding-left: 80px;
    margin-right: auto;
    margin-left: auto;
}
    </style>
</head>
<body>
<div class="container-fluid">


<h2 class="text-center">All Student Details</h2>
    <div class="text-center mb-4">
        <a href="{{ route('student.create') }}" class="btn btn-success">Add Student Data</a>
    </div>

    
    <table class="table  table-striped table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>FULLNAME</th>
                <th>EMAIL</th>
                <th>CONTACT</th>
                <th>COURSE</th>
                <th>GENDER</th>
                <th>ADDRESS</th>
                <th>HOBBIES</th>
                
                <th>PROFILE</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->fname }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->contact }}</td>
                    <td>{{ $student->course }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->hobbies ?? 'N/A' }}</td>
                   
                    <td>
                        @if ($student->image)
                            <img src="{{ asset('storage/' . $student->image) }}" alt="Profile Image" width="100" height="100">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-warning">Edit</a>

                    </td>
                    <td>
                        <form action="{{ route('student.destroy', $student->id) }}" method="POST" onsubmit="return confirmDelete();">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                   
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="12">No Records Found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    </div>

</body>
<script>
    function confirmdelete() {
        return confirm("Are you sure you want to delete this record?");
    }
</script>
</html>
