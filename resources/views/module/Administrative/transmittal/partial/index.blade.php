<x-app-layout>

{{-- Breadcrumb --}}
<div class="flex items-center justify-between mb-4">
    <div>
        <x-breadcrumb :items="[
            ['label' => 'Administrative', 'active' => false],
            ['label' => 'Transmittal', 'active' => true]
        ]" />
    </div>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

    {{-- ── Header ── --}}
    <div class="flex items-center gap-3 px-6 py-4 bg-gray-50 border-b border-gray-200">
        <a href="{{ route('transmittal.index') }}"
           class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-blue-600 hover:bg-blue-700 text-white transition shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>
        <h1 class="text-base font-semibold text-gray-800 tracking-tight">Transmittal</h1>
        <span class="ml-auto inline-flex items-center gap-1.5 text-xs font-semibold uppercase tracking-widest px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 border border-yellow-200">
            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 inline-block"></span>
            Pending
        </span>
    </div>

    {{-- ── Form ── --}}
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="p-6 space-y-6">

            {{-- ── Row 1: TRM No · Date & Time · Prepared By · From · To ── --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">TRM No.</label>
                    <input type="text" value="TRM2500170" readonly
                           class="w-full px-3 py-2 text-sm rounded-lg border border-blue-200 bg-blue-50 text-blue-700 font-mono font-medium cursor-not-allowed focus:outline-none"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Date &amp; Time</label>
                    <input type="datetime-local" name="date_time" readonly
                           class="w-full px-3 py-2 text-sm rounded-lg border border-blue-200 bg-blue-50 text-blue-700 font-mono font-medium cursor-not-allowed focus:outline-none"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Prepared By</label>
                    <input type="text" value="Super User" readonly
                           class="w-full px-3 py-2 text-sm rounded-lg border border-blue-200 bg-blue-50 text-blue-700 font-mono font-medium cursor-not-allowed focus:outline-none"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">From</label>
                    <div class="relative">
                        <select name="from"
                                class="w-full appearance-none px-3 py-2 pr-8 text-sm rounded-lg border border-gray-200 bg-white text-gray-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition cursor-pointer">
                            <option value="" disabled selected>Select sender</option>
                            <option>Department A</option>
                            <option>Department B</option>
                            <option>Department C</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">To</label>
                    <div class="relative">
                        <select name="to"
                                class="w-full appearance-none px-3 py-2 pr-8 text-sm rounded-lg border border-gray-200 bg-white text-gray-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition cursor-pointer">
                            <option value="" disabled selected>Select a recipient</option>
                            <option>Recipient A</option>
                            <option>Recipient B</option>
                            <option>Recipient C</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ── Row 2: Subject · Others ── --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                <div class="lg:col-span-2 flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Subject</label>
                    <textarea name="subject" rows="3"
                              class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 bg-white text-gray-800 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition resize-none"
                              placeholder="Enter subject..."></textarea>
                </div>
                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Others</label>
                    <textarea name="others" rows="3"
                              class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 bg-white text-gray-800 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition resize-none"
                              placeholder="Additional notes..."></textarea>
                </div>
            </div>

            {{-- ── Divider ── --}}
            <div class="border-t border-dashed border-gray-200"></div>

            {{-- ── Row 3: Received By · Date Received · Remarks ── --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-red-500">Received By</label>
                    <input type="text" name="received_by"
                           class="w-full px-3 py-2 text-sm rounded-lg border border-red-200 bg-red-50 text-gray-800 focus:outline-none focus:border-red-400 focus:ring-2 focus:ring-red-100 transition placeholder-red-300"
                           placeholder="Name of receiver"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-red-500">Date Received</label>
                    <input type="date" name="date_received"
                           class="w-full px-3 py-2 text-sm rounded-lg border border-red-200 bg-red-50 text-gray-800 focus:outline-none focus:border-red-400 focus:ring-2 focus:ring-red-100 transition"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-red-500">Remarks</label>
                    <textarea name="remarks" rows="2"
                              class="w-full px-3 py-2 text-sm rounded-lg border border-red-200 bg-red-50 text-gray-800 focus:outline-none focus:border-red-400 focus:ring-2 focus:ring-red-100 transition resize-none"
                              placeholder="Enter remarks..."></textarea>
                </div>
            </div>

            {{-- ── Uploaded Images Panel (full-width, separate section) ── --}}
            <div class="rounded-xl border border-gray-200 overflow-hidden">

                {{-- Green Toolbar --}}
                <div class="flex items-center gap-2 px-4 py-3 bg-orange-400">

                    {{-- Upload Files --}}
                    <label class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white hover:bg-gray-50
                                  border border-gray-200 text-xs font-semibold text-gray-700 cursor-pointer
                                  transition shadow-sm select-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                        Upload Files
                        <input type="file" accept="image/*" multiple class="hidden" onchange="handleImageUpload(event)"/>
                    </label>

                    {{-- Delete All --}}
                    <button type="button" onclick="deleteAllImages()"
                            class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-white hover:bg-red-50
                                   border border-gray-200 hover:border-red-200 text-xs font-semibold
                                   text-gray-700 hover:text-red-600 transition shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                        </svg>
                        Delete All
                    </button>

                    <span id="image-count" class="ml-auto text-xs text-white/80 font-medium">0 file(s)</span>
                </div>

                {{-- Thumbnails Area --}}
                <div class="p-4 bg-white min-h-[140px]">

                    {{-- Empty state --}}
                    <div id="empty-upload-state" class="w-full flex flex-col items-center justify-center py-7">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-gray-200 mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                        </svg>
                        <p class="text-xs text-gray-300 font-medium">No images uploaded yet</p>
                        <p class="text-[0.65rem] text-gray-200 mt-0.5">Click "Upload Files" to add images</p>
                    </div>

                    {{-- Image grid --}}
                    <div id="image-grid" class="flex flex-wrap gap-3"></div>
                </div>
            </div>

            {{-- ── Information Table ── --}}
            <div>
                <div class="bg-orange-500 text-white text-xs font-bold uppercase tracking-widest px-4 py-2.5 rounded-t-lg">
                    Information
                </div>
                <div class="border border-t-0 border-gray-200 rounded-b-lg overflow-hidden">
                    <table class="w-full text-sm" id="info-table">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5 w-10">#</th>
                                <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5">Details</th>
                                <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5">Reference Amount</th>
                                <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5 w-24">QTY</th>
                                <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5">Remarks</th>
                                <th class="text-center text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5 w-16">Action</th>
                            </tr>
                        </thead>
                        <tbody id="info-tbody" class="divide-y divide-gray-100">
                            <tr>
                                <td class="px-4 py-2.5 text-xs text-gray-400 font-mono">1</td>
                                <td class="px-4 py-2.5"><input type="text"   name="details[]"    class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Enter details..."/></td>
                                <td class="px-4 py-2.5"><input type="text"   name="ref_amount[]" class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="0.00"/></td>
                                <td class="px-4 py-2.5"><input type="number" name="qty[]"        class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="0"/></td>
                                <td class="px-4 py-2.5"><input type="text"   name="remarks[]"    class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Remarks..."/></td>
                                <td class="px-4 py-2.5 text-center">
                                    <button type="button" onclick="removeRow(this)"
                                            class="inline-flex items-center justify-center w-6 h-6 rounded-md bg-red-100 hover:bg-red-500 text-red-500 hover:text-white transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <button type="button" onclick="addRow()"
                            class="w-full flex items-center justify-center gap-2 py-2.5 border-t border-dashed border-gray-200 text-xs text-gray-400 hover:text-blue-500 hover:bg-blue-50 hover:border-blue-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                        Add Row
                    </button>
                </div>
            </div>

        </div>{{-- /p-6 form body --}}

        {{-- ── Footer Actions ── --}}
        <div class="flex flex-wrap items-center gap-3 px-6 py-4 bg-gray-50 border-t border-gray-200">

            <label class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border border-gray-200 bg-white hover:border-blue-400 hover:bg-blue-50 hover:text-blue-600 text-sm font-medium text-gray-700 cursor-pointer transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13"/>
                </svg>
                Upload Files
                <input type="file" name="attachments[]" multiple class="hidden" id="footer-attachments"/>
            </label>

            <span id="file-names" class="text-xs text-gray-400"></span>

            <div class="ml-auto flex items-center gap-2">
                <a href="{{ url()->previous() }}"
                   class="px-5 py-2 rounded-lg border border-gray-200 bg-white text-sm font-medium text-gray-600 hover:bg-gray-100 transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-6 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold shadow-sm shadow-blue-200 hover:shadow-blue-300 transition">
                    Save Transmittal
                </button>
            </div>
        </div>

    </form>
</div>

<script>
    // ─────────────────────────────────────────
    // Uploaded Images Panel
    // ─────────────────────────────────────────
    let uploadedImages = [];
    let imageIdCounter = 0;

    function handleImageUpload(event) {
        Array.from(event.target.files).forEach(file => {
            const id  = ++imageIdCounter;
            const url = URL.createObjectURL(file);
            uploadedImages.push({ id, name: file.name, url });
            addImageCard(id, file.name, url);
        });
        updateImageCount();
        event.target.value = '';
    }

    function addImageCard(id, name, url) {
        document.getElementById('empty-upload-state').classList.add('hidden');

        const grid = document.getElementById('image-grid');
        const card = document.createElement('div');
        card.id = `img-card-${id}`;
        card.className = 'relative group w-32 h-28 rounded-xl overflow-hidden shrink-0 border-2 border-gray-100 shadow-sm bg-gray-900 hover:shadow-md hover:border-blue-300 transition-all duration-200';
        card.innerHTML = `
            <img src="${url}" alt="${name}"
                 class="w-full h-full object-cover opacity-90 group-hover:opacity-100 transition-opacity duration-200 select-none pointer-events-none"/>
            <div class="absolute bottom-0 inset-x-0 px-2 py-1.5
                        bg-gradient-to-t from-black/70 to-transparent
                        translate-y-full group-hover:translate-y-0 transition-transform duration-200 pointer-events-none">
                <p class="text-[0.6rem] text-white truncate leading-tight">${name}</p>
            </div>
            <button type="button" onclick="removeImage(${id})"
                    class="absolute top-1.5 right-1.5 w-5 h-5 rounded-full bg-red-500 hover:bg-red-600
                           text-white flex items-center justify-center shadow
                           opacity-0 group-hover:opacity-100 transition-opacity duration-150 z-10">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-2.5 h-2.5 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>`;
        grid.appendChild(card);
    }

    function removeImage(id) {
        uploadedImages = uploadedImages.filter(img => img.id !== id);
        const card = document.getElementById(`img-card-${id}`);
        if (card) {
            card.style.transition = 'opacity .2s, transform .2s';
            card.style.opacity    = '0';
            card.style.transform  = 'scale(0.85)';
            setTimeout(() => card.remove(), 200);
        }
        updateImageCount();
        if (uploadedImages.length === 0) {
            document.getElementById('empty-upload-state').classList.remove('hidden');
        }
    }

    function deleteAllImages() {
        if (!uploadedImages.length) return;
        if (!confirm('Remove all uploaded images?')) return;
        document.querySelectorAll('[id^="img-card-"]').forEach(c => c.remove());
        uploadedImages = [];
        updateImageCount();
        document.getElementById('empty-upload-state').classList.remove('hidden');
    }

    function updateImageCount() {
        document.getElementById('image-count').textContent = `${uploadedImages.length} file(s)`;
    }

    // ─────────────────────────────────────────
    // Information Table
    // ─────────────────────────────────────────
    let rowCount = 1;

    function addRow() {
        rowCount++;
        const tbody = document.getElementById('info-tbody');
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td class="px-4 py-2.5 text-xs text-gray-400 font-mono">${rowCount}</td>
            <td class="px-4 py-2.5"><input type="text"   name="details[]"    class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Enter details..."/></td>
            <td class="px-4 py-2.5"><input type="text"   name="ref_amount[]" class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="0.00"/></td>
            <td class="px-4 py-2.5"><input type="number" name="qty[]"        class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="0"/></td>
            <td class="px-4 py-2.5"><input type="text"   name="remarks[]"    class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Remarks..."/></td>
            <td class="px-4 py-2.5 text-center">
                <button type="button" onclick="removeRow(this)"
                        class="inline-flex items-center justify-center w-6 h-6 rounded-md bg-red-100 hover:bg-red-500 text-red-500 hover:text-white transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </td>`;
        tbody.appendChild(tr);
        renumberRows();
    }

    function removeRow(btn) {
        const tbody = document.getElementById('info-tbody');
        if (tbody.rows.length <= 1) return;
        btn.closest('tr').remove();
        renumberRows();
    }

    function renumberRows() {
        document.querySelectorAll('#info-tbody tr').forEach((tr, i) => {
            tr.cells[0].textContent = i + 1;
        });
        rowCount = document.querySelectorAll('#info-tbody tr').length;
    }

    // ─────────────────────────────────────────
    // Footer attachment names
    // ─────────────────────────────────────────
    document.getElementById('footer-attachments').addEventListener('change', function () {
        const names = Array.from(this.files).map(f => f.name).join(', ');
        document.getElementById('file-names').textContent = names || '';
    });
</script>

</x-app-layout>