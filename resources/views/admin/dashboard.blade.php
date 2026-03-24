<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Luxury Control</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Archivo+Black&family=Inter:wght@400;700;900&display=swap'); */
        :root { --primary-blue: #2563eb; --pure-black: #000000; --soft-white: #f8fafc; }
        body { font-family: 'Inter', sans-serif; background: var(--soft-white); color: var(--pure-black); }
        .brutalist-title { font-family: 'Archivo Black', sans-serif; text-transform: uppercase; letter-spacing: -0.04em; }
        .premium-card { background: white; border: 3px solid var(--pure-black); box-shadow: 12px 12px 0px 0px var(--primary-blue); transition: 0.2s; }
        .sidebar-thick { border-right: 6px solid var(--pure-black); background: white; }
        .custom-table th { background: var(--pure-black); color: white; padding: 15px; font-weight: 900; text-transform: uppercase; font-size: 11px; }
        .custom-table td { padding: 20px; border-bottom: 3px solid var(--pure-black); font-weight: 700; }
        .btn-main { background: var(--primary-blue); color: white; border: 3px solid var(--pure-black); padding: 12px 24px; font-weight: 900; box-shadow: 6px 6px 0px 0px var(--pure-black); }
    </style>
</head>
<body class="flex min-h-screen">
    <aside class="w-72 sidebar-thick flex flex-col p-8">
        <div class="mb-16">
            <span class="text-2xl brutalist-title">Laundry</span><br>
            <span class="text-xs font-black text-blue-600 tracking-[0.4em] uppercase">Taghazout</span>
        </div>
        <nav class="flex flex-col gap-10">
            <a href="#" class="font-black uppercase text-sm border-b-4 border-blue-600 pb-1">Dashboard</a>
        </nav>
        <div class="mt-auto">
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button class="btn-main w-full bg-red-500">Logout</button>
            </form>
        </div>
    </aside>

    <main class="flex-1 p-12">
        <header class="flex justify-between items-start mb-12">
            <h1 class="text-4xl brutalist-title">Admin <span class="text-blue-600">Panel</span></h1>
            <div class="premium-card p-4 bg-white shadow-[6px_6px_0px_0px_#2563eb]">
                <p class="font-black text-xs uppercase">{{ now()->format('d F Y') }}</p>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            <div class="premium-card p-6 bg-blue-600 text-white shadow-[10px_10px_0px_0px_#000000]">
                <p class="text-[10px] font-black uppercase tracking-widest opacity-70">Revenue</p>
                <h3 class="text-4xl brutalist-title italic">${{ $reservations->sum('price') }}</h3>
            </div>
            <div class="premium-card p-6 bg-white shadow-[10px_10px_0px_0px_#2563eb]">
                <p class="text-[10px] font-black uppercase tracking-widest text-blue-600">Total Bookings</p>
                <h3 class="text-4xl brutalist-title">{{ $reservations->count() }}</h3>
            </div>
            <div class="premium-card p-6 bg-yellow-400 shadow-[10px_10px_0px_0px_#000000]">
                <p class="text-[10px] font-black uppercase tracking-widest">New Today</p>
                <h3 class="text-4xl brutalist-title">{{ $reservations->where('created_at', '>=', now()->startOfDay())->count() }}</h3>
            </div>
        </div>

        <section class="premium-card overflow-hidden">
            <table class="custom-table w-full">
                <thead>
                    <tr>
                        <th>Customer</th>
                        <th>Service</th>
                        <th>Schedule</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reservations as $res)
                    <tr>
                        <td class="text-blue-600">{{ $res->customer_name }}<br><span class="text-[20px] font-bold text-black italic lowercase">{{ $res->customer_email }}</span></td>
                        <td><span class="bg-slate-100 px-4 py-6 border border-black text-[15px]">{{ $res->service_name }}</span></td>
                        <td>{{ $res->pickup_date }}<br><span class="text-blue-600 text-xs italic">{{ $res->pickup_time }}</span></td>
                        <td class="text-xl">${{ $res->price }}</td>
                        <td>
                            <span class="flex items-center gap-2">
                                <span class="h-3 w-3 rounded-full bg-green-500 border border-black"></span>
                                <span class="text-[10px] font-black uppercase">PAID</span>
                            </span>
                        </td>
                        <td>
                            <a href="https://wa.me/{{ $res->customer_phone }}" target="_blank" class="bg-green-500 text-white border-2 border-black p-2 text-[10px] font-black">WhatsApp</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>