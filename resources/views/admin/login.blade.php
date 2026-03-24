<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
        <link rel="icon" type="image/png" href="{{ asset('Image 2 (3).png') }}">

    <title>Login | Taghazout Laundry</title>
</head>
<body class="bg-slate-50 font-sans min-h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full">
        <div class="mb-8 text-center">
            <a href="/" class="inline-block">
                <div class="bg-slate-900 text-white px-4 py-2 border-2 border-slate-900 shadow-[4px_4px_0px_0px_rgba(37,99,235,1)]">
                    <span class="font-[1000] uppercase tracking-tighter text-xl">
                        Taghazout <span class="text-blue-500 italic">Laundry</span>
                    </span>
                </div>
            </a>
        </div>
          @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif

        <div class="bg-white border-4 border-slate-900 p-8 shadow-[12px_12px_0px_0px_rgba(15,23,42,1)]">
            <div class="mb-10 items-center">
                <h1 class="text-4xl font-[1000] uppercase tracking-tighter leading-none mb-2">
                    Welcome <br><span class="text-blue-600">Back.</span>
                </h1>
                <p class="text-slate-500 font-bold text-xs uppercase tracking-widest">
                    Login to manage your laundry orders
                </p>
            </div>

            <!-- Display errors -->
            @if($errors->any())
                <div class="mb-4 text-red-600 font-bold text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- Form -->
            <form 
            action="{{ route('admin.login.submit') }}" 
            
            method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block font-black uppercase text-[10px] tracking-[0.2em] mb-2">Email Address</label>
                    <input type="email" name="email" placeholder="YOU@EXAMPLE.COM" 
                        class="w-full bg-slate-50 border-2 border-slate-900 p-4 font-bold text-sm focus:outline-none focus:bg-white focus:shadow-[4px_4px_0px_0px_rgba(37,99,235,1)] transition-all placeholder:opacity-30" 
                        required>
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="block font-black uppercase text-[10px] tracking-[0.2em]">Password</label>
                        <a href="#" class="text-[9px] font-black uppercase text-blue-600 hover:underline">Forgot?</a>
                    </div>
                    <input type="password" name="password" placeholder="••••••••" 
                        class="w-full bg-slate-50 border-2 border-slate-900 p-4 font-bold text-sm focus:outline-none focus:bg-white focus:shadow-[4px_4px_0px_0px_rgba(37,99,235,1)] transition-all placeholder:opacity-30" 
                        required>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 border-2 border-slate-900 rounded-none accent-blue-600">
                    <label for="remember" class="ml-2 font-black uppercase text-[10px] tracking-widest cursor-pointer select-none">Stay Logged In</label>
                </div>

                <button type="submit" 
                    class="w-full bg-blue-600 text-white font-[1000] uppercase tracking-[0.2em] py-5 border-2 border-slate-900 shadow-[6px_6px_0px_0px_rgba(15,23,42,1)] hover:shadow-none hover:translate-x-1 hover:translate-y-1 transition-all">
                    login now
                </button>
            </form>

        </div>
    </div>

</body>
</html>