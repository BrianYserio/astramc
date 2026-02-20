<x-app-layout title="AstraMC Trucks & Equipments">
    
    <section>
        
        <div class="flex items-center justify-between mb-4">
            <div>
              <x-breadcrumb :items="[
                    ['label' => 'Administrative', 'active' => false],
                    ['label' => 'Transmittal', 'active' => true]
                ]" />
            </div>

            <a href="{{ route('transmittal.create') }}"
            class="inline-flex items-center gap-2 bg-blue-500 hover:bg-orange-500 
                    text-white text-sm font-medium 
                    px-4 py-2 rounded-md 
                    shadow-sm hover:shadow 
                    transition duration-200">
                <span class="text-lg leading-none">+</span>
                Add Transmittal
            </a>

        </div>

        <div class="inline-flex border border-gray-200 rounded-md overflow-hidden mb-3 text-xs">
            <button class="px-3 py-1.5 bg-orange-500 text-white font-medium">
                All
            </button>
            <button class="px-3 py-1.5 bg-white text-gray-600 hover:bg-gray-50">
                Pending
            </button>
            <button class="px-3 py-1.5 bg-white text-gray-600 hover:bg-gray-50">
                Received
            </button>
            <button class="px-3 py-1.5 bg-white text-gray-600 hover:bg-gray-50">
                Cancelled
            </button>
        </div>


        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-50 whitespace-nowrap">
                <tr>
                    <th class="pl-4 w-8">
                    #
                    </th>
                    <th class="p-4 text-left text-sm font-medium text-slate-900">
                    TRM No.
                    <svg onclick="sortTable(this)" xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-gray-500 inline cursor-pointer ml-2"
                        viewBox="0 0 401.998 401.998">
                        <path
                        d="M73.092 164.452h255.813c4.949 0 9.233-1.807 12.848-5.424 3.613-3.616 5.427-7.898 5.427-12.847s-1.813-9.229-5.427-12.85L213.846 5.424C210.232 1.812 205.951 0 200.999 0s-9.233 1.812-12.85 5.424L60.242 133.331c-3.617 3.617-5.424 7.901-5.424 12.85 0 4.948 1.807 9.231 5.424 12.847 3.621 3.617 7.902 5.424 12.85 5.424zm255.813 73.097H73.092c-4.952 0-9.233 1.808-12.85 5.421-3.617 3.617-5.424 7.898-5.424 12.847s1.807 9.233 5.424 12.848L188.149 396.57c3.621 3.617 7.902 5.428 12.85 5.428s9.233-1.811 12.847-5.428l127.907-127.906c3.613-3.614 5.427-7.898 5.427-12.848 0-4.948-1.813-9.229-5.427-12.847-3.614-3.616-7.899-5.42-12.848-5.42z"
                        data-original="#000000" />
                    </svg>
                    </th>
                    <th class="p-4 text-left text-sm font-medium text-slate-900">
                    Date
                    <svg onclick="sortTable(this)" xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-gray-500 inline cursor-pointer ml-2"
                        viewBox="0 0 401.998 401.998">
                        <path
                        d="M73.092 164.452h255.813c4.949 0 9.233-1.807 12.848-5.424 3.613-3.616 5.427-7.898 5.427-12.847s-1.813-9.229-5.427-12.85L213.846 5.424C210.232 1.812 205.951 0 200.999 0s-9.233 1.812-12.85 5.424L60.242 133.331c-3.617 3.617-5.424 7.901-5.424 12.85 0 4.948 1.807 9.231 5.424 12.847 3.621 3.617 7.902 5.424 12.85 5.424zm255.813 73.097H73.092c-4.952 0-9.233 1.808-12.85 5.421-3.617 3.617-5.424 7.898-5.424 12.847s1.807 9.233 5.424 12.848L188.149 396.57c3.621 3.617 7.902 5.428 12.85 5.428s9.233-1.811 12.847-5.428l127.907-127.906c3.613-3.614 5.427-7.898 5.427-12.848 0-4.948-1.813-9.229-5.427-12.847-3.614-3.616-7.899-5.42-12.848-5.42z"
                        data-original="#000000" />
                    </svg>
                    </th>
                    <th class="p-4 text-left text-sm font-medium text-slate-900">
                    To
                    <svg onclick="sortTable(this)" xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-gray-500 inline cursor-pointer ml-2"
                        viewBox="0 0 401.998 401.998">
                        <path
                        d="M73.092 164.452h255.813c4.949 0 9.233-1.807 12.848-5.424 3.613-3.616 5.427-7.898 5.427-12.847s-1.813-9.229-5.427-12.85L213.846 5.424C210.232 1.812 205.951 0 200.999 0s-9.233 1.812-12.85 5.424L60.242 133.331c-3.617 3.617-5.424 7.901-5.424 12.85 0 4.948 1.807 9.231 5.424 12.847 3.621 3.617 7.902 5.424 12.85 5.424zm255.813 73.097H73.092c-4.952 0-9.233 1.808-12.85 5.421-3.617 3.617-5.424 7.898-5.424 12.847s1.807 9.233 5.424 12.848L188.149 396.57c3.621 3.617 7.902 5.428 12.85 5.428s9.233-1.811 12.847-5.428l127.907-127.906c3.613-3.614 5.427-7.898 5.427-12.848 0-4.948-1.813-9.229-5.427-12.847-3.614-3.616-7.899-5.42-12.848-5.42z"
                        data-original="#000000" />
                    </svg>
                    </th>
                    <th class="p-4 text-left text-sm font-medium text-slate-900">
                    Subject
                    <svg onclick="sortTable(this)" xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-gray-500 inline cursor-pointer ml-2"
                        viewBox="0 0 401.998 401.998">
                        <path
                        d="M73.092 164.452h255.813c4.949 0 9.233-1.807 12.848-5.424 3.613-3.616 5.427-7.898 5.427-12.847s-1.813-9.229-5.427-12.85L213.846 5.424C210.232 1.812 205.951 0 200.999 0s-9.233 1.812-12.85 5.424L60.242 133.331c-3.617 3.617-5.424 7.901-5.424 12.85 0 4.948 1.807 9.231 5.424 12.847 3.621 3.617 7.902 5.424 12.85 5.424zm255.813 73.097H73.092c-4.952 0-9.233 1.808-12.85 5.421-3.617 3.617-5.424 7.898-5.424 12.847s1.807 9.233 5.424 12.848L188.149 396.57c3.621 3.617 7.902 5.428 12.85 5.428s9.233-1.811 12.847-5.428l127.907-127.906c3.613-3.614 5.427-7.898 5.427-12.848 0-4.948-1.813-9.229-5.427-12.847-3.614-3.616-7.899-5.42-12.848-5.42z"
                        data-original="#000000" />
                    </svg>
                    </th>
                    <th class="p-4 text-left text-sm font-medium text-slate-900">
                    Prepared By
                    <svg onclick="sortTable(this)" xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-gray-500 inline cursor-pointer ml-2"
                        viewBox="0 0 401.998 401.998">
                        <path
                        d="M73.092 164.452h255.813c4.949 0 9.233-1.807 12.848-5.424 3.613-3.616 5.427-7.898 5.427-12.847s-1.813-9.229-5.427-12.85L213.846 5.424C210.232 1.812 205.951 0 200.999 0s-9.233 1.812-12.85 5.424L60.242 133.331c-3.617 3.617-5.424 7.901-5.424 12.85 0 4.948 1.807 9.231 5.424 12.847 3.621 3.617 7.902 5.424 12.85 5.424zm255.813 73.097H73.092c-4.952 0-9.233 1.808-12.85 5.421-3.617 3.617-5.424 7.898-5.424 12.847s1.807 9.233 5.424 12.848L188.149 396.57c3.621 3.617 7.902 5.428 12.85 5.428s9.233-1.811 12.847-5.428l127.907-127.906c3.613-3.614 5.427-7.898 5.427-12.848 0-4.948-1.813-9.229-5.427-12.847-3.614-3.616-7.899-5.42-12.848-5.42z"
                        data-original="#000000" />
                    </svg>
                    </th>
                    <th class="p-4 text-left text-sm font-medium text-slate-900">
                    Received By
                    <svg onclick="sortTable(this)" xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-gray-500 inline cursor-pointer ml-2"
                        viewBox="0 0 401.998 401.998">
                        <path
                        d="M73.092 164.452h255.813c4.949 0 9.233-1.807 12.848-5.424 3.613-3.616 5.427-7.898 5.427-12.847s-1.813-9.229-5.427-12.85L213.846 5.424C210.232 1.812 205.951 0 200.999 0s-9.233 1.812-12.85 5.424L60.242 133.331c-3.617 3.617-5.424 7.901-5.424 12.85 0 4.948 1.807 9.231 5.424 12.847 3.621 3.617 7.902 5.424 12.85 5.424zm255.813 73.097H73.092c-4.952 0-9.233 1.808-12.85 5.421-3.617 3.617-5.424 7.898-5.424 12.847s1.807 9.233 5.424 12.848L188.149 396.57c3.621 3.617 7.902 5.428 12.85 5.428s9.233-1.811 12.847-5.428l127.907-127.906c3.613-3.614 5.427-7.898 5.427-12.848 0-4.948-1.813-9.229-5.427-12.847-3.614-3.616-7.899-5.42-12.848-5.42z"
                        data-original="#000000" />
                    </svg>
                    </th>
                    <th class="p-4 text-left text-sm font-medium text-slate-900">
                    Date Received
                    <svg onclick="sortTable(this)" xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-gray-500 inline cursor-pointer ml-2"
                        viewBox="0 0 401.998 401.998">
                        <path
                        d="M73.092 164.452h255.813c4.949 0 9.233-1.807 12.848-5.424 3.613-3.616 5.427-7.898 5.427-12.847s-1.813-9.229-5.427-12.85L213.846 5.424C210.232 1.812 205.951 0 200.999 0s-9.233 1.812-12.85 5.424L60.242 133.331c-3.617 3.617-5.424 7.901-5.424 12.85 0 4.948 1.807 9.231 5.424 12.847 3.621 3.617 7.902 5.424 12.85 5.424zm255.813 73.097H73.092c-4.952 0-9.233 1.808-12.85 5.421-3.617 3.617-5.424 7.898-5.424 12.847s1.807 9.233 5.424 12.848L188.149 396.57c3.621 3.617 7.902 5.428 12.85 5.428s9.233-1.811 12.847-5.428l127.907-127.906c3.613-3.614 5.427-7.898 5.427-12.848 0-4.948-1.813-9.229-5.427-12.847-3.614-3.616-7.899-5.42-12.848-5.42z"
                        data-original="#000000" />
                    </svg>
                    </th>
                    <th class="p-4 text-left text-sm font-medium text-slate-900">
                    Status
                    <svg onclick="sortTable(this)" xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 fill-gray-500 inline cursor-pointer ml-2"
                        viewBox="0 0 401.998 401.998">
                        <path
                        d="M73.092 164.452h255.813c4.949 0 9.233-1.807 12.848-5.424 3.613-3.616 5.427-7.898 5.427-12.847s-1.813-9.229-5.427-12.85L213.846 5.424C210.232 1.812 205.951 0 200.999 0s-9.233 1.812-12.85 5.424L60.242 133.331c-3.617 3.617-5.424 7.901-5.424 12.85 0 4.948 1.807 9.231 5.424 12.847 3.621 3.617 7.902 5.424 12.85 5.424zm255.813 73.097H73.092c-4.952 0-9.233 1.808-12.85 5.421-3.617 3.617-5.424 7.898-5.424 12.847s1.807 9.233 5.424 12.848L188.149 396.57c3.621 3.617 7.902 5.428 12.85 5.428s9.233-1.811 12.847-5.428l127.907-127.906c3.613-3.614 5.427-7.898 5.427-12.848 0-4.948-1.813-9.229-5.427-12.847-3.614-3.616-7.899-5.42-12.848-5.42z"
                        data-original="#000000" />
                    </svg>
                    </th>
                </tr>
                </thead>

                <tbody class="whitespace-nowrap divide-y divide-gray-200">
                @foreach ($transmittals as $transmittal)
                  
                <tr>
                    <td class="pl-4 w-8 text-xs">
                        {{$transmittal->id}}
                    </td>
                    <td class="p-3 text-xs">
                        <a href="#" class="text-blue-500 hover:text-blue-800">{{$transmittal->trn_no}}</a>
                    </td>
                    <td class="p-3 text-xs text-slate-600 font-medium">
                        {{$transmittal->created_at}}
                    </td>
                    <td class="px-4 py-3 text-xs text-slate-600 font-medium">
                        {{$transmittal->sender}}
                    </td>
                    <td class="px-4 py-3 text-xs font-medium">
                        {{$transmittal->subject}}
                    </td>
                    <td class="px-4 py-3 text-xs font-medium">
                        {{$transmittal->prepared_by}}
                    </td>
                    <td class="px-4 py-3 text-xs font-medium">
                        {{$transmittal->received_by}}
                    </td>
                    <td class="px-4 py-3 text-xs font-medium">
                        {{$transmittal->date_received}}
                    </td>
                    <td class="px-4 py-3 text-xs font-medium">
                       <span class="@if($transmittal->status == 'approved') bg-green-50 text-green-700
                                  @elseif($transmittal->status == 'pending') bg-yellow-100 text-yellow-700
                                  @else bg-red-50 text-red-700 @endif rounded-full px-3 py-1.5">
                          {{ $transmittal->status }}
                      </span>
                    </td>
                </tr>

                @endforeach
                </tbody>
            </table>
        </div>

        <div class="md:flex mt-6 m-4">
            <p class="text-sm text-slate-500 flex-1">Showing 1 to 12 of 100 entries</p>

            <div class="flex items-center max-md:mt-4">
                <p class="text-sm text-slate-500">Display</p>
                <select class="text-sm text-slate-900 border border-gray-300 rounded-md h-8 mx-4 px-1 outline-none">
                    <option>5</option>
                    <option>10</option>
                    <option>20</option>
                    <option>50</option>
                    <option>100</option>
                </select>

                <ul class="flex space-x-3 justify-center">
                    <li class="flex items-center justify-center shrink-0 bg-gray-100 w-8 h-8 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-400" viewBox="0 0 55.753 55.753">
                            <path d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z" data-original="#000000" />
                        </svg>
                    </li>
                    <li class="flex items-center justify-center shrink-0 bg-blue-500 border hover:border-blue-500 border-blue-500 cursor-pointer text-sm font-medium text-white px-[13px] h-8 rounded-md">1</li>
                    <li class="flex items-center justify-center shrink-0 border border-gray-300 hover:border-blue-500 cursor-pointer text-sm font-medium text-slate-900 px-[13px] h-8 rounded-md">2</li>
                    <li class="flex items-center justify-center shrink-0 border border-gray-300 hover:border-blue-500 cursor-pointer text-sm font-medium text-slate-900 px-[13px] h-8 rounded-md">3</li>
                    <li class="flex items-center justify-center shrink-0 border border-gray-300 hover:border-blue-500 cursor-pointer text-sm font-medium text-slate-900 px-[13px] h-8 rounded-md">4</li>
                    <li class="flex items-center justify-center shrink-0 border border-gray-300 hover:border-blue-500 cursor-pointer w-8 h-8 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 fill-gray-400 rotate-180" viewBox="0 0 55.753 55.753">
                            <path d="M12.745 23.915c.283-.282.59-.52.913-.727L35.266 1.581a5.4 5.4 0 0 1 7.637 7.638L24.294 27.828l18.705 18.706a5.4 5.4 0 0 1-7.636 7.637L13.658 32.464a5.367 5.367 0 0 1-.913-.727 5.367 5.367 0 0 1-1.572-3.911 5.369 5.369 0 0 1 1.572-3.911z" data-original="#000000" />
                        </svg>
                    </li>
                </ul>
            </div>
        </div>

    </section>

<script>
    let sortStates = {};

    function sortTable(svg) {
        const th = svg.closest('th');
        const table = th.closest('table');
        const tbody = table.querySelector('tbody');

        const headers = Array.from(table.querySelectorAll('th'));
        const colIndex = headers.indexOf(th);

        sortStates[colIndex] = !sortStates[colIndex];
        const asc = sortStates[colIndex];

        const rows = Array.from(tbody.querySelectorAll('tr'));
        rows.sort((a, b) => {
            const aText = a.children[colIndex].textContent.trim();
            const bText = b.children[colIndex].textContent.trim();

            if (!isNaN(aText) && !isNaN(bText)) {
                return asc ? aText - bText : bText - aText;
            } else {
                return asc ? aText.localeCompare(bText) : bText.localeCompare(aText);
            }
        });

        rows.forEach(row => tbody.appendChild(row));
    }
</script>

</x-app-layout>