<x-app-layout>

{{-- Breadcrumb --}}
<div class="flex items-center justify-between mb-4">
    <div>
        <x-breadcrumb :items="[
            ['label' => 'Administrative', 'active' => false],
            ['label' => 'Adjustment Request', 'active' => true]
        ]" />
    </div>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

    {{-- ── Header ── --}}
    <div class="flex items-center gap-3 px-6 py-4 bg-gray-50 border-b border-gray-200">
        <a href="{{route('transmittal.index')}}"
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

    {{-- ── Form Body ── --}}
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="p-6 space-y-6">

            {{-- ── Row 1: TRM No · Date & Time · Prepared By · From · To ── --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">

                {{-- TRM No. --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">TRM No.</label>
                    <input type="text" value="TRM2500170" readonly
                           class="w-full px-3 py-2 text-sm rounded-lg border border-blue-200 bg-blue-50 text-blue-700 font-mono font-medium cursor-not-allowed focus:outline-none"/>
                </div>

                {{-- Date & Time --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Date &amp; Time</label>
                    <input type="datetime-local" name="date_time" readonly
                           class="w-full px-3 py-2 text-sm rounded-lg border border-blue-200 bg-blue-50 text-blue-700 font-mono font-medium cursor-not-allowed focus:outline-none"/>
                </div>

                {{-- Prepared By --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Prepared By</label>
                    <input type="text" value="Super User" readonly
                           class="w-full px-3 py-2 text-sm rounded-lg border border-blue-200 bg-blue-50 text-blue-700 font-mono font-medium cursor-not-allowed focus:outline-none"/>
                </div>

                {{-- From --}}
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

                {{-- To --}}
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

            {{-- ── Thin Divider ── --}}
            <div class="border-t border-dashed border-gray-200"></div>

            {{-- ── Row 3: Received By · Date Received · Remarks · Uploaded Image ── --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                {{-- Received By --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-red-500">Received By</label>
                    <input type="text" name="received_by"
                           class="w-full px-3 py-2 text-sm rounded-lg border border-red-200 bg-red-50 text-gray-800 focus:outline-none focus:border-red-400 focus:ring-2 focus:ring-red-100 transition placeholder-red-300"
                           placeholder="Name of receiver"/>
                </div>

                {{-- Date Received --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-red-500">Date Received</label>
                    <input type="date" name="date_received"
                           class="w-full px-3 py-2 text-sm rounded-lg border border-red-200 bg-red-50 text-gray-800 focus:outline-none focus:border-red-400 focus:ring-2 focus:ring-red-100 transition"/>
                </div>

                {{-- Remarks --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-red-500">Remarks</label>
                    <textarea name="remarks" rows="2"
                              class="w-full px-3 py-2 text-sm rounded-lg border border-red-200 bg-red-50 text-gray-800 focus:outline-none focus:border-red-400 focus:ring-2 focus:ring-red-100 transition resize-none"
                              placeholder="Enter remarks..."></textarea>
                </div>

                {{-- Uploaded Image --}}
                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-red-500">Uploaded Image</label>
                    <label id="upload-zone"
                           class="flex flex-col items-center justify-center gap-1 border-2 border-dashed border-gray-200 rounded-lg bg-gray-50 hover:border-blue-400 hover:bg-blue-50 transition cursor-pointer min-h-[72px] px-3 py-3 text-center">
                        <input type="file" name="image" accept="image/*" class="hidden" id="image-input" onchange="previewImage(event)"/>
                        <svg id="upload-icon" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                        </svg>
                        <span id="upload-text" class="text-xs text-gray-400">Click to upload image</span>
                        <img id="upload-preview" class="hidden w-full rounded object-cover max-h-16" src="#" alt="Preview"/>
                    </label>
                </div>
            </div>

            {{-- ── Information Table ── --}}
            <div>
                <div class="bg-gray-600 text-white text-xs font-bold uppercase tracking-widest px-4 py-2.5 rounded-t-lg">
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
                            {{-- Default empty row --}}
                            <tr>
                                <td class="px-4 py-2.5 text-xs text-gray-400 font-mono">1</td>
                                <td class="px-4 py-2.5"><input type="text" name="details[]" class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Enter details..."/></td>
                                <td class="px-4 py-2.5"><input type="text" name="ref_amount[]" class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="0.00"/></td>
                                <td class="px-4 py-2.5"><input type="number" name="qty[]" class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="0"/></td>
                                <td class="px-4 py-2.5"><input type="text" name="remarks[]" class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Remarks..."/></td>
                                <td class="px-4 py-2.5 text-center">
                                    <button type="button" onclick="removeRow(this)" class="inline-flex items-center justify-center w-6 h-6 rounded-md bg-red-100 hover:bg-red-500 text-red-500 hover:text-white transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- Add Row Button --}}
                    <button type="button" onclick="addRow()"
                            class="w-full flex items-center justify-center gap-2 py-2.5 border-t border-dashed border-gray-200 text-xs text-gray-400 hover:text-blue-500 hover:bg-blue-50 hover:border-blue-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                        Add Row
                    </button>
                </div>
            </div>

        </div>{{-- /form body --}}

        {{-- ── Footer Actions ── --}}
        <div class="flex flex-wrap items-center gap-3 px-6 py-4 bg-gray-50 border-t border-gray-200">

            {{-- Upload Files --}}
            <label class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border border-gray-200 bg-white hover:border-blue-400 hover:bg-blue-50 hover:text-blue-600 text-sm font-medium text-gray-700 cursor-pointer transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13"/>
                </svg>
                Upload Files
                <input type="file" name="attachments[]" multiple class="hidden"/>
            </label>

            <div id="file-names" class="text-xs text-gray-400"></div>

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
    // ── Image preview ──
    function previewImage(event) {
        const file = event.target.files[0];
        if (!file) return;
        const preview = document.getElementById('upload-preview');
        const icon    = document.getElementById('upload-icon');
        const text    = document.getElementById('upload-text');
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('hidden');
        icon.classList.add('hidden');
        text.classList.add('hidden');
    }

    // ── Info table rows ──
    let rowCount = 1;

    function addRow() {
        rowCount++;
        const tbody = document.getElementById('info-tbody');
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td class="px-4 py-2.5 text-xs text-gray-400 font-mono">${rowCount}</td>
            <td class="px-4 py-2.5"><input type="text" name="details[]"    class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Enter details..."/></td>
            <td class="px-4 py-2.5"><input type="text" name="ref_amount[]" class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="0.00"/></td>
            <td class="px-4 py-2.5"><input type="number" name="qty[]"      class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="0"/></td>
            <td class="px-4 py-2.5"><input type="text" name="remarks[]"    class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Remarks..."/></td>
            <td class="px-4 py-2.5 text-center">
                <button type="button" onclick="removeRow(this)" class="inline-flex items-center justify-center w-6 h-6 rounded-md bg-red-100 hover:bg-red-500 text-red-500 hover:text-white transition">
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
        if (tbody.rows.length <= 1) return; // keep at least one row
        btn.closest('tr').remove();
        renumberRows();
    }

    function renumberRows() {
        document.querySelectorAll('#info-tbody tr').forEach((tr, i) => {
            tr.cells[0].textContent = i + 1;
        });
        rowCount = document.querySelectorAll('#info-tbody tr').length;
    }

    // ── Show uploaded file names ──
    document.querySelector('input[name="attachments[]"]').addEventListener('change', function () {
        const names = Array.from(this.files).map(f => f.name).join(', ');
        document.getElementById('file-names').textContent = names || '';
    });
</script>

</x-app-layout>