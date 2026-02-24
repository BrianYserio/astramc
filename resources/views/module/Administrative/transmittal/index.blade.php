<x-app-layout title="AstraMC Trucks & Equipments">

    {{-- Page Header --}}
    <section>
        <div class="flex items-center justify-between mb-4">
            <x-breadcrumb :items="[
                ['label' => 'Administrative', 'active' => false],
                ['label' => 'Transmittal',    'active' => true],
            ]" />

            <a href="{{ route('transmittal.create') }}"
               class="inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md shadow-sm transition duration-200 hover:bg-orange-500 hover:shadow">
                <span class="text-lg leading-none" aria-hidden="true">+</span>
                Add Transmittal
            </a>
        </div>

        {{-- Status Filter Tabs --}}
        @php
            $statusFilters = ['All', 'Pending', 'Received', 'Cancelled'];
        @endphp

        <div class="inline-flex mb-3 overflow-hidden text-xs border border-gray-200 rounded-md">
            @foreach ($statusFilters as $filter)
                <button
                    onclick="filterByStatus('{{ strtolower($filter) }}')"
                    data-filter="{{ strtolower($filter) }}"
                    class="filter-tab px-3 py-1.5 {{ $loop->first ? 'bg-orange-500 text-white font-medium' : 'bg-white text-gray-600 hover:bg-gray-50' }}">
                    {{ $filter }}
                </button>
            @endforeach
        </div>

        {{-- Transmittals Table --}}
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white" id="transmittal-table">
                <thead class="bg-gray-50 whitespace-nowrap">
                    <tr>
                        @foreach (['#', 'TRM No.', 'Date', 'To', 'Subject', 'Prepared By', 'Received By', 'Date Received', 'Status'] as $heading)
                            <th class="{{ $loop->first ? 'pl-4 w-8' : 'p-4 text-left text-sm font-medium text-slate-900' }}">
                                {{ $heading }}
                                @unless ($loop->first)
                                    @include('partials.sort-icon')
                                @endunless
                            </th>
                        @endforeach
                    </tr>
                </thead>

                <tbody class="whitespace-nowrap divide-y divide-gray-200">
                    @foreach ($transmittals as $transmittal)
                        <tr data-status="{{ strtolower($transmittal->status) }}">
                            <td class="pl-4 w-8 text-xs">{{ $transmittal->id }}</td>

                            <td class="p-3 text-xs">
                                <a href="#" class="text-blue-500 hover:text-blue-800">
                                    {{ $transmittal->trn_no }}
                                </a>
                            </td>

                            <td class="p-3 text-xs text-slate-600 font-medium">
                                {{ $transmittal->created_at->format('Y-m-d') }}
                            </td>

                            <td class="px-4 py-3 text-xs text-slate-600 font-medium">{{ $transmittal->sender }}</td>
                            <td class="px-4 py-3 text-xs font-medium">{{ $transmittal->subject }}</td>
                            <td class="px-4 py-3 text-xs font-medium">{{ $transmittal->prepared_by }}</td>
                            <td class="px-4 py-3 text-xs font-medium">{{ $transmittal->received_by }}</td>
                            <td class="px-4 py-3 text-xs font-medium">{{ $transmittal->date_received }}</td>

                            <td class="px-4 py-3 text-xs font-medium">
                                <x-status-badge :status="$transmittal->status" />
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Pagination Controls --}}
        <div class="flex items-center justify-between mt-6 mx-4">
            <p class="text-sm text-slate-500">Showing 1 to 12 of 100 entries</p>

            <div class="flex items-center gap-4">
                <div class="flex items-center gap-2">
                    <label for="per-page" class="text-sm text-slate-500">Display</label>
                    <select id="per-page" class="h-8 px-1 text-sm text-slate-900 border border-gray-300 rounded-md outline-none">
                        @foreach ([5, 10, 20, 50, 100] as $perPage)
                            <option>{{ $perPage }}</option>
                        @endforeach
                    </select>
                </div>

                <nav aria-label="Pagination">
                    <ul class="flex items-center space-x-3">
                        <li>
                            <button class="flex items-center justify-center w-8 h-8 bg-gray-100 rounded-md" aria-label="Previous page">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-400" viewBox="0 0 55.753 55.753" aria-hidden="true">
                                    <path d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z" />
                                </svg>
                            </button>
                        </li>

                        @foreach (range(1, 4) as $page)
                            <li>
                                <button class="flex items-center justify-center h-8 px-[13px] text-sm font-medium rounded-md
                                    {{ $page === 1
                                        ? 'bg-blue-500 text-white border border-blue-500'
                                        : 'text-slate-900 border border-gray-300 hover:border-blue-500' }}">
                                    {{ $page }}
                                </button>
                            </li>
                        @endforeach

                        <li>
                            <button class="flex items-center justify-center w-8 h-8 border border-gray-300 rounded-md hover:border-blue-500" aria-label="Next page">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-400 rotate-180" viewBox="0 0 55.753 55.753" aria-hidden="true">
                                    <path d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z" />
                                </svg>
                            </button>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

<script>
    /**
     * Tracks sort direction per column index (true = ascending).
     * @type {Object.<number, boolean>}
     */
    const columnSortState = {};

    /**
     * Filters table rows by matching their data-status attribute.
     * 'all' shows every row.
     *
     * @param {string} status - The status to filter by (e.g. 'pending', 'all').
     */
    function filterByStatus(status) {
        // Update active tab styling
        document.querySelectorAll('.filter-tab').forEach(tab => {
            const isActive = tab.dataset.filter === status;
            tab.classList.toggle('bg-orange-500', isActive);
            tab.classList.toggle('text-white', isActive);
            tab.classList.toggle('font-medium', isActive);
            tab.classList.toggle('bg-white', !isActive);
            tab.classList.toggle('text-gray-600', !isActive);
        });

        // Show or hide rows based on status
        document.querySelectorAll('#transmittal-table tbody tr').forEach(row => {
            const matchesFilter = status === 'all' || row.dataset.status === status;
            row.classList.toggle('hidden', !matchesFilter);
        });
    }

    /**
     * Sorts the parent table by the column containing the clicked sort icon.
     * Supports both numeric and string comparison.
     *
     * @param {HTMLElement} iconElement - The SVG sort icon that was clicked.
     */
    function sortTable(iconElement) {
        const header    = iconElement.closest('th');
        const table     = header.closest('table');
        const tbody     = table.querySelector('tbody');
        const headers   = [...table.querySelectorAll('th')];
        const colIndex  = headers.indexOf(header);

        columnSortState[colIndex] = !columnSortState[colIndex];
        const isAscending = columnSortState[colIndex];

        const sortedRows = [...tbody.querySelectorAll('tr')].sort((rowA, rowB) => {
            const a = rowA.children[colIndex].textContent.trim();
            const b = rowB.children[colIndex].textContent.trim();

            const bothNumeric = !isNaN(a) && !isNaN(b);

            return bothNumeric
                ? (isAscending ? a - b : b - a)
                : (isAscending ? a.localeCompare(b) : b.localeCompare(a));
        });

        sortedRows.forEach(row => tbody.appendChild(row));
    }
</script>

</x-app-layout>