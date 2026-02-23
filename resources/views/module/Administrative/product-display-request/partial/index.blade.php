<x-app-layout title="AstraMC Trucks & Equipments">

{{-- Breadcrumb --}}
<div class="flex items-center justify-between mb-4">
    <div>
        <x-breadcrumb :items="[
            ['label' => 'Dashboard',              'active' => false],
            ['label' => 'Administrative',         'active' => false],
            ['label' => 'Product Display Request','active' => true]
        ]" />
    </div>
</div>

<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

    {{-- ── Header ── --}}
    <div class="flex flex-wrap items-center gap-3 px-6 py-4 bg-gray-50 border-b border-gray-200">

        <a href="{{ route('product-service-request.index') }}"
           class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-blue-600 hover:bg-blue-700 text-white transition shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>

        <h1 class="text-base font-semibold text-gray-800 tracking-tight">Product Display Request</h1>

        <span class="inline-flex items-center gap-1.5 text-xs font-semibold uppercase tracking-widest px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 border border-yellow-200">
            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 inline-block"></span>
            Pending
        </span>

        <div class="ml-auto flex items-center gap-3">
            <div class="flex flex-col gap-1.5">
                    <input type="text" name="location" readonly
                           class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 bg-white text-gray-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition"
                    />
            </div>
            <div class="flex flex-col gap-1.5">
                    <input type="text" name="location" readonly
                           class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 bg-white text-gray-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition"
                    />
            </div>
        </div>
    </div>

    {{-- ── Form ── --}}
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="p-6 space-y-6">

            {{-- ── Row 1: PDR No · Transaction Date · Requested By · Branch · Prepared By ── --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">PDR No.</label>
                    <input type="text" value="PDR2600001" readonly
                           class="w-full px-3 py-2 text-sm rounded-lg border border-blue-200 bg-blue-50 text-blue-700 font-mono font-medium cursor-not-allowed focus:outline-none"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Transaction Date</label>
                    <input type="date" name="transaction_date" value="{{ date('Y-m-d') }}" readonly
                           class="w-full px-3 py-2 text-sm rounded-lg border border-blue-200 bg-blue-50 text-blue-700 font-mono font-medium cursor-not-allowed focus:outline-none"/>
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

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Branch</label>
                    <div class="relative">
                        <select name="branch"
                                class="w-full appearance-none px-3 py-2 pr-8 text-sm rounded-lg border border-gray-200 bg-white text-gray-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition cursor-pointer">
                            <option value="" disabled selected>Select branch…</option>
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

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Prepared By</label>
                    <input type="text" value="Bryan Iserio" readonly
                           class="w-full px-3 py-2 text-sm rounded-lg border border-blue-200 bg-blue-50 text-blue-700 font-mono font-medium cursor-not-allowed focus:outline-none"/>
                </div>

            </div>

            {{-- ── Divider ── --}}
            <div class="border-t border-dashed border-gray-200"></div>

            {{-- ── Row 2: Start Date · End Date · Location · Purpose ── --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Start Date &amp; Time</label>
                    <input type="datetime-local" name="start_datetime"
                           class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 bg-white text-gray-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">End Date &amp; Time</label>
                    <input type="datetime-local" name="end_datetime"
                           class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 bg-white text-gray-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Location</label>
                    <input type="text" name="location"
                           class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 bg-white text-gray-700 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition"
                           placeholder="Enter location…"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="text-[0.7rem] font-bold uppercase tracking-widest text-gray-500">Purpose of Request</label>
                    <textarea name="purpose_of_request" rows="1"
                              class="w-full px-3 py-2 text-sm rounded-lg border border-gray-200 bg-white text-gray-800 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition resize-none"
                              placeholder="Purpose…"></textarea>
                </div>

            </div>

            {{-- ── Units Information Table ── --}}
            <div>
                <div class="bg-blue-500 text-white text-xs font-bold uppercase tracking-widest px-4 py-2.5 rounded-t-lg flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12"/>
                    </svg>
                    Units Information
                </div>
                <div class="border border-t-0 border-gray-200 rounded-b-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm" id="units-table">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5 w-10">#</th>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5">Unit ID</th>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5">Unit Type</th>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5">Chassis No.</th>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5">Engine No.</th>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5">Description</th>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5 w-20">QTY</th>
                                    <th class="text-center text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5 w-16">Action</th>
                                </tr>
                            </thead>
                            <tbody id="units-tbody" class="divide-y divide-gray-100">
                                <tr>
                                    <td class="px-4 py-2.5 text-xs text-gray-400 font-mono">1</td>
                                    <td class="px-4 py-2.5"><input type="text"   name="unit_id[]"          class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Unit ID…"/></td>
                                    <td class="px-4 py-2.5"><input type="text"   name="unit_type[]"        class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Type…"/></td>
                                    <td class="px-4 py-2.5"><input type="text"   name="chassis_no[]"       class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Chassis…"/></td>
                                    <td class="px-4 py-2.5"><input type="text"   name="engine_no[]"        class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Engine…"/></td>
                                    <td class="px-4 py-2.5"><input type="text"   name="unit_description[]" class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Description…"/></td>
                                    <td class="px-4 py-2.5"><input type="number" name="unit_qty[]"         class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="0" min="0"/></td>
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
                    </div>
                    <button type="button" onclick="addUnitRow()"
                            class="w-full flex items-center justify-center gap-2 py-2.5 border-t border-dashed border-gray-200 text-xs text-gray-400 hover:text-blue-500 hover:bg-blue-50 hover:border-blue-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                        Add Row
                    </button>
                </div>
            </div>

            {{-- ── Items Information Table ── --}}
            <div>
                <div class="bg-green-500 text-white text-xs font-bold uppercase tracking-widest px-4 py-2.5 rounded-t-lg flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                    </svg>
                    Items Information
                </div>
                <div class="border border-t-0 border-gray-200 rounded-b-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm" id="items-table">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5 w-10">#</th>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5">Item Name</th>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5">Brand</th>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5">Class</th>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5">Specs</th>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5">Parts No.</th>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5">UM</th>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5 w-20">QTY</th>
                                    <th class="text-center text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5 w-16">Action</th>
                                </tr>
                            </thead>
                            <tbody id="items-tbody" class="divide-y divide-gray-100">
                                <tr>
                                    <td class="px-4 py-2.5 text-xs text-gray-400 font-mono">1</td>
                                    <td class="px-4 py-2.5"><input type="text"   name="item_name[]"   class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Item name…"/></td>
                                    <td class="px-4 py-2.5"><input type="text"   name="item_brand[]"  class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Brand…"/></td>
                                    <td class="px-4 py-2.5"><input type="text"   name="item_class[]"  class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Class…"/></td>
                                    <td class="px-4 py-2.5"><input type="text"   name="item_specs[]"  class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Specs…"/></td>
                                    <td class="px-4 py-2.5"><input type="text"   name="parts_no[]"    class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Parts no…"/></td>
                                    <td class="px-4 py-2.5"><input type="text"   name="item_um[]"     class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="UM…"/></td>
                                    <td class="px-4 py-2.5"><input type="number" name="item_qty[]"    class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="0" min="0"/></td>
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
                    </div>
                    <button type="button" onclick="addItemRow()"
                            class="w-full flex items-center justify-center gap-2 py-2.5 border-t border-dashed border-gray-200 text-xs text-gray-400 hover:text-blue-500 hover:bg-blue-50 hover:border-blue-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                        Add Row
                    </button>
                </div>
            </div>

            {{-- ── Attachment Information Table ── --}}
            <div>
                <div class="bg-orange-500 text-white text-xs font-bold uppercase tracking-widest px-4 py-2.5 rounded-t-lg flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13"/>
                    </svg>
                    Attachment Information
                </div>
                <div class="border border-t-0 border-gray-200 rounded-b-lg overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm" id="attach-table">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5 w-10">#</th>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5">Attach ID</th>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5">Brand</th>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5">Description</th>
                                    <th class="text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5 w-20">QTY</th>
                                    <th class="text-center text-[0.68rem] font-bold uppercase tracking-widest text-gray-500 px-4 py-2.5 w-16">Action</th>
                                </tr>
                            </thead>
                            <tbody id="attach-tbody" class="divide-y divide-gray-100">
                                <tr>
                                    <td class="px-4 py-2.5 text-xs text-gray-400 font-mono">1</td>
                                    <td class="px-4 py-2.5"><input type="text"   name="attach_id[]"          class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Attach ID…"/></td>
                                    <td class="px-4 py-2.5"><input type="text"   name="attach_brand[]"       class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Brand…"/></td>
                                    <td class="px-4 py-2.5"><input type="text"   name="attach_description[]" class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="Description…"/></td>
                                    <td class="px-4 py-2.5"><input type="number" name="attach_qty[]"         class="w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition" placeholder="0" min="0"/></td>
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
                    </div>
                    <button type="button" onclick="addAttachRow()"
                            class="w-full flex items-center justify-center gap-2 py-2.5 border-t border-dashed border-gray-200 text-xs text-gray-400 hover:text-blue-500 hover:bg-blue-50 hover:border-blue-200 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                        Add Row
                    </button>
                </div>
            </div>

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
// Shared: remove any row (keeps min 1)
// ─────────────────────────────────────────
function removeRow(btn) {
    const tbody = btn.closest('tbody');
    if (tbody.rows.length <= 1) return;
    btn.closest('tr').remove();
    renumberTbody(tbody);
}

function renumberTbody(tbody) {
    Array.from(tbody.rows).forEach((tr, i) => {
        tr.cells[0].textContent = i + 1;
    });
}

function makeCell(input) {
    const td = document.createElement('td');
    td.className = 'px-4 py-2.5';
    td.appendChild(input);
    return td;
}

function inp(type, name, placeholder, extra = '') {
    const el = document.createElement('input');
    el.type        = type;
    el.name        = name;
    el.placeholder = placeholder;
    el.className   = 'w-full text-xs text-gray-700 bg-transparent border-none outline-none focus:bg-gray-50 rounded px-1 py-0.5 transition';
    if (extra) el.setAttribute('min', extra);
    return el;
}

function actionCell(label) {
    const td  = document.createElement('td');
    td.className = 'px-4 py-2.5 text-center';
    td.innerHTML = `<button type="button" onclick="removeRow(this)"
        class="inline-flex items-center justify-center w-6 h-6 rounded-md bg-red-100 hover:bg-red-500 text-red-500 hover:text-white transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg></button>`;
    return td;
}

// ── Units table ──
function addUnitRow() {
    const tbody = document.getElementById('units-tbody');
    const num   = tbody.rows.length + 1;
    const tr    = document.createElement('tr');
    const numTd = document.createElement('td');
    numTd.className = 'px-4 py-2.5 text-xs text-gray-400 font-mono';
    numTd.textContent = num;
    tr.appendChild(numTd);
    tr.appendChild(makeCell(inp('text',   'unit_id[]',          'Unit ID…')));
    tr.appendChild(makeCell(inp('text',   'unit_type[]',        'Type…')));
    tr.appendChild(makeCell(inp('text',   'chassis_no[]',       'Chassis…')));
    tr.appendChild(makeCell(inp('text',   'engine_no[]',        'Engine…')));
    tr.appendChild(makeCell(inp('text',   'unit_description[]', 'Description…')));
    tr.appendChild(makeCell(inp('number', 'unit_qty[]',         '0', '0')));
    tr.appendChild(actionCell());
    tbody.appendChild(tr);
}

// ── Items table ──
function addItemRow() {
    const tbody = document.getElementById('items-tbody');
    const num   = tbody.rows.length + 1;
    const tr    = document.createElement('tr');
    const numTd = document.createElement('td');
    numTd.className = 'px-4 py-2.5 text-xs text-gray-400 font-mono';
    numTd.textContent = num;
    tr.appendChild(numTd);
    tr.appendChild(makeCell(inp('text',   'item_name[]',  'Item name…')));
    tr.appendChild(makeCell(inp('text',   'item_brand[]', 'Brand…')));
    tr.appendChild(makeCell(inp('text',   'item_class[]', 'Class…')));
    tr.appendChild(makeCell(inp('text',   'item_specs[]', 'Specs…')));
    tr.appendChild(makeCell(inp('text',   'parts_no[]',   'Parts no…')));
    tr.appendChild(makeCell(inp('text',   'item_um[]',    'UM…')));
    tr.appendChild(makeCell(inp('number', 'item_qty[]',   '0', '0')));
    tr.appendChild(actionCell());
    tbody.appendChild(tr);
}

// ── Attachment table ──
function addAttachRow() {
    const tbody = document.getElementById('attach-tbody');
    const num   = tbody.rows.length + 1;
    const tr    = document.createElement('tr');
    const numTd = document.createElement('td');
    numTd.className = 'px-4 py-2.5 text-xs text-gray-400 font-mono';
    numTd.textContent = num;
    tr.appendChild(numTd);
    tr.appendChild(makeCell(inp('text',   'attach_id[]',          'Attach ID…')));
    tr.appendChild(makeCell(inp('text',   'attach_brand[]',       'Brand…')));
    tr.appendChild(makeCell(inp('text',   'attach_description[]', 'Description…')));
    tr.appendChild(makeCell(inp('number', 'attach_qty[]',         '0', '0')));
    tr.appendChild(actionCell());
    tbody.appendChild(tr);
}

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