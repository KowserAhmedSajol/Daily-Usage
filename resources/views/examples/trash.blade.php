<!DOCTYPE html>
<html>
<head>
    <title>Trash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h2>Trash</h2>
        <a href="{{ route('examples.index') }}" class="btn btn-secondary">Back</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th width="250px">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($examples as $example)
            <tr>
                <td>{{ $example->id }}</td>
                <td>{{ $example->name }}</td>
                <td>
                    <a href="{{ route('examples.restore', $example->id) }}" class="btn btn-sm btn-success">Restore</a>

                    <form action="{{ route('examples.forceDelete', $example->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete permanently?')">Delete Forever</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
