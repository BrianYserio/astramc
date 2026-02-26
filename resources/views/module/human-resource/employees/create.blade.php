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
        // ── Shared input style tokens ─────────────────────────────────────────
        $styles = [
            'label'    => 'block text-[0.68rem] font-bold uppercase tracking-widest text-gray-400 mb-1',
            'input'    => 'w-full px-3 py-2.5 text-sm rounded-lg border border-gray-200 bg-white text-gray-800
                           transition duration-150 focus:outline-none focus:border-blue-500 focus:ring-2
                           focus:ring-blue-100 placeholder:text-gray-300',
            'readonly' => 'w-full px-3 py-2.5 text-sm rounded-lg border border-gray-100 bg-gray-50
                           text-gray-400 font-mono cursor-not-allowed focus:outline-none select-none',
            'compact'  => 'h-8 text-xs',
        ];

        // ── Leave credit types ────────────────────────────────────────────────
        $leaveTypes = [
            'vl' => ['label' => 'VL'],
            'sl' => ['label' => 'SL'],
            'bl' => ['label' => 'BL'],
            'el' => ['label' => 'EL'],
            'ml' => ['label' => 'ML'],
            'pl' => ['label' => 'PL'],
        ];

        // ── Work-schedule days ────────────────────────────────────────────────
        $workDays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
    @endphp

    <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="space-y-4">

            {{-- ══════════════════════════════════════════════════════════════ --}}
            {{-- Card: Personal Background                                      --}}
            {{-- ══════════════════════════════════════════════════════════════ --}}
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

                {{-- Card header ─────────────────────────────────────────────── --}}
                <div class="flex flex-wrap items-center gap-3 px-6 py-4 border-b border-gray-100">

                    <x-buttons.prev-link href="{{ route('user-accounts.index') }}" aria-label="Back to Employees">
                        <x-icons.prev-icon />
                    </x-buttons.prev-link>

                    <div class="flex items-center gap-2.5">
                        <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-500">
                            {{-- User silhouette icon --}}
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

                {{-- Section divider ─────────────────────────────────────────── --}}
                <div class="flex items-center gap-3 px-6 pt-5 pb-2">
                    <span class="text-[0.68rem] font-bold uppercase tracking-widest text-gray-400">
                        Personal Background
                    </span>
                    <span class="flex-1 h-px bg-orange-200" aria-hidden="true"></span>
                </div>

                <div class="px-6 py-5">
                    <div class="flex flex-col lg:flex-row gap-6">

                        {{-- Personal detail fields ──────────────────────────── --}}
                        <div class="flex-1">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                                {{-- Auto-generated; not user-editable --}}
                                <div>
                                    <label class="{{ $styles['label'] }}">
                                        Employee ID
                                        <span class="ml-1 text-[0.6rem] font-normal normal-case tracking-normal text-blue-400 bg-blue-50 px-1.5 py-0.5 rounded">Auto-generated</span>
                                    </label>
                                    <input type="text" name="employee_id" readonly
                                           class="{{ $styles['readonly'] }} {{ $styles['compact'] }}" />
                                </div>

                                <div>
                                    <label for="first_name" class="{{ $styles['label'] }}">First Name</label>
                                    <input id="first_name" type="text" name="firstName"
                                           class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                                </div>

                                <div>
                                    <label for="middle_name" class="{{ $styles['label'] }}">Middle Name</label>
                                    <input id="middle_name" type="text" name="middleName"
                                           class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                                </div>

                                <div>
                                    <label for="last_name" class="{{ $styles['label'] }}">Last Name</label>
                                    <input id="last_name" type="text" name="lastName"
                                           class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                                </div>

                                <div>
                                    <label for="birthdate" class="{{ $styles['label'] }}">Birthdate</label>
                                    <input id="birthdate" type="date" name="birthdate"
                                           class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                                </div>

                                <div>
                                    <label class="{{ $styles['label'] }}">Gender</label>
                                    <x-forms.select-field name="gender" class="{{ $styles['compact'] }}">
                                        <option value="">Select Gender</option>
                                        @foreach($genders as $gender)
                                            <option value="{{ $gender }}">{{ $gender }}</option>
                                        @endforeach
                                    </x-forms.select-field>
                                </div>

                                <div>
                                    <label class="{{ $styles['label'] }}">Civil Status</label>
                                    <x-forms.select-field name="civil_status" class="{{ $styles['compact'] }}">
                                        <option value="">Select Status</option>
                                        @foreach($status as $s)
                                            <option value="{{ $s }}">{{ $s }}</option>
                                        @endforeach
                                    </x-forms.select-field>
                                </div>

                                <div>
                                    <label class="{{ $styles['label'] }}">Citizenship</label>
                                    <x-forms.select-field name="citizenship" class="{{ $styles['compact'] }}">
                                        <option value="">Select Status</option>
                                        @foreach($citizenship as $citizenships)
                                            <option value="{{ $citizenships }}">{{ $citizenships }}</option>
                                        @endforeach
                                    </x-forms.select-field>
                                </div>

                                <div>
                                    <label for="contact_number" class="{{ $styles['label'] }}">Contact No.</label>
                                    <input id="contact_number" type="string" name="contactNumber"
                                           class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                                </div>

                                <div>
                                    <label for="email" class="{{ $styles['label'] }}">Email</label>
                                    <input id="email" type="email" name="email"
                                           class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                                </div>

                                <div class="sm:col-span-2">
                                    <label for="address" class="{{ $styles['label'] }}">Complete Address</label>
                                    <input id="address" type="text" name="caddress"
                                           class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                                </div>

                            </div>
                        </div>

                        {{-- Profile photo upload ────────────────────────────── --}}
                        <div class="w-full lg:w-48 flex-shrink-0">
                            <div class="border border-gray-300 rounded p-2 flex flex-col items-center">
                                <div class="w-32 h-32 mb-4">
                                    <img src="{{ asset('assets/img/avatar5.png') }}"
                                         class="opacity-80"
                                         alt="Default profile avatar" />
                                </div>
                                <input type="file" name="profile_image" id="profile_image" class="hidden" onchange="previewImage(event)">
                                <button type="button"
                                        class="w-full bg-orange-500 text-white py-2 rounded text-sm font-medium">
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
                                   class="{{ $styles['input'] }} text-xs" />
                        </div>

                        <div>
                            <label class="{{ $styles['label'] }}">Company</label>
                            <x-forms.select-field name="company" class="{{ $styles['compact'] }}">
                                <option value="">Select Status</option>
                                @foreach($companies as $company)
                                    <option value="{{ $company }}">{{ $company }}</option>
                                @endforeach
                            </x-forms.select-field>
                        </div>

                        <div>
                            <label class="{{ $styles['label'] }}">Destination</label>
                            <x-forms.select-field name="destination" class="{{ $styles['compact'] }}">
                                <option value="">Select Destination</option>
                                @foreach($destinations as $destination)
                                    <option value="{{ $destination }}">{{ $destination }}</option>
                                @endforeach
                            </x-forms.select-field>
                        </div>

                        <div>
                            <label class="{{ $styles['label'] }}">Level</label>
                            <x-forms.select-field name="level" placeholder="Select Level" />
                        </div>

                        <div>
                            <label class="{{ $styles['label'] }}">Position</label>
                            <x-forms.select-field name="position" class="{{ $styles['compact'] }}">
                                <option value="">Select Status</option>
                                @foreach($positions as $position)
                                    <option value="{{ $position }}">{{ $position }}</option>
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
                                <option>Probationary</option>
                                <option>Regular</option>
                            </x-forms.select-field>
                        </div>

                        <div>
                            <label for="date_status" class="{{ $styles['label'] }}">Date Status</label>
                            <input id="date_status" type="date" name="date_status"
                                   class="{{ $styles['input'] }} text-xs" />
                        </div>

                        <div>
                            <label class="{{ $styles['label'] }}">Assigned Location</label>
                            <x-forms.select-field name="assigned_location" class="{{ $styles['compact'] }}">
                                <option value="">Select Location</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location }}">{{$location}}</option>
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
                                        @isset($leave['note'])
                                            <span class="lowercase font-normal text-[9px] text-gray-400 block leading-none">
                                                ({{ $leave['note'] }})
                                            </span>
                                        @endisset
                                    </label>
                                    <input readonly
                                        id="leave_{{ $key }}"
                                        type="number"
                                        name="{{ $key }}"
                                        value="0"
                                        class="w-full px-2 py-1 text-xs border rounded
                                            {{ ($leave['highlight'] ?? false)
                                                ? 'border-blue-400 shadow-sm'
                                                : 'bg-gray-50 border-gray-200' }}"
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
                            <label class="{{ $styles['label'] }}">Dental</label>
                            <x-forms.select-field name="healthcare_company" placeholder="Select Company" />
                        </div>

                        <div>
                            <label class="{{ $styles['label'] }}">Optical</label>
                            <x-forms.select-field name="healthcare_designation" placeholder="Select Designation" />
                        </div>

                        <div>
                            <label class="{{ $styles['label'] }}">Medicines (Balance): 8,000.00</label>
                            <x-forms.select-field name="healthcare_level" placeholder="Select Level" />
                        </div>

                        <div>
                            <label class="{{ $styles['label'] }}">Out-Patient Services</label>
                            <x-forms.select-field name="healthcare_position" placeholder="Select Position" />
                        </div>

                        <div>
                            <label class="{{ $styles['label'] }}">Hospitalization/Confinement</label>
                            <x-forms.select-field name="healthcare_sub_designation">
                                <option>N/A</option>
                            </x-forms.select-field>
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
                            <input id="pagibig" type="text" name="pagibig"
                                   class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                        </div>

                        <div>
                            <label for="philhealth" class="{{ $styles['label'] }}">PhilHealth</label>
                            <input id="philhealth" type="text" name="philhealth"
                                   class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                        </div>

                        <div>
                            <label for="sss" class="{{ $styles['label'] }}">SSS</label>
                            <input id="sss" type="text" name="sss"
                                   class="{{ $styles['input'] }} {{ $styles['compact'] }}" />
                        </div>

                        <div>
                            <label for="tin" class="{{ $styles['label'] }}">TIN</label>
                            <input id="tin" type="text" name="tin"
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
                    <div class="grid grid-cols-1 sm:grid-cols-3 xl:grid-cols-7 gap-4">

                        @foreach ($workDays as $day)
                            @php $dayKey = strtolower($day); @endphp

                            <div class="flex items-center gap-3">

                                {{-- Custom styled checkbox; unique id per day --}}
                                <input id="day_{{ $dayKey }}"
                                       type="checkbox"
                                       name="work_days[]"
                                       value="{{ $dayKey }}"
                                       class="hidden peer"
                                       checked />

                                <label for="day_{{ $dayKey }}"
                                       class="relative flex items-center justify-center p-1 w-6 h-6 cursor-pointer
                                              border-2 border-orange-500 rounded-md overflow-hidden
                                              peer-checked:before:hidden
                                              before:block before:absolute before:w-full before:h-full before:bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-full fill-orange-500"
                                         viewBox="0 0 520 520" aria-hidden="true">
                                        <path d="M79.423 240.755a47.529 47.529 0 0 0-36.737 77.522l120.73 147.894a43.136
                                                 43.136 0 0 0 36.066 16.009c14.654-.787 27.884-8.626
                                                 36.319-21.515L486.588 56.773a6.13 6.13 0 0 1 .128-.2c2.353-3.613
                                                 1.59-10.773-3.267-15.271a13.321 13.321 0 0 0-19.362
                                                 1.343q-.135.166-.278.327L210.887 328.736a10.961 10.961 0 0
                                                 1-15.585.843l-83.94-76.386a47.319 47.319 0 0 0-31.939-12.438z" />
                                    </svg>
                                </label>

                                <span class="text-sm text-gray-700">{{ $day }}</span>

                            </div>
                        @endforeach

                    </div>
                </div>

            </div>{{-- /card: work schedule --}}


            {{-- ── Footer Actions ──────────────────────────────────────────── --}}
            <div class="flex items-center justify-end gap-2 pt-1 pb-4">

                <a href="{{ url()->previous() }}"
                   class="px-5 py-2.5 text-sm font-medium text-gray-500 bg-white border border-gray-200
                          rounded-lg transition hover:bg-gray-50 hover:text-gray-700">
                    Cancel
                </a>

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
