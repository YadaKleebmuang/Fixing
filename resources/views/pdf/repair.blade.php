<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายงานรายการซ่อมทั้งหมด</title>
    <style>
         @font-face {
        font-family: 'THSarabunNew';
        src: url('{{ public_path("fonts/THSarabunNew.ttf") }}') format('truetype');
        font-weight: normal;
        font-style: normal;
    }

    @font-face {
        font-family: 'THSarabunNew';
        src: url('{{ public_path("fonts/THSarabunNew-Bold.ttf") }}') format('truetype');
        font-weight: bold;
        font-style: normal;
    }

    body {
        font-family: 'THSarabunNew', sans-serif;
    }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>

    <h2 style="text-align: center;">รายงานรายการซ่อมทั้งหมด</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ลูกค้า</th>
                <th>รายละเอียดการซ่อม</th>
                <th>พนักงาน</th>
                <th>สถานะ</th>
                <th>วันที่แจ้งซ่อม</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($repairs as $index => $repair)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $repair->customer_id }}</td>
                    <td>{{ $repair->repair_detail }}</td>
                    <td>{{ $repair->employee_id ?? 'ยังไม่ระบุ' }}</td>
                    <td>{{ $repair->status }}</td>
                    <td>{{ \Carbon\Carbon::parse($repair->created_at)->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
