<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #0f172a; margin: 0; padding: 40px; }
        .border-box { border: 5px solid #0f172a; padding: 30px; position: relative; }
        .header { border-bottom: 5px solid #0f172a; padding-bottom: 20px; margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center; }
        .title { font-size: 32px; font-weight: 900; text-transform: uppercase; letter-spacing: -1px; }
        .logo { height: 60px; }
        .details-table { width: 100%; margin-top: 20px; border-collapse: collapse; }
        .details-table td { padding: 15px; border: 2px solid #0f172a; font-weight: bold; }
        .label { background: #0f172a; color: white; width: 30%; }
        .stamp { 
            position: absolute; bottom: 40px; right: 40px; 
            border: 4px solid #3b82f6; color: #3b82f6; 
            padding: 10px 20px; font-weight: 900; text-transform: uppercase;
            transform: rotate(-15deg); font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="border-box">
        <div class="header">
            <div class="title">Service Contract</div>
            <img class="logo" src="{{ asset('Image 2 (3).png') }}" alt="Logo">
        </div>

        <table class="details-table">
            <tr><td class="label">CLIENT</td><td>{{ $res->customer_name }}</td></tr>
            <tr><td class="label">SERVICE</td><td>{{ $res->service_name }}</td></tr>
            <tr><td class="label">PICKUP DATE</td><td>{{ $res->pickup_date }}</td></tr>
            <tr><td class="label">PICKUP TIME</td><td>{{ $res->pickup_time }}</td></tr>
            <tr><td class="label">AMOUNT PAID</td><td>${{ $res->price }} USD</td></tr>
        </table>

        <div class="stamp">Verified Paid</div>

        <div style="margin-top: 40px; font-size: 10px; font-weight: bold; text-transform: uppercase;">
            Taghazout Wash - Door to Door Service
        </div>
    </div>
</body>
</html>