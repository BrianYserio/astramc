<x-app-layout title="AstraMC Trucks & Equipments">

    {{-- ── Breadcrumb ──────────────────────────────────────────────────────── --}}
    <div class="mb-5">
        <x-layout.breadcrumb :items="[
            ['label' => 'Dashboard',      'active' => false],
            ['label' => 'Human Resource', 'active' => false],
            ['label' => 'Employees',      'active' => true],
        ]" />
    </div>

    @php
        $styles = [
            'label'    => 'block text-[0.68rem] font-bold uppercase tracking-widest text-gray-400 mb-1',
            'input'    => 'w-full px-3 py-2.5 text-sm rounded-lg border border-gray-200 bg-white text-gray-800
                           transition duration-150 focus:outline-none focus:border-blue-500 focus:ring-2
                           focus:ring-blue-100 placeholder:text-gray-300',
            'readonly' => 'w-full px-3 py-2.5 text-sm rounded-lg border border-orange-300 bg-gray-100
                           text-gray-400 font-mono cursor-not-allowed focus:outline-none select-none',
            'compact'  => 'h-8 text-xs',
            'error' => 'border-red-500 text-red-500 text-sm mt-1'
        ];

        $leaveTypes = [
            'vl' => ['label' => 'VL'],
            'sl' => ['label' => 'SL'],
            'bl' => ['label' => 'BL'],
            'el' => ['label' => 'EL'],
            'ml' => ['label' => 'ML'],
            'pl' => ['label' => 'PL'],
        ];

        $workDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    @endphp

    {{-- ── FIX 1: previewImage() defined here ─────────────────────────────── --}}
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = function (e) {
                // FIX 2: targets the img by id="profile-preview"
                document.getElementById('profile-preview').src = e.target.result;
            };
            reader.readAsDataURL(file);
        }

        // FIX 3: Select-All properly dispatches 'change' so CSS peer state updates
        function toggleAllDays(checked) {
            document.querySelectorAll('.day-checkbox').forEach(cb => {
                if (cb.checked !== checked) {
                    cb.checked = checked;
                    cb.dispatchEvent(new Event('change'));
                }
            });
        }
    </script>

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="space-y-4">

            {{-- ══════════════════════════════════════════════════════════════ --}}
            {{-- Card: Personal Background                                      --}}
            {{-- ══════════════════════════════════════════════════════════════ --}}
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

                <div class="flex flex-wrap items-center gap-3 px-6 py-4 border-b border-gray-100">

                    <x-buttons.prev-link href="{{ route('employees.store') }}" aria-label="Back to Employees">
                        <x-icons.prev-icon />
                    </x-buttons.prev-link>

                    <div class="flex items-center gap-2.5">
                        <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <div>
                            <h1 class="text-sm font-semibold text-gray-800 leading-tight">New Employee</h1>
                            <p class="text-[0.7rem] text-gray-400">Fill in the details below to create an account</p>
                        </div>
                    </div>

                    <x-badges.status color="yellow" label="Pending" class="ml-auto" />
                </div>

                <div class="flex items-center gap-3 px-6 pt-5 pb-2">
                    <span class="text-[0.68rem] font-bold uppercase tracking-widest text-gray-400">
                        Personal Background
                    </span>
                    <span class="flex-1 h-px bg-orange-200" aria-hidden="true"></span>
                </div>

                <div class="px-6 py-5">
                    <div class="flex flex-col lg:flex-row gap-6">

                        <div class="flex-1">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                                <div>
                                    <label class="{{ $styles['label'] }}">
                                        Employee ID
                                        <span class="ml-1 text-[0.6rem] font-normal normal-case tracking-normal text-blue-400 bg-blue-50 px-1.5 py-0.5 rounded">Auto-generated</span>
                                    </label>
                                    <input type="text" name="employee_id" value="{{ $employeeIdPreview }}" readonly
                                           class="{{ $styles['readonly'] }} {{ $styles['compact'] }}" />
                                </div>

                                <div>
                                    <label for="first_name" class="{{ $styles['label'] }}">First Name</label>
                                    <input id="first_name" type="text" name="firstName"
                                           value="{{ old('firstName') }}"
                                           class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                                    @error('firstName')
                                        <p class="{{ $styles['error'] }}">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="middle_name" class="{{ $styles['label'] }}">Middle Name</label>
                                    <input id="middle_name" type="text" name="middleName"
                                           value="{{ old('middleName') }}"
                                           class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                                    @error('middleName')
                                        <p class="{{ $styles['error'] }}">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="last_name" class="{{ $styles['label'] }}">Last Name</label>
                                    <input id="last_name" type="text" name="lastName"
                                           value="{{ old('lastName') }}"
                                           class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                                    @error('lastName')
                                        <p class="{{ $styles['error'] }}">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="birthdate" class="{{ $styles['label'] }}">Birthdate</label>
                                    <input id="birthdate" type="date" name="birthdate"
                                           value="{{ old('birthdate') }}"
                                           class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                                </div>

                                <div>
                                    <label class="{{ $styles['label'] }}">Gender</label>
                                    <x-forms.select-field name="gender" class="{{ $styles['compact'] }}">
                                        <option value="">Select Gender</option>
                                        @foreach($credentials['genders'] as $gender)
                                            <option value="{{ $gender }}" @selected(old('gender') == $gender)>{{ $gender }}</option>
                                        @endforeach
                                    </x-forms.select-field>
                                </div>

                                <div>
                                    <label class="{{ $styles['label'] }}">Civil Status</label>
                                    <x-forms.select-field name="civil_status" class="{{ $styles['compact'] }}">
                                        <option value="">Select Status</option>
                                        @foreach($credentials['civil_status'] as $cstatus)
                                            <option value="{{ $cstatus }}" @selected(old('civil_status') == $cstatus)>{{ $cstatus }}</option>
                                        @endforeach
                                    </x-forms.select-field>
                                </div>

                                <div>
                                    <label class="{{ $styles['label'] }}">Citizenship</label>
                                    <x-forms.select-field name="citizenship" class="{{ $styles['compact'] }}">
                                        <option value="">Select Status</option>
                                        @foreach($credentials['citizenships'] as $citizenship)
                                            <option value="{{ $citizenship }}" @selected(old('citizenship') == $citizenship)>{{ $citizenship }}</option>
                                        @endforeach
                                    </x-forms.select-field>
                                </div>

                                <div>
                                    <label for="contact_number" class="{{ $styles['label'] }}">Contact No.</label>
                                    {{-- FIX 4: type="string" is invalid HTML, changed to type="tel" --}}
                                    <input id="contact_number" type="tel" name="contactNumber"
                                           value="{{ old('contactNumber') }}"
                                           class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                                </div>

                                <div>
                                    <label for="email" class="{{ $styles['label'] }}">Email</label>
                                    <input id="email" type="email" name="email"
                                           value="{{ old('email') }}"
                                           class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="address" class="{{ $styles['label'] }}">Complete Address</label>
                                    <input id="address" type="text" name="caddress"
                                           value="{{ old('caddress') }}"
                                           class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                                </div>

                            </div>
                        </div>

                        {{-- Profile photo upload ────────────────────────────── --}}
                        <div class="w-full lg:w-48 flex-shrink-0">
                            <div class="border border-gray-300 rounded p-2 flex flex-col items-center">
                                <div class="w-32 h-32 mb-4">
                                    {{-- FIX 2: added id="profile-preview" so previewImage() can target it --}}
                                    <img id="profile-preview"
                                         src="{{ asset('assets/img/avatar5.png') }}"
                                         class="opacity-80 w-full h-full object-cover"
                                         alt="Default profile avatar" />
                                </div>

                                {{-- FIX 1: hidden input + button triggers it via onclick --}}
                                <input type="file"
                                       name="profile_image"
                                       id="profile_image"
                                       accept="image/*"
                                       class="hidden"
                                       onchange="previewImage(event)" />

                                <button type="button"
                                        onclick="document.getElementById('profile_image').click()"
                                        class="w-full bg-orange-500 text-white py-2 rounded text-sm font-medium hover:bg-orange-600 transition">
                                    Upload Image
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>{{-- /card: personal background --}}


            {{-- ══════════════════════════════════════════════════════════════ --}}
            {{-- Card: Employment Information                                   --}}
            {{-- ══════════════════════════════════════════════════════════════ --}}
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

                <x-cards.accent-header icon="lock" title="Employment Information" />

                <div class="px-6 pt-5 pb-6">
                    <div class="grid grid-cols-1 sm:grid-cols-3 xl:grid-cols-6 gap-4">

                        <div>
                            <label for="date_hired" class="{{ $styles['label'] }}">Date Hired</label>
                            <input id="date_hired" type="date" name="date_hired"
                                   value="{{ old('date_hired') }}"
                                   class="{{ $styles['input'] }} text-xs" />
                        </div>

                        <div>
                            <label class="{{ $styles['label'] }}">Company</label>
                            <x-forms.select-field name="company" class="{{ $styles['compact'] }}">
                                <option value="">Select Company</option>
                                @foreach($credentials['companies'] as $company)
                                    <option value="{{ $company }}" @selected(old('company') == $company)>{{ $company }}</option>
                                @endforeach
                            </x-forms.select-field>
                        </div>

                        <div>
                            <label class="{{ $styles['label'] }}">Destination</label>
                            <x-forms.select-field name="destination" class="{{ $styles['compact'] }}">
                                <option value="">Select Destination</option>
                                @foreach($credentials['destinations'] as $destination)
                                    <option value="{{ $destination }}" @selected(old('destination') == $destination)>{{ $destination }}</option>
                                @endforeach
                            </x-forms.select-field>
                        </div>

                        <div>
                            <label class="{{ $styles['label'] }}">Level</label>
                            <x-forms.select-field name="level" class="{{ $styles['compact'] }}">
                                <option value="">Select Level</option>
                                @foreach($credentials['levels'] as $level)
                                    <option value="{{ $level }}" @selected(old('level') == $level)>{{ $level }}</option>
                                @endforeach
                            </x-forms.select-field>
                        </div>

                        <div>
                            <label class="{{ $styles['label'] }}">Position</label>
                            <x-forms.select-field name="position" class="{{ $styles['compact'] }}">
                                <option value="">Select Position</option>
                                @foreach($credentials['positions'] as $position)
                                    <option value="{{ $position }}" @selected(old('position') == $position)>{{ $position }}</option>
                                @endforeach
                            </x-forms.select-field>
                        </div>

                        <div>
                            <label class="{{ $styles['label'] }}">Sub-designation</label>
                            <x-forms.select-field name="sub_designation">
                                <option>N/A</option>
                            </x-forms.select-field>
                        </div>

                        <div>
                            <label class="{{ $styles['label'] }}">Status</label>
                            <x-forms.select-field name="employment_status">
                                <option value="">Select Status</option>
                                @foreach ($credentials['emp_status'] as $emp_s)
                                    <option value="{{ $emp_s }}" @selected(old('employment_status') == $emp_s)>{{ $emp_s }}</option>
                                @endforeach
                            </x-forms.select-field>
                        </div>

                        <div>
                            <label for="date_status" class="{{ $styles['label'] }}">Date Status</label>
                            <input id="date_status" type="date" name="date_status"
                                   value="{{ old('date_status') }}"
                                   class="{{ $styles['input'] }} text-xs" />
                        </div>

                        <div>
                            <label class="{{ $styles['label'] }}">Assigned Location</label>
                            <x-forms.select-field name="assigned_location" class="{{ $styles['compact'] }}">
                                <option value="">Select Location</option>
                                @foreach ($credentials['locations'] as $location)
                                    <option value="{{ $location }}" @selected(old('assigned_location') == $location)>{{ $location }}</option>
                                @endforeach
                            </x-forms.select-field>
                        </div>

                        {{-- Leave credit inputs ──────────────────────────────── --}}
                        <div class="xl:col-span-3">
                            <div class="grid grid-cols-6 gap-1">
                                @foreach ($leaveTypes as $key => $leave)
                                    <div>
                                        <label for="leave_{{ $key }}"
                                            class="text-[10px] font-semibold text-gray-600 uppercase mb-1 block">
                                            {{ $leave['label'] }}
                                        </label>
                                        <input readonly
                                            id="leave_{{ $key }}"
                                            type="number"
                                            name="{{ $key }}"
                                            value="0"
                                            class="w-full px-2 py-1 text-xs border rounded bg-gray-100 border-orange-300"
                                        />
                                        @if ($key === 'vl')
                                            <span class="block mt-0.5 text-[0.6rem] font-normal normal-case tracking-normal text-blue-400 bg-blue-50 px-1.5 py-0.5 rounded leading-tight">
                                                5 converted to cash
                                            </span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

            </div>{{-- /card: employment information --}}


            {{-- ══════════════════════════════════════════════════════════════ --}}
            {{-- Card: Healthcare Availment                                     --}}
            {{-- ══════════════════════════════════════════════════════════════ --}}
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

                <x-cards.accent-header icon="lock" title="Healthcare Availment" />

                <div class="px-6 pt-5 pb-6">
                    <div class="grid grid-cols-1 sm:grid-cols-3 xl:grid-cols-5 gap-4">

                        <div>
                            <label for="dental" class="{{ $styles['label'] }}">Dental</label>
                            <input id="dental" type="text" value="0.00" name="dental" readonly
                                    class="{{ $styles['readonly'] }} {{ $styles['compact'] }}" />
                        </div>

                        <div>
                            <label for="optical" class="{{ $styles['label'] }}">Optical</label>
                            <input id="optical" type="text" value="0.00" name="optical" readonly
                                    class="{{ $styles['readonly'] }} {{ $styles['compact'] }}" />
                        </div>

                        <div>
                            <label for="medicines" class="{{ $styles['label'] }}">Medicines</label>
                            <input id="medicines" type="text" value="0.00" name="medicines" readonly
                                    class="{{ $styles['readonly'] }} {{ $styles['compact'] }}" />
                            <span class="block mt-0.5 text-[0.8rem] font-normal normal-case tracking-normal text-blue-400 bg-blue-50 px-1.5 py-0.5 rounded leading-tight">
                                (Balance): 8,000.00
                            </span>
                        </div>

                        <div>
                            <label for="healthcare_position" class="{{ $styles['label'] }}">Out-Patient Services</label>
                            <input id="healthcare_position" type="text" value="0.00" name="healthcare_position" readonly
                                    class="{{ $styles['readonly'] }} {{ $styles['compact'] }}" />
                        </div>

                        <div>
                            <label for="healthcare_sub_destination" class="{{ $styles['label'] }}">Hospitalization/Confinement</label>
                            <input id="healthcare_sub_destination" type="text" value="0.00" name="healthcare_sub_destination" readonly
                                    class="{{ $styles['readonly'] }} {{ $styles['compact'] }}" />
                        </div>

                    </div>
                </div>

            </div>{{-- /card: healthcare availment --}}


            {{-- ══════════════════════════════════════════════════════════════ --}}
            {{-- Card: Government Identification                                --}}
            {{-- ══════════════════════════════════════════════════════════════ --}}
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

                <x-cards.accent-header icon="lock" title="Government Identification" />

                <div class="px-6 pt-5 pb-6">
                    <div class="grid grid-cols-1 sm:grid-cols-3 xl:grid-cols-4 gap-4">

                        <div>
                            <label for="pagibig" class="{{ $styles['label'] }}">Pag-IBIG</label>
                            <input id="pagibig" type="text" name="pagibigNumber"
                                   value="{{ old('pagibigNumber') }}"
                                   class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                        </div>

                        <div>
                            <label for="philhealth" class="{{ $styles['label'] }}">PhilHealth</label>
                            <input id="philhealth" type="text" name="philhealthNumber"
                                   value="{{ old('philhealthNumber') }}"
                                   class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                        </div>

                        <div>
                            <label for="sss" class="{{ $styles['label'] }}">SSS</label>
                            <input id="sss" type="text" name="sssNumber"
                                   value="{{ old('sssNumber') }}"
                                   class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                        </div>

                        <div>
                            <label for="tin" class="{{ $styles['label'] }}">TIN</label>
                            <input id="tin" type="text" name="tinNumber"
                                   value="{{ old('tinNumber') }}"
                                   class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                        </div>

                    </div>
                </div>

            </div>{{-- /card: government identification --}}


            {{-- ══════════════════════════════════════════════════════════════ --}}
            {{-- Card: Work Schedule                                            --}}
            {{-- ══════════════════════════════════════════════════════════════ --}}
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

                <x-cards.accent-header icon="lock" title="Work Schedule" />

                <div class="px-6 pt-5 pb-6">

                    <div class="grid grid-cols-2 sm:grid-cols-4 xl:grid-cols-7 gap-x-4 gap-y-6">
                        @foreach ($workDays as $day)
                            @php $dayKey = strtolower($day); @endphp

                            <div class="flex flex-col gap-2">

                                <div class="flex items-center gap-2">
                                    <input id="day_{{ $dayKey }}"
                                        type="checkbox"
                                        name="work_days[]"
                                        value="{{ $dayKey }}"
                                        class="hidden peer day-checkbox"
                                        @if(in_array($dayKey, $selectedDays ?? [])) checked @endif />

                                    <label for="day_{{ $dayKey }}"
                                        class="relative flex items-center justify-center p-1 w-5 h-5 cursor-pointer
                                                border-2 border-green-500 rounded overflow-hidden shrink-0
                                                peer-checked:before:hidden
                                                before:block before:absolute before:w-full before:h-full before:bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-full fill-blue-500"
                                            viewBox="0 0 520 520" aria-hidden="true">
                                            <path d="M79.423 240.755a47.529 47.529 0 0 0-36.737 77.522l120.73 147.894a43.136
                                                    43.136 0 0 0 36.066 16.009c14.654-.787 27.884-8.626
                                                    36.319-21.515L486.588 56.773a6.13 6.13 0 0 1 .128-.2c2.353-3.613
                                                    1.59-10.773-3.267-15.271a13.321 13.321 0 0 0-19.362
                                                    1.343q-.135.166-.278.327L210.887 328.736a10.961 10.961 0 0
                                                    1-15.585.843l-83.94-76.386a47.319 47.319 0 0 0-31.939-12.438z" />
                                        </svg>
                                    </label>

                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-700">{{ $day }}</span>
                                </div>

                                <div class="flex flex-col gap-1">
                                    <label for="time_in_{{ $dayKey }}" class="text-xs text-gray-500">Time in:</label>
                                    <input id="time_in_{{ $dayKey }}"
                                        type="time"
                                        name="time_in[{{ $dayKey }}]"
                                        class="day-time-in w-full text-xs border border-gray-300 rounded px-2 py-1
                                                text-gray-700 focus:outline-none focus:ring-1 focus:ring-orange-400
                                                focus:border-orange-400" />
                                </div>

                                <div class="flex flex-col gap-1">
                                    <label for="time_out_{{ $dayKey }}" class="text-xs text-gray-500">Time out:</label>
                                    <input id="time_out_{{ $dayKey }}"
                                        type="time"
                                        name="time_out[{{ $dayKey }}]"
                                        class="day-time-out w-full text-xs border border-gray-300 rounded px-2 py-1
                                                text-gray-700 focus:outline-none focus:ring-1 focus:ring-orange-400
                                                focus:border-orange-400" />
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 flex flex-wrap items-center gap-4 border-t border-gray-100 pt-4">

                        {{-- FIX 3: Select All now uses toggleAllDays() which dispatches change events --}}
                        <div class="flex items-center gap-2">
                            <input id="select_all_days"
                                type="checkbox"
                                class="hidden peer"
                                onchange="toggleAllDays(this.checked)" />

                            <label for="select_all_days"
                                class="relative flex items-center justify-center p-1 w-5 h-5 cursor-pointer
                                        border-2 border-green-500 rounded overflow-hidden shrink-0
                                        peer-checked:before:hidden
                                        before:block before:absolute before:w-full before:h-full before:bg-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-full fill-blue-500"
                                    viewBox="0 0 520 520" aria-hidden="true">
                                    <path d="M79.423 240.755a47.529 47.529 0 0 0-36.737 77.522l120.73 147.894a43.136
                                            43.136 0 0 0 36.066 16.009c14.654-.787 27.884-8.626
                                            36.319-21.515L486.588 56.773a6.13 6.13 0 0 1 .128-.2c2.353-3.613
                                            1.59-10.773-3.267-15.271a13.321 13.321 0 0 0-19.362
                                            1.343q-.135.166-.278.327L210.887 328.736a10.961 10.961 0 0
                                            1-15.585.843l-83.94-76.386a47.319 47.319 0 0 0-31.939-12.438z" />
                                </svg>
                            </label>

                            <span class="text-sm text-gray-600">Select All</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <label for="global_time_in" class="text-sm text-gray-600 whitespace-nowrap">Time In:</label>
                            <input id="global_time_in"
                                type="time"
                                class="text-sm border border-gray-300 rounded px-3 py-1.5 text-gray-700
                                        focus:outline-none focus:ring-1 focus:ring-orange-400 focus:border-orange-400"
                                onchange="document.querySelectorAll('.day-time-in').forEach(el => el.value = this.value)" />
                        </div>

                        <div class="flex items-center gap-2">
                            <label for="global_time_out" class="text-sm text-gray-600 whitespace-nowrap">Time Out:</label>
                            <input id="global_time_out"
                                type="time"
                                class="text-sm border border-gray-300 rounded px-3 py-1.5 text-gray-700
                                        focus:outline-none focus:ring-1 focus:ring-orange-400 focus:border-orange-400"
                                onchange="document.querySelectorAll('.day-time-out').forEach(el => el.value = this.value)" />
                        </div>

                    </div>

                </div>

            </div>{{-- /card: work schedule --}}


            {{-- ── Footer Actions ──────────────────────────────────────────── --}}
            <div class="flex items-center justify-end gap-2 pt-1 pb-4">
                <button type="submit"
                        class="inline-flex items-center gap-2 px-7 py-2.5 text-sm font-semibold text-white
                               bg-blue-600 rounded-lg shadow-sm shadow-blue-200 transition
                               hover:bg-blue-700 hover:shadow-blue-300 active:scale-[0.98]">
                    Save Employee
                </button>
            </div>

        </div>{{-- /space-y-4 --}}

    </form>

</x-app-layout>
