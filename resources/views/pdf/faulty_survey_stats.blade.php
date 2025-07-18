<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Faulty Survey Statistics</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            table,
            th,
            td {
                border: 1px solid black;
            }

            th,
            td {
                padding: 8px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
            }

            .header {
                text-align: center;
                margin-bottom: 20px;
            }
        </style>
    </head>

    <body>
        <div class="header">
            <h2>Faulty Survey Statistics</h2>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Survey Type</th>
                    <th>Category</th>
                    <th>Question Text</th>
                    <th>Option</th>
                    <th>Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($exportData as $row)
                    <tr>
                        <td>
                            {{ is_array($row[0]) ? implode(', ', $row[0]) : $row[0] }}
                        </td>
                        <td>
                            {{ is_array($row[1]) ? implode(', ', $row[1]) : $row[1] }}
                        </td>
                        <td>
                            {{ is_array($row[2]) ? implode(', ', $row[2]) : $row[2] }}
                        </td>
                        <td>
                            {{ is_array($row[3]) ? implode(', ', $row[3]) : $row[3] }}
                        </td>
                        <td>
                            {{ is_array($row[4]) ? implode(', ', $row[4]) : $row[4] }}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </body>

</html>