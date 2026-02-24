<x-app-layout>

{{-- Breadcrumb --}}
<div class="flex items-center justify-between mb-4">
    <div>
        <x-breadcrumb :items="[
            ['label' => 'Dashboard',                  'active' => false],
            ['label' => 'Administrative',             'active' => false],
            ['label' => 'Marketing Service Request',  'active' => true]
        ]" />
    </div>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

    {{-- ── Header ── --}}
    <div class="flex flex-wrap items-center gap-3 px-6 py-4 bg-gray-50 border-b border-gray-200">

        <a href="{{ route('marketing-service-request.index') }}"
           class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-blue-600 hover:bg-blue-700 text-white transition shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>

        <h1 class="text-base font-semibold text-gray-800 tracking-tight">Marketing Service Request</h1>

        <span class="inline-flex items-center gap-1.5 text-xs font-semibold uppercase tracking-widest px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 border border-yellow-200">
            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 inline-block"></span>
            Pending
        </span>

        <div class="ml-auto flex items-center gap-3">

            {{-- Select Company --}}
            <div class="relative">
                <select name="company_id" disabled
                        class="appearance-none pl-3 pr-8 py-2 text-sm rounded-lg border border-gray-200 bg-white text-gray-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition cursor-pointer min-w-[160px]">
                    <option value="" disabled selected>Select Company</option>
                    <option>Company A</option>
                    <option>Company B</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>

            {{-- Select Branch --}}
            <div class="relative">
                <select name="branch_id" disabled
                        class="appearance-none pl-3 pr-8 py-2 text-sm rounded-lg border border-gray-200 bg-white text-gray-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition cursor-pointer min-w-[160px]">
                    <option value="" disabled selected>Select Branch</option>
                    <option>Branch A</option>
                    <option>Branch B</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </div>
            </div>

        </div>
    </div>

    {{-- ── Form ── --}}
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="p-6 space-y-6">

            {{-- ── Row 1: MSR No · Transaction Date · Type of Request · Requested By · Departments · Prepared By ── --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-4">

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">MSR No.</label>
                    <input type="text" value="MSR2600001" readonly
                           class="w-full px-3 py-2 text-sm rounded-lg border border-blue-200 bg-blue-50 text-blue-700 font-mono font-medium cursor-not-allowed focus:outline-none"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Transaction Date</label>
                    <input type="date" name="transaction_date"
                           value="{{ date('Y-m-d') }}" readonly
                           class="w-full px-3 py-2 text-sm rounded-lg border border-blue-200 bg-blue-50 text-blue-700 font-mono font-medium cursor-not-allowed focus:outline-none"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Type of Request</label>
                    <div class="relative">
                        <select name="type_of_request"
                                class="w-full appearance-none px-3 py-2 pr-8 text-sm rounded-lg border border-gray-200 bg-white text-gray-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition cursor-pointer">
                            <option value="" disabled selected>Select type…</option>
                            <option value="print">Print Materials</option>
                            <option value="digital">Digital / Social Media</option>
                            <option value="event">Event / Activation</option>
                            <option value="branding">Branding</option>
                            <option value="video">Video / Photography</option>
                            <option value="other">Other</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Requested By</label>
                    <div class="relative">
                        <select name="requested_by" 
                                class="w-full appearance-none px-3 py-2 pr-8 text-sm rounded-lg border border-gray-200 bg-white text-gray-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition cursor-pointer">
                            <option value="" disabled selected>Select person…</option>
                            <option>Employee A</option>
                            <option>Employee B</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                {{-- Departments Tag Input --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Departments</label>
                    <div id="dept-wrapper"
                         class="flex flex-wrap items-center gap-1 w-full min-h-[38px] px-2 py-1.5 text-sm rounded-lg border border-gray-200 bg-white focus-within:border-blue-500 focus-within:ring-2 focus-within:ring-blue-100 transition cursor-text"
                         onclick="document.getElementById('dept-input').focus()">
                        <input id="dept-input" type="text"
                               class="flex-1 min-w-[60px] text-xs text-gray-700 bg-transparent border-none outline-none py-0.5"
                               placeholder="Type & Enter…"
                               onkeydown="handleDeptInput(event)"/>
                    </div>
                    <input type="hidden" name="departments" id="dept-hidden"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Prepared By</label>
                    <input type="text" value="BRYAN ISERIO" readonly
                           class="w-full px-3 py-2 text-sm rounded-lg border border-blue-200 bg-blue-50 text-blue-700 font-mono font-medium cursor-not-allowed focus:outline-none"/>
                </div>

            </div>

            {{-- ── Row 2: Purpose of Request (full width) ── --}}
            <div class="flex flex-col gap-1.5">
                <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Purpose of Request</label>
                <textarea name="purpose_of_request" rows="4"
                          class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 bg-white text-gray-800 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition resize-none"
                          placeholder="Describe the purpose of this marketing request…"></textarea>
            </div>

            {{-- ── Divider ── --}}
            <div class="border-t border-dashed border-gray-200"></div>

            {{-- ── File Upload Panel ── --}}
            <div class="rounded-xl border border-gray-200 overflow-hidden">

                <div class="flex items-center gap-2 px-4 py-3 bg-orange-500">

                    <label class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white hover:bg-gray-50
                                  border border-gray-200 text-xs font-semibold text-gray-700 cursor-pointer
                                  transition shadow-sm select-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                        Upload Files
                        <input type="file" accept="image/*,application/pdf" multiple class="hidden" onchange="handleFileUpload(event)"/>
                    </label>

                    <button type="button" onclick="deleteAllFiles()"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white hover:bg-red-50
                                   border border-gray-200 hover:border-red-200 text-xs font-semibold
                                   text-gray-700 hover:text-red-600 transition shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                        </svg>
                        Delete All
                    </button>

                    <span id="file-count" class="ml-auto text-xs text-white/80 font-medium">0 file(s)</span>
                </div>

                <div id="drop-zone"
                     class="p-4 bg-white min-h-[140px] transition-colors duration-150"
                     ondragover="event.preventDefault(); this.classList.add('bg-green-50')"
                     ondragleave="this.classList.remove('bg-green-50')"
                     ondrop="handleDrop(event)">

                    <div id="empty-upload-state" class="w-full flex flex-col items-center justify-center py-7">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-200 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                        </svg>
                        <p class="text-xs text-gray-300 font-medium">No files uploaded yet</p>
                        <p class="text-[0.65rem] text-gray-200 mt-0.5">Click "Upload Files" or drag &amp; drop here</p>
                    </div>

                    <div id="file-grid" class="flex flex-wrap gap-3"></div>
                </div>
            </div>

        </div>{{-- /p-6 --}}

        {{-- ── Footer ── --}}
        <div class="flex flex-wrap items-center gap-3 px-6 py-4 bg-gray-50 border-t border-gray-200">
            <div class="ml-auto flex items-center gap-2">
                <a href="{{ url()->previous() }}"
                   class="px-5 py-2 rounded-lg border border-gray-200 bg-white text-sm font-medium text-gray-600 hover:bg-gray-100 transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-6 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold shadow-sm shadow-blue-200 hover:shadow-blue-300 transition">
                    Save
                </button>
            </div>
        </div>

    </form>
</div>

<script>
// ─────────────────────────────────────────
// Department Tag Input
// ─────────────────────────────────────────
let departments = ['ITD'];

function renderTags() {
    const wrapper = document.getElementById('dept-wrapper');
    wrapper.querySelectorAll('.dept-tag').forEach(t => t.remove());
    const input = document.getElementById('dept-input');

    departments.forEach(dept => {
        const tag = document.createElement('span');
        tag.className = 'dept-tag inline-flex items-center gap-1 px-2 py-0.5 rounded-md bg-blue-100 text-blue-700 text-xs font-semibold';
        tag.innerHTML = `${dept}
            <button type="button" onclick="removeDept('${dept}')" class="hover:text-red-500 transition leading-none ml-0.5">&times;</button>`;
        wrapper.insertBefore(tag, input);
    });

    document.getElementById('dept-hidden').value = departments.join(',');
}

function handleDeptInput(e) {
    if ((e.key === 'Enter' || e.key === ',') && e.target.value.trim()) {
        e.preventDefault();
        const val = e.target.value.trim().toUpperCase().replace(/,/g, '');
        if (val && !departments.includes(val)) {
            departments.push(val);
            renderTags();
        }
        e.target.value = '';
    } else if (e.key === 'Backspace' && !e.target.value && departments.length) {
        departments.pop();
        renderTags();
    }
}

function removeDept(dept) {
    departments = departments.filter(d => d !== dept);
    renderTags();
}

renderTags();

// ─────────────────────────────────────────
// File Upload Panel
// ─────────────────────────────────────────
let uploadedFiles = [];
let fileIdCounter = 0;

function handleDrop(e) {
    e.preventDefault();
    document.getElementById('drop-zone').classList.remove('bg-green-50');
    processFiles(Array.from(e.dataTransfer.files));
}

function handleFileUpload(e) {
    processFiles(Array.from(e.target.files));
    e.target.value = '';
}

function processFiles(files) {
    files.forEach(file => {
        const id    = ++fileIdCounter;
        const url   = URL.createObjectURL(file);
        const isPdf = file.type === 'application/pdf';
        uploadedFiles.push({ id, name: file.name, url, isPdf });
        addCard(id, file.name, url, isPdf);
    });
    updateCount();
}

function addCard(id, name, url, isPdf) {
    document.getElementById('empty-upload-state').classList.add('hidden');
    const grid = document.getElementById('file-grid');
    const card = document.createElement('div');
    card.id        = `fc-${id}`;
    card.className = 'relative group w-32 h-28 rounded-xl overflow-hidden shrink-0 border-2 border-gray-100 shadow-sm hover:shadow-md hover:border-blue-300 transition-all duration-200';

    const thumb = isPdf
        ? `<div class="w-full h-full flex flex-col items-center justify-center bg-red-50">
               <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
               </svg>
               <span class="text-[0.6rem] text-red-400 font-bold mt-1">PDF</span>
           </div>`
        : `<img src="${url}" alt="${name}" class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition-opacity duration-200 select-none pointer-events-none bg-gray-900"/>`;

    card.innerHTML = `
        ${thumb}
        <div class="absolute bottom-0 inset-x-0 px-2 py-1.5 bg-gradient-to-t from-black/70 to-transparent
                    translate-y-full group-hover:translate-y-0 transition-transform duration-200 pointer-events-none">
            <p class="text-[0.6rem] text-white truncate leading-tight">${name}</p>
        </div>
        <button type="button" onclick="removeFile(${id})"
                class="absolute top-1.5 right-1.5 w-5 h-5 rounded-full bg-red-500 hover:bg-red-600
                       text-white flex items-center justify-center shadow
                       opacity-0 group-hover:opacity-100 transition-opacity duration-150 z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 h-2.5 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>`;
    grid.appendChild(card);
}

function removeFile(id) {
    uploadedFiles = uploadedFiles.filter(f => f.id !== id);
    const card = document.getElementById(`fc-${id}`);
    if (card) {
        card.style.transition = 'opacity .2s, transform .2s';
        card.style.opacity    = '0';
        card.style.transform  = 'scale(0.85)';
        setTimeout(() => card.remove(), 200);
    }
    updateCount();
    if (!uploadedFiles.length) document.getElementById('empty-upload-state').classList.remove('hidden');
}

function deleteAllFiles() {
    if (!uploadedFiles.length) return;
    if (!confirm('Remove all uploaded files?')) return;
    document.querySelectorAll('[id^="fc-"]').forEach(c => c.remove());
    uploadedFiles = [];
    updateCount();
    document.getElementById('empty-upload-state').classList.remove('hidden');
}

function updateCount() {
    document.getElementById('file-count').textContent = `${uploadedFiles.length} file(s)`;
}
</script>

</x-app-layout>