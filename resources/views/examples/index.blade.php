<!DOCTYPE html>
<html>
<head>
    <title>Examples</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h2>Examples</h2>
        <a href="{{ route('examples.create') }}" class="btn btn-primary">Add New</a>
    </div>

    {{-- <a href="{{ route('examples.trash') }}" class="btn btn-warning mb-3">View Trash</a> --}}

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th width="200px">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($examples as $example)
            <tr>
                <td>{{ $example->id }}</td>
                <td>{{ $example->name }}</td>
                <td>
                    <a href="{{ route('examples.edit', $example->id) }}" class="btn btn-sm btn-success">Edit</a>
                    <form action="{{ route('examples.destroy', $example->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Move to trash?')">Trash</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
