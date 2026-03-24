<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}&currency=USD"></script>

<section id="booking" class="py-24 bg-slate-50 font-sans min-h-screen">
    <div class="max-w-7xl mx-auto px-6">
        
        <div id="lux-toast" class="fixed bottom-10 right-10 z-[100] transform translate-y-20 opacity-0 transition-all duration-500 pointer-events-none">
            <div class="bg-white border-[3px] border-slate-900 p-6 shadow-[10px_10px_0px_0px_rgba(59,130,246,1)] flex items-center gap-4 min-w-[320px]">
                <div id="toast-icon-container" class="flex-shrink-0 w-10 h-10 bg-slate-900 flex items-center justify-center">
                    <span class="h-3 w-3 rounded-full bg-blue-500 animate-ping"></span>
                </div>
                <div>
                    <p id="toast-title" class="text-[10px] font-[1000] uppercase tracking-[0.2em] text-blue-600">System Message</p>
                    <p id="toast-message" class="text-sm font-bold text-slate-900 uppercase tracking-tight leading-tight"></p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-0 border-2 border-slate-900 bg-white shadow-[20px_20px_0px_0px_rgba(15,23,42,1)]">
            
            <div class="lg:col-span-4 bg-slate-900 p-10 text-white border-b-2 lg:border-b-0 lg:border-r-2 border-slate-900">
                <p class="text-blue-500 font-black uppercase tracking-[0.3em] text-[10px] mb-4">Step 01</p>
                <h3 class="text-3xl font-[1000] uppercase tracking-tighter mb-10">Select Your <br><span class="text-blue-500 italic">Service</span></h3>
                
                <div class="space-y-4" id="package-options">
                    <label class="block cursor-pointer group">
                        <input type="radio" name="pack_choice" value="5.00" data-name="Essential Deep Wash" class="peer hidden" checked>
                        <div class="p-5 border border-white/10 group-hover:border-blue-500 peer-checked:border-blue-500 peer-checked:bg-blue-600 transition-all">
                            <div class="flex justify-between items-center text-white">
                                <span class="font-black uppercase text-xs tracking-widest">Essential Deep Wash</span>
                                <span class="font-[1000] text-lg">$5</span>
                            </div>
                        </div>
                    </label>

                    <label class="block cursor-pointer group">
                        <input type="radio" name="pack_choice" value="3.00" data-name="Pro Heat Drying" class="peer hidden">
                        <div class="relative p-5 border border-white/10 group-hover:border-blue-500 peer-checked:border-blue-500 peer-checked:bg-blue-600 transition-all">
                            <div class="absolute -top-2 -right-2 bg-yellow-400 text-slate-900 text-[8px] font-black px-2 py-0.5 rotate-12 uppercase">Fast</div>
                            <div class="flex justify-between items-center text-white">
                                <span class="font-black uppercase text-xs tracking-widest">Pro Heat Drying</span>
                                <span class="font-[1000] text-lg">$3</span>
                            </div>
                        </div>
                    </label>

                    <label class="block cursor-pointer group">
                        <input type="radio" name="pack_choice" value="8.00" data-name="Premium Full Care" class="peer hidden">
                        <div class="p-5 border border-white/10 group-hover:border-blue-500 peer-checked:border-blue-500 peer-checked:bg-blue-600 transition-all border-2">
                            <div class="flex justify-between items-center text-white">
                                <span class="font-black uppercase text-xs tracking-widest leading-tight">Premium Full Care<br><span class="text-[9px] opacity-70 italic font-medium lowercase">Wash + Dry</span></span>
                                <span class="font-[1000] text-lg">$8</span>
                            </div>
                        </div>
                    </label>
                </div>
            </div>

            <div class="lg:col-span-8 p-8 md:p-12 bg-white text-slate-900">
                <p class="text-blue-600 font-black uppercase tracking-[0.3em] text-[10px] mb-4">Step 02</p>
                <h4 class="font-black uppercase text-xs tracking-widest text-slate-900 mb-8 underline decoration-blue-600 decoration-4 underline-offset-8">Schedule Pickup Window</h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-16">
                    <div>
                        <div class="flex justify-between items-center mb-6">
                            <span id="current-month" class="font-black text-sm uppercase text-slate-900">Month Year</span>
                            <div class="flex gap-1">
                                <button type="button" onclick="changeMonth(-1)" class="p-1 border border-slate-200 hover:bg-slate-100">
                                    <svg class="w-3 h-3 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M15 19l-7-7 7-7"></path></svg>
                                </button>
                                <button type="button" onclick="changeMonth(1)" class="p-1 border border-slate-200 hover:bg-slate-100">
                                    <svg class="w-3 h-3 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                                </button>
                            </div>
                        </div>
                        <div class="grid grid-cols-7 gap-1 text-center text-[9px] font-black uppercase text-slate-400 mb-4">
                            <div>Mo</div><div>Tu</div><div>We</div><div>Th</div><div>Fr</div><div>Sa</div><div>Su</div>
                        </div>
                        <div id="calendar-grid" class="grid grid-cols-7 gap-1"></div>
                    </div>

                    <div>
                        <p class="text-[9px] font-black uppercase text-slate-400 mb-4 tracking-widest">Available Slots (9AM - 9PM)</p>
                        <div id="time-slots-container" class="grid grid-cols-1 gap-2 max-h-[220px] overflow-y-auto pr-2 custom-scrollbar border-t pt-4"></div>
                    </div>
                </div>

                <p class="text-blue-600 font-black uppercase tracking-[0.3em] text-[10px] mb-4">Step 03</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
                    <div class="relative">
                        <label class="absolute -top-3 left-4 bg-white px-2 text-[10px] font-[1000] uppercase tracking-[0.2em] text-slate-900 z-10">Full Name</label>
                        <input id="customer-name" type="text" placeholder="Full Name" class="w-full border-[3px] border-slate-900 px-5 py-4 font-bold text-sm bg-white shadow-[6px_6px_0px_0px_rgba(15,23,42,1)] focus:outline-none focus:bg-blue-50 transition-all">
                    </div>
                    <div class="relative">
                        <label class="absolute -top-3 left-4 bg-white px-2 text-[10px] font-[1000] uppercase tracking-[0.2em] text-slate-900 z-10">Email Address</label>
                        <input id="customer-email" type="email" placeholder="Email" class="w-full border-[3px] border-slate-900 px-5 py-4 font-bold text-sm bg-white shadow-[6px_6px_0px_0px_rgba(15,23,42,1)] focus:outline-none focus:bg-blue-50 transition-all">
                    </div>
                    <div class="relative">
                        <label class="absolute -top-3 left-4 bg-white px-2 text-[10px] font-[1000] uppercase tracking-[0.2em] text-slate-900 z-10">WhatsApp</label>
                        <input id="customer-phone" type="text" placeholder="Phone" class="w-full border-[3px] border-slate-900 px-5 py-4 font-bold text-sm bg-white shadow-[6px_6px_0px_0px_rgba(15,23,42,1)] focus:outline-none focus:bg-blue-50 transition-all">
                    </div>
                </div>

                <p class="text-blue-600 font-black uppercase tracking-[0.3em] text-[10px] mb-4">Step 04</p>
                <div class="bg-slate-50 border-2 border-dashed border-slate-300 p-8 text-center">
                    <div id="paypal-button-container" class="max-w-[400px] mx-auto"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<meta name="csrf-token" content="{{ csrf_token() }}">

<script>
    let currentDate = new Date();
    let selectedFullDate = null;
    let selectedTime = "09:00";

    // --- CALENDAR & SLOTS ---
    function renderCalendar() {
        const grid = document.getElementById('calendar-grid');
        const monthDisplay = document.getElementById('current-month');
        const today = new Date();
        today.setHours(0,0,0,0);
        grid.innerHTML = '';
        const month = currentDate.getMonth();
        const year = currentDate.getFullYear();
        monthDisplay.innerText = `${currentDate.toLocaleString('default', { month: 'long' })} ${year}`;
        let firstDay = new Date(year, month, 1).getDay();
        firstDay = (firstDay === 0) ? 6 : firstDay - 1;
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        for(let x=0; x<firstDay; x++) grid.innerHTML += `<div></div>`;
        for(let i=1; i<=daysInMonth; i++) {
            const checkDate = new Date(year, month, i);
            const dateStr = `${year}-${(month+1).toString().padStart(2,'0')}-${i.toString().padStart(2,'0')}`;
            const isPast = checkDate < today;
            const isSelected = selectedFullDate === dateStr;
            let btnClass = isPast ? "text-slate-200 pointer-events-none" : "border border-slate-100 hover:border-slate-900 font-black text-slate-900";
            if(isSelected) btnClass = "bg-blue-600 text-white border-2 border-slate-900 shadow-[4px_4px_0px_0px_rgba(15,23,42,1)]";
            grid.innerHTML += `<button type="button" onclick="selectDate('${dateStr}')" class="aspect-square flex items-center justify-center text-xs transition-all ${btnClass}">${i}</button>`;
        }
    }

    function selectDate(dateStr) { selectedFullDate = dateStr; renderCalendar(); }
    function changeMonth(dir) { currentDate.setMonth(currentDate.getMonth() + dir); renderCalendar(); }

    function renderTimeSlots() {
        const container = document.getElementById('time-slots-container');
        container.innerHTML = '';
        for(let h=9; h<21; h++) {
            const time = `${h.toString().padStart(2,'0')}:00`;
            container.innerHTML += `<label class="block cursor-pointer"><input type="radio" name="pickup_slot" value="${time}" class="peer hidden" ${h === 9 ? 'checked' : ''} onchange="selectedTime='${time}'"><div class="p-3 border-2 border-slate-100 font-black text-slate-900 text-[11px] text-center uppercase peer-checked:border-slate-900 peer-checked:bg-slate-50 transition-all hover:border-slate-400">${time}:00 - ${(h+1).toString().padStart(2,'0')}:00</div></label>`;
        }
    }

    function showLuxToast(message, isError = false) {
        const toast = document.getElementById('lux-toast');
        document.getElementById('toast-message').innerText = message;
        const title = document.getElementById('toast-title');
        const container = toast.querySelector('div');
        if(isError) {
            title.innerText = "Error"; title.className = "text-red-600 font-black uppercase text-[10px]";
            container.style.boxShadow = "10px 10px 0px 0px red";
        } else {
            title.innerText = "Success"; title.className = "text-blue-600 font-black uppercase text-[10px]";
            container.style.boxShadow = "10px 10px 0px 0px #3b82f6";
        }
        toast.classList.remove('translate-y-20', 'opacity-0');
        setTimeout(() => toast.classList.add('translate-y-20', 'opacity-0'), 5000);
    }

    // --- PAYPAL ---
    paypal.Buttons({
        style: { layout: 'vertical', color: 'black', shape: 'rect' },
        onClick: function(data, actions) {
            const name = document.getElementById('customer-name').value;
            const phone = document.getElementById('customer-phone').value;
            const email = document.getElementById('customer-email').value;
            if (!selectedFullDate || !name || !phone || !email) {
                showLuxToast("Please fill all fields & select a date!", true);
                return actions.reject();
            }
            return actions.resolve();
        },
        createOrder: function(data, actions) {
            const selectedPack = document.querySelector('input[name="pack_choice"]:checked');
            return actions.order.create({
                purchase_units: [{ amount: { value: selectedPack.value }, description: selectedPack.getAttribute('data-name') }]
            });
        },
        onApprove: function(data, actions) {
            showLuxToast("Capturing Payment...", false);
            return actions.order.capture().then(function(details) {
                return finalizeBooking(details); 
            });
        }
    }).render('#paypal-button-container');

    async function finalizeBooking(details) {
        const selectedPack = document.querySelector('input[name="pack_choice"]:checked');
        const customerEmail = document.getElementById('customer-email').value;
        const payload = {
            service_name: selectedPack.getAttribute('data-name'),
            price: selectedPack.value,
            pickup_date: selectedFullDate,
            pickup_time: selectedTime,
            customer_name: document.getElementById('customer-name').value,
            customer_email: customerEmail,
            customer_phone: document.getElementById('customer-phone').value,
            paypal_order_id: details.id
        };

        try {
            const response = await fetch('/reserve', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify(payload)
            });

            const result = await response.json();
            if(result.success) {
                showSuccessUI(customerEmail);
            } else {
                showLuxToast("Server Error: " + (result.message || "Failed"), true);
            }
        } catch (e) {
            showLuxToast("Network Error - Check your email", true);
        }
    }

    function showSuccessUI(email) {
        const section = document.getElementById('booking');
        section.innerHTML = `
            <div class="max-w-3xl mx-auto px-6 py-20 text-center animate-pulse-once">
                <div class="bg-white border-[4px] border-slate-900 p-12 shadow-[20px_20px_0px_0px_rgba(59,130,246,1)]">
                    <div class="w-20 h-20 bg-blue-600 border-[3px] border-slate-900 flex items-center justify-center mx-auto mb-8 shadow-[5px_5px_0px_0px_rgba(15,23,42,1)]">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <h2 class="text-4xl font-[1000] uppercase tracking-tighter text-slate-900 mb-4">Payment Verified!</h2>
                    <p class="text-blue-600 font-black uppercase tracking-widest text-xs mb-8 italic">Your Laundry is Scheduled</p>
                    <div class="bg-slate-50 border-2 border-slate-900 p-6 mb-8 text-left">
                        <p class="font-bold text-slate-900 uppercase text-sm mb-2 text-left">Next Step:</p>
                        <p class="text-slate-600 text-sm leading-relaxed text-left">
                            We've sent your <strong>Service Contract (PDF)</strong> and confirmation to: 
                            <span class="text-blue-600 font-black block mt-1 underline">${email}</span>
                        </p>
                    </div>
                    <button onclick="window.location.reload()" class="bg-slate-900 text-white px-8 py-4 font-black uppercase text-xs tracking-[0.2em] hover:bg-blue-600 transition-colors shadow-[6px_6px_0px_0px_rgba(59,130,246,1)]">Book Another Wash</button>
                </div>
            </div>
        `;
        window.scrollTo({ top: section.offsetTop - 50, behavior: 'smooth' });
    }

    renderCalendar();
    renderTimeSlots();
</script>