<div class="fixed top-0 inset-x-0 z-50 bg-white border-b-2 border-blue-600 px-6">
    <nav class="max-w-7xl mx-auto h-20 flex justify-between items-center">
        
        <a href="/" class="flex items-center gap-4 cursor-pointer group">
            <div class="relative w-14 h-14 overflow-hidden border-2 border-slate-900 shadow-[4px_4px_0px_0px_rgba(37,99,235,1)] transition-all duration-300 group-hover:-rotate-6 group-hover:shadow-none group-hover:translate-x-[2px] group-hover:translate-y-[2px]">
                <div class="absolute inset-0 group-hover:bg-blue-600/0 transition-colors z-10"></div>
                
                <img src="{{ asset('logo.jpeg') }}" 
                     alt="Laundry Taghazout Logo" 
                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 relative z-0">
            </div>

            <div class="flex flex-col leading-none">
                <span class="text-2xl font-[1000] uppercase tracking-tighter text-slate-900">Taghazout</span>
                <span class="text-xs font-bold text-blue-600 uppercase tracking-[0.3em] -mt-0.5">Laundry</span>
            </div>
        </a>

        <div class="hidden md:flex items-center gap-12">
            <a href="/" class="text-xs font-black uppercase tracking-widest text-slate-900 border-b-2 border-transparent hover:border-blue-600 transition-all py-1">Home</a>
            <a href="#services" class="text-xs font-black uppercase tracking-widest text-slate-900 border-b-2 border-transparent hover:border-blue-600 transition-all py-1">Services</a>
            
            
            <a href="#booking" class="text-xs font-black uppercase tracking-widest text-slate-900 border-b-2 border-transparent hover:border-blue-600 transition-all py-1">Book</a>     
            
            <a href="#contact" class="text-xs font-black uppercase tracking-widest text-slate-900 border-b-2 border-transparent hover:border-blue-600 transition-all py-1">Contact</a>

            <a href="#reviews" class="text-xs font-black uppercase tracking-widest text-slate-900 border-b-2 border-transparent hover:border-blue-600 transition-all py-1">Reviews</a>
        </div>

        <div class="flex items-center gap-6">
            <div class="hidden sm:flex items-center gap-2 font-black text-[10px] uppercase">
                <span class="text-blue-600">EN</span>
            </div>

            <a href="#booking" class="bg-slate-900 text-white px-8 py-3 font-black text-xs uppercase tracking-[0.2em] hover:bg-blue-600 transition-colors shadow-[4px_4px_0px_0px_rgba(37,99,235,1)] hover:shadow-none hover:translate-x-[2px] hover:translate-y-[2px]">
                Book Now
            </a>
        </div>
    </nav>
</div>