<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>รายงานงานซ่อม</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">รายงานงานซ่อม</h2>

    <table>
        <thead>
            <tr>
                <th>ชื่อผู้แจ้ง</th>
                <th>อุปกรณ์</th>
                <th>ปัญหา</th>
                <th>สถานะ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($repairs as $repair)
                <tr>
                    <td>{{ $repair->user_name }}</td>
                    <td>{{ $repair->equipment }}</td>
                    <td>{{ $repair->description }}</td>
                    <td>
                        @if($repair->status == 'pending')
                            รอดำเนินการ
                        @elseif($repair->status == 'in progress')
                            กำลังดำเนินการ
                        @elseif($repair->status == 'completed')
                            เสร็จสิ้น
                        @else
                            สถานะไม่ถูกต้อง
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>