<x-app-layout title="AstraMC Trucks &amp; Equipments">

{{-- ── Breadcrumb ── --}}
<div class="flex items-center justify-between mb-4">
    <x-breadcrumb :items="[
        ['label' => 'Dashboard',         'active' => false],
        ['label' => 'Administrative',    'active' => false],
        ['label' => 'Shipment Registry', 'active' => true],
    ]" />
</div>

@php
    // Shared input style tokens — single source of truth
    $fieldClass    = 'w-full px-3 py-2 text-sm rounded-lg border border-gray-200 bg-white text-gray-700 transition focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100';
    $readonlyClass = 'w-full px-3 py-2 text-sm rounded-lg border border-blue-200 bg-blue-50 text-blue-700 font-mono font-medium cursor-not-allowed focus:outline-none';
    $selectClass   = 'w-full appearance-none px-3 py-2 pr-8 text-sm rounded-lg border border-gray-200 bg-white text-gray-700 cursor-pointer transition focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100';
    $labelClass    = 'text-[0.7rem] font-bold uppercase tracking-widest text-gray-500';
    $thClass       = 'px-4 py-2.5 text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500';
    $cellInputClass = 'w-full px-1 py-0.5 text-xs text-gray-700 bg-transparent border-none outline-none rounded transition focus:bg-gray-50';

    // Table column definitions: heading => optional width class
    $columns = [
        '#'           => 'w-10',
        'Supplier'    => '',
        'Type'        => '',
        'SO No.'      => 'min-w-[160px]',
        'PI No.'      => 'w-20',
        'Description' => '',
        'Chassis'     => 'w-24',
        'Engine'      => 'w-24',
        'Remarks'     => 'w-24',
    ];
@endphp

<div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

    {{-- ── Card Header ── --}}
    <div class="flex flex-wrap items-center gap-3 px-6 py-4 bg-gray-50 border-b border-gray-200">

        <a href="{{ route('corrective-action-request.index') }}"
           class="inline-flex items-center justify-center w-9 h-9 rounded-lg bg-blue-600 hover:bg-blue-700 text-white transition shrink-0"
           aria-label="Back">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
            </svg>
        </a>

        <h1 class="text-base font-semibold text-gray-800 tracking-tight">Shipment Registry</h1>

        <span class="ml-auto inline-flex items-center gap-1.5 text-xs font-semibold uppercase tracking-widest
                     px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 border border-yellow-200">
            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 inline-block" aria-hidden="true"></span>
            Pending
        </span>

    </div>

    {{-- ── Form ── --}}
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="p-6 space-y-6">

            {{-- Row 1: Shipment identifiers --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">

                <div class="flex flex-col gap-1.5">
                    <label class="{{ $labelClass }}">Shipment No.</label>
                    <input type="text" name="shipment_no" value="CAR2600001"
                           readonly class="{{ $readonlyClass }}"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="{{ $labelClass }}">Transaction Date</label>
                    <input type="date" name="transaction_date" value="{{ date('Y-m-d') }}"
                           readonly class="{{ $readonlyClass }}"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="{{ $labelClass }}">BL No.</label>
                    <input type="text" name="bl_no" placeholder="BL number…"
                           class="{{ $fieldClass }}"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="{{ $labelClass }}">BL Date</label>
                    <input type="date" name="bl_date" class="{{ $fieldClass }}"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="{{ $labelClass }}">Consignee / Importer</label>
                    <div class="relative">
                        <select name="consignee" class="{{ $selectClass }}">
                            <option value="" disabled selected>Select consignee…</option>
                            <option>Department A</option>
                            <option>Department B</option>
                            <option>Department C</option>
                        </select>
                        {{-- Custom chevron icon; pointer-events-none so it doesn't block the select --}}
                        <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center" aria-hidden="true">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

            </div>

            {{-- Row 2: Logistics dates, port, and author --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <div class="flex flex-col gap-1.5">
                    <label class="{{ $labelClass }}">ETD</label>
                    <input type="date" name="etd" class="{{ $fieldClass }}"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="{{ $labelClass }}">ETA</label>
                    <input type="date" name="eta" class="{{ $fieldClass }}"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="{{ $labelClass }}">Port</label>
                    <input type="text" name="port" placeholder="Port of loading / discharge…"
                           class="{{ $fieldClass }}"/>
                </div>

                <div class="flex flex-col gap-1.5">
                    <label class="{{ $labelClass }}">Prepared By</label>
                    <input type="text" name="prepared_by" value="Bryan Iserio"
                           readonly class="{{ $readonlyClass }}"/>
                </div>

            </div>

            <hr class="border-dashed border-gray-200"/>

            {{-- Remarks --}}
            <div class="flex flex-col gap-1.5">
                <label class="{{ $labelClass }}">Remarks</label>
                <textarea name="remarks" rows="3"
                          placeholder="Enter any remarks or notes for this shipment…"
                          class="{{ $fieldClass }} resize-none"></textarea>
            </div>

            <hr class="border-dashed border-gray-200"/>

            {{-- ── Information Table ── --}}
            <div>
                <div class="px-4 py-2.5 text-xs font-bold uppercase tracking-widest text-white bg-orange-500 rounded-t-lg">
                    Information
                </div>

                <div class="overflow-x-auto border border-t-0 border-gray-200 rounded-b-lg">
                    <table class="w-full text-sm" id="info-table">
                        <thead class="bg-gray-50 border-b border-gray-200">
                            <tr>
                                @foreach ($columns as $heading => $width)
                                    <th class="{{ $thClass }} {{ $width }}">{{ $heading }}</th>
                                @endforeach
                                <th class="{{ $thClass }} w-16 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody id="info-tbody" class="divide-y divide-gray-100"></tbody>
                    </table>

                    <button type="button" onclick="addRow()"
                            class="flex items-center justify-center w-full gap-2 py-2.5 text-xs text-gray-400
                                   border-t border-dashed border-gray-200 transition
                                   hover:text-blue-500 hover:bg-blue-50 hover:border-blue-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                        Add Row
                    </button>
                </div>
            </div>

        </div>{{-- /p-6 --}}

        {{-- ── Card Footer ── --}}
        <div class="flex flex-wrap items-center gap-3 px-6 py-4 bg-gray-50 border-t border-gray-200">
            <div class="ml-auto flex items-center gap-2">
                <a href="{{ url()->previous() }}"
                   class="px-5 py-2 rounded-lg border border-gray-200 bg-white text-sm font-medium text-gray-600 hover:bg-gray-100 transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-6 py-2 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold
                               shadow-sm shadow-blue-200 hover:shadow-blue-300 transition">
                    Save
                </button>
            </div>
        </div>

    </form>
</div>

{{-- ── Row template — processed by Blade server-side, cloned by JS at runtime ── --}}
<template id="row-template">
    <tr>
        <td class="px-4 py-2.5 text-xs font-mono text-gray-400 row-num"></td>
        <td class="px-4 py-2.5"><input type="text" name="supplier[]"    placeholder="Supplier"    class="{{ $cellInputClass }}"/></td>
        <td class="px-4 py-2.5"><input type="text" name="type[]"        placeholder="Type"        class="{{ $cellInputClass }}"/></td>
        <td class="px-4 py-2.5"><input type="text" name="so_no[]"       placeholder="SO No."      class="{{ $cellInputClass }}"/></td>
        <td class="px-4 py-2.5"><input type="text" name="pi_no[]"       placeholder="PI No."      class="{{ $cellInputClass }}"/></td>
        <td class="px-4 py-2.5"><input type="text" name="description[]" placeholder="Description" class="{{ $cellInputClass }}"/></td>
        <td class="px-4 py-2.5"><input type="text" name="chassis[]"     placeholder="Chassis No." class="{{ $cellInputClass }}"/></td>
        <td class="px-4 py-2.5"><input type="text" name="engine[]"      placeholder="Engine No."  class="{{ $cellInputClass }}"/></td>
        <td class="px-4 py-2.5"><input type="text" name="remarks[]"     placeholder="Remarks"     class="{{ $cellInputClass }}"/></td>
        <td class="px-4 py-2.5 text-center">
            <button type="button" onclick="removeRow(this)" aria-label="Remove row"
                    class="inline-flex items-center justify-center w-6 h-6 text-red-500 bg-red-100 rounded-md transition hover:bg-red-500 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 pointer-events-none" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </td>
    </tr>
</template>

<script>
    const tbody = document.getElementById('info-tbody');

    /** Rewrite sequential row numbers after any add / remove. */
    function renumberRows() {
        tbody.querySelectorAll('tr').forEach((row, index) => {
            row.querySelector('.row-num').textContent = index + 1;
        });
    }

    /** Clone the hidden <template> and append a blank row to the table. */
    function addRow() {
        const template = document.getElementById('row-template');
        tbody.appendChild(template.content.cloneNode(true));
        renumberRows();
    }

    /** Remove a row; at least one row is always kept. */
    function removeRow(button) {
        if (tbody.rows.length <= 1) return;

        const row = button.closest('tr');
        row.style.transition = 'opacity .15s';
        row.style.opacity = '0';
        setTimeout(() => { row.remove(); renumberRows(); }, 150);
    }

    // Sync row numbers on initial page load.
    document.addEventListener('DOMContentLoaded', renumberRows);
</script>

</x-app-layout>