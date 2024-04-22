<!DOCTYPE html>
<html>
<head>
    <title>Upload Excel File</title>
</head>
<body>
    <h1>Upload Excel File</h1>

    <form action="{{ route('process.excel') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="excel_file" accept=".xlsx, .xls">
        <button type="submit">Upload</button>
    </form>
</body>
</html>
