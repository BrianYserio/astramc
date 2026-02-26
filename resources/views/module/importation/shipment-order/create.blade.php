<x-app-layout title="AstraMC Trucks & Equipments">

    {{-- Breadcrumb --}}
    <div class="mb-4">
        <x-layout.breadcrumb :items="[
            ['label' => 'Dashboard',      'active' => false],
            ['label' => 'Importation',    'active' => false],
            ['label' => 'Shipment Order', 'active' => true],
        ]" />
    </div>

    {{-- Shared class strings --}}
    @php
        $labelClass     = 'text-[0.7rem] font-bold uppercase tracking-widest text-gray-500';
        $inputClass     = 'w-full px-3 py-2 text-sm rounded-lg border border-gray-200 bg-white text-gray-700 transition focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100';
        $readonlyClass  = 'w-full px-3 py-2 text-sm rounded-lg border border-blue-200 bg-blue-50 text-blue-700 font-mono font-medium cursor-not-allowed focus:outline-none';
        $selectClass    = 'w-full appearance-none px-3 py-2 pr-8 text-sm rounded-lg border border-gray-200 bg-white text-gray-700 cursor-pointer transition focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100';
        $thClass        = 'px-4 py-2.5 text-left text-[0.68rem] font-bold uppercase tracking-widest text-gray-500';
    @endphp

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

        {{-- Card Header --}}
        <div class="flex flex-wrap items-center gap-3 px-6 py-4 bg-gray-50 border-b border-gray-200">
            <x-buttons.prev-link href="{{ route('shipment-order.index') }}"
                aria-label="Back to Shipment Orders">
                <x-icons.prev-icon />
            </x-buttons.prev-link>

            <h1 class="text-base font-semibold tracking-tight text-gray-800">
                Shipment Order Information
            </h1>

            <span class="ml-auto inline-flex items-center gap-1.5 px-3 py-1 text-xs font-semibold uppercase tracking-widest rounded-full bg-yellow-100 text-yellow-700 border border-yellow-200">
                <span class="inline-block w-1.5 h-1.5 rounded-full bg-yellow-500" aria-hidden="true"></span>
                Pending
            </span>
        </div>

        {{-- Form --}}
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="p-6 space-y-6">

                {{-- Row 1: SO No · Invoice Date · PI No · Supplier Name --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                    <div class="flex flex-col gap-1.5">
                        <label class="{{ $labelClass }}">SO No.</label>
                        <input type="text" value="ARQ2600001" readonly class="{{ $readonlyClass }}" />
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="{{ $labelClass }}">Invoice Date</label>
                        <input type="date" name="invoice_date" />
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="{{ $labelClass }}">PI No.</label>
                        <input type="text" name="pi_no" class="{{ $inputClass }}" />
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="{{ $labelClass }}">Supplier Name</label>
                        <x-forms.select-field name="supplier_name" placeholder="Select supplier">
                            <option>JAC AUTOMOBILE. INT'L PHILIPPINES</option>
                            <option>POWERTRAC INC.</option>
                        </x-forms.select-field>
                    </div>

                </div>

                {{-- Row 2: Payment Terms · Currency Type · Total Discount · Prepared By --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                    <div class="flex flex-col gap-1.5">
                        <label class="{{ $labelClass }}">Payment Terms</label>
                        <x-forms.select-field name="payment_terms" placeholder="Select Payment Terms">
                            <option>60 Days PDC from Delivery Date</option>
                            <option>60 Days PDC from the submission of ORCR</option>
                        </x-forms.select-field>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="{{ $labelClass }}">Currency Type</label>
                        <x-forms.select-field name="currency_type" placeholder="Select Currency">
                            <option>PHP</option>
                            <option>USD</option>
                            <option>CNY</option>
                            <option>JPY</option>
                        </x-forms.select-field>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="{{ $labelClass }}">Total Discount</label>
                        <input type="text" name="total_discount" placeholder="0.00" class="{{ $inputClass }}" />
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="{{ $labelClass }}">Prepared By</label>
                        <input type="text" value="Bryan Iserio" readonly class="{{ $readonlyClass }}" />
                    </div>

                </div>

                {{-- Row 3: Bank Details · Remarks --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">

                    <div class="flex flex-col gap-1.5">
                        <label class="{{ $labelClass }}">Bank Details</label>
                        <textarea name="bank_details" rows="4" placeholder="Enter bank details…"
                                  class="{{ $inputClass }} resize-none"></textarea>
                    </div>

                    <div class="flex flex-col gap-1.5">
                        <label class="{{ $labelClass }}">Remarks</label>
                        <textarea name="remarks" rows="4" placeholder="Enter remarks…"
                                  class="{{ $inputClass }} resize-none"></textarea>
                    </div>

                </div>

                {{-- Information Table --}}
                <div>
                    <div class="px-4 py-2.5 text-xs font-bold uppercase tracking-widest text-white bg-orange-500 rounded-t-lg">
                        Information
                    </div>

                    <div class="overflow-hidden border border-t-0 border-gray-200 rounded-b-lg">
                        <table class="w-full text-sm" id="info-table">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    @foreach (['#', 'Type', 'Reference', 'Description', 'UM', 'QTY', 'Price', 'T.Price', 'Discount', 'TD.Price', 'TD.Price / Type'] as $heading)
                                        <th class="{{ $thClass }} {{ $loop->first ? 'w-10' : '' }}">
                                            {{ $heading }}
                                        </th>
                                    @endforeach
                                    <th class="{{ $thClass }} w-16 text-center">Action</th>
                                </tr>
                            </thead>

                            <tbody id="info-tbody" class="divide-y divide-gray-100">
                                {{-- Initial row — cloned by addRow() --}}
                                <tr>
                                    <td class="px-4 py-2.5 text-xs font-mono text-gray-400">1</td>

                                    @foreach ([
                                        ['name' => 'type[]',        'type' => 'text',   'placeholder' => 'Type…'],
                                        ['name' => 'reference[]',   'type' => 'text',   'placeholder' => 'Reference…'],
                                        ['name' => 'description[]', 'type' => 'text',   'placeholder' => 'Description…'],
                                        ['name' => 'um[]',          'type' => 'text',   'placeholder' => 'UM…'],
                                        ['name' => 'qty[]',         'type' => 'number', 'placeholder' => '0'],
                                        ['name' => 'price[]',       'type' => 'text',   'placeholder' => '0.00'],
                                        ['name' => 't_price[]',     'type' => 'text',   'placeholder' => '0.00'],
                                        ['name' => 'discount[]',    'type' => 'text',   'placeholder' => '0.00'],
                                        ['name' => 'td_price[]',    'type' => 'text',   'placeholder' => '0.00'],
                                        ['name' => 'td_price_type[]','type'=> 'text',   'placeholder' => '—'],
                                    ] as $field)
                                        <td class="px-4 py-2.5">
                                            <input
                                                type="{{ $field['type'] }}"
                                                name="{{ $field['name'] }}"
                                                placeholder="{{ $field['placeholder'] }}"
                                                class="w-full px-1 py-0.5 text-xs text-gray-700 bg-transparent border-none outline-none rounded transition focus:bg-gray-50"
                                            />
                                        </td>
                                    @endforeach

                                    <td class="px-4 py-2.5 text-center">
                                        <x-buttons.remove-button onclick="removeRow(this)" aria-label="Remove row">
                                            <x-icons.removeIcon />
                                        </x-buttons.remove-button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <button type="button" onclick="addRow()"
                                class="flex items-center justify-center w-full gap-2 py-2.5 text-xs text-gray-400 border-t border-dashed border-gray-200 transition hover:text-blue-500 hover:bg-blue-50 hover:border-blue-200">
                            <x-icons.addIcon />
                            Add Row
                        </button>
                    </div>
                </div>

            </div>{{-- /p-6 --}}

            {{-- Footer Actions --}}
            <div class="flex items-center justify-end gap-2 px-6 py-4 bg-gray-50 border-t border-gray-200">
                <a href="{{ url()->previous() }}"
                   class="px-5 py-2 text-sm font-medium text-gray-600 bg-white border border-gray-200 rounded-lg transition hover:bg-gray-100">
                    Cancel
                </a>
                <button type="submit"
                        class="px-6 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg shadow-sm shadow-blue-200 transition hover:bg-blue-700 hover:shadow-blue-300">
                    Save
                </button>
            </div>

        </form>
    </div>

<script>
    // ── Dynamic Table Rows ───────────────────────────────────────────────────────

    /**
     * Appends a clone of the first row and re-numbers all rows.
     */
    function addRow() {
        const tbody     = document.getElementById('info-tbody');
        const firstRow  = tbody.querySelector('tr');
        const newRow    = firstRow.cloneNode(true);

        // Clear all input values in the cloned row
        newRow.querySelectorAll('input').forEach(input => input.value = '');

        tbody.appendChild(newRow);
        renumberRows();
    }

    /**
     * Removes the given row's parent <tr>, keeping at least one row.
     *
     * @param {HTMLElement} button - The remove button inside the row.
     */
    function removeRow(button) {
        const tbody = document.getElementById('info-tbody');

        if (tbody.querySelectorAll('tr').length === 1) return; // Always keep one row

        button.closest('tr').remove();
        renumberRows();
    }

    /**
     * Updates the index cell of each row to reflect its current position.
     */
    function renumberRows() {
        document.querySelectorAll('#info-tbody tr').forEach((row, index) => {
            row.cells[0].textContent = index + 1;
        });
    }
</script>

</x-app-layout>