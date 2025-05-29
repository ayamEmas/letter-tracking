<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Document Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .department {
            margin-bottom: 20px;
            page-break-inside: avoid;
        }
        .department-header {
            background-color: #f3f4f6;
            padding: 10px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f3f4f6;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Document Report</h1>
        <p>Generated on: {{ now()->format('F d, Y') }}</p>
    </div>

    @foreach($letters as $departmentName => $departmentLetters)
        <div class="department">
            <div class="department-header">
                {{ $departmentName }} ({{ $departmentLetters->count() }} documents)
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Document Type</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departmentLetters as $letter)
                        <tr>
                            <td>{{ $letter->title }}</td>
                            <td>{{ $letter->date->format('d M Y') }}</td>
                            <td>{{ $letter->from }}</td>
                            <td>{{ $letter->to }}</td>
                            <td>{{ $letter->document_type }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach

    <div class="footer">
        <p>This report was generated from the Document Management System</p>
    </div>
</body>
</html> 