<x-app-layout title="AstraMC Trucks & Equipments">

    {{-- Breadcrumb --}}
    <div class="mb-5">
        <x-layout.breadcrumb :items="[
            ['label' => 'Dashboard',     'active' => false],
            ['label' => 'Administrator', 'active' => false],
            ['label' => 'User Accounts', 'active' => true],
        ]" />
    </div>

    @php
        $labelClass    = 'block text-[0.68rem] font-bold uppercase tracking-widest text-gray-400 mb-1';
        $inputClass    = 'w-full px-3 py-2.5 text-sm rounded-lg border border-gray-200 bg-white text-gray-800 transition duration-150 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-100 placeholder:text-gray-300';
        $readonlyClass = 'w-full px-3 py-2.5 text-sm rounded-lg border border-gray-100 bg-gray-50 text-gray-400 font-mono cursor-not-allowed focus:outline-none select-none';
    @endphp

    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="space-y-4">

            {{-- ══════════════════════════════════════════════
                 CARD 1 · Identity & Access
            ══════════════════════════════════════════════ --}}
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

                {{-- Card Header --}}
                <div class="flex flex-wrap items-center gap-3 px-6 py-4 border-b border-gray-100">

                    {{-- Back button --}}
                    <x-buttons.prev-link href="{{ route('user-accounts.index') }}" aria-label="Back to User Accounts">
                        <x-icons.prev-icon />
                    </x-buttons.prev-link>

                    {{-- Icon + Title --}}
                    <div class="flex items-center gap-2.5">
                        <span class="flex items-center justify-center w-8 h-8 rounded-lg bg-blue-50 text-blue-500">
                            {{-- user icon --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </span>
                        <div>
                            <h1 class="text-sm font-semibold text-gray-800 leading-tight">New User Account</h1>
                            <p class="text-[0.7rem] text-gray-400">Fill in the details below to create an account</p>
                        </div>
                    </div>

                    <x-badges.status color="yellow" label="Pending" class="ml-auto" />
                </div>

                {{-- Section label --}}
                <div class="flex items-center gap-3 px-6 pt-5 pb-2">
                    <span class="text-[0.68rem] font-bold uppercase tracking-widest text-gray-400">Identity & Role</span>
                    <span class="flex-1 h-px bg-orange-200"></span>
                </div>

                <div class="px-6 pb-6 space-y-5">

                    {{-- Row 1: Employee Name · Employee ID · Position · Role --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4">

                        {{-- Employee Name --}}
                        <div>
                            <label class="{{ $labelClass }}">Employee Name</label>
                            <input type="text" name="employeeName" placeholder="e.g. Juan dela Cruz"
                                   class="{{ $inputClass }}" />
                        </div>

                        {{-- Employee ID (auto-generated) --}}
                        <div>
                            <label class="{{ $labelClass }}">
                                Employee ID
                                <span class="ml-1 text-[0.6rem] font-normal normal-case tracking-normal text-blue-400 bg-blue-50 px-1.5 py-0.5 rounded">Auto-generated</span>
                            </label>
                            <input type="text" name="employeeId" readonly
                                   value="EMP-{{ str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT) }}"
                                   class="{{ $readonlyClass }}" />
                        </div>

                        {{-- Position --}}
                        <div>
                            <label class="{{ $labelClass }}">Position</label>
                            <input type="text" name="position" readonly placeholder="Pulled from HR records"
                                   class="{{ $readonlyClass }}" />
                        </div>

                        {{-- Role --}}
                        <div>
                            <label class="{{ $labelClass }}">System Role</label>
                            <x-forms.select-field name="role" placeholder="Select Role">
                                <option></option>
                                <option></option>
                            </x-forms.select-field>
                        </div>

                    </div>

                    {{-- Row 2: Company · Branch + Signature --}}
                    <div class="grid grid-cols-1 xl:grid-cols-4 gap-4">

                        {{-- Company & Branch stacked --}}
                        <div class="xl:col-span-1 space-y-4">

                            <div>
                                <label class="{{ $labelClass }}">Company</label>
                                <x-forms.select-field name="company" placeholder="Select a Company">
                                    <option></option>
                                    <option></option>
                            </x-forms.select-field>
                            </div>

                            <div>
                                <label class="{{ $labelClass }}">Branch</label>
                                <x-forms.select-field name="branch" placeholder="Select a Branch" />
                            </div>

                        </div>

                        {{-- Signature Upload --}}
                        <div class="xl:col-span-3 rounded-xl border border-dashed border-gray-200 bg-gray-50 overflow-hidden hover:border-blue-300 hover:bg-blue-50/40 transition duration-150 group">
                            <x-forms.image-uploader
                                label="Upload Signature"
                                input-name="signature"
                                accept="image/*"
                                :multiple="true"
                            />
                        </div>

                    </div>

                </div>

            </div>{{-- /card 1 --}}


            {{-- ══════════════════════════════════════════════
                 CARD 2 · Login Credentials
            ══════════════════════════════════════════════ --}}
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">

                {{-- Accent header bar --}}
                <div class="flex items-center gap-2.5 px-6 py-3.5 bg-orange-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-white/80 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <span class="text-xs font-bold uppercase tracking-widest text-white">Login Credentials</span>
                </div>

                <div class="px-6 py-5">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

                        <div>
                            <label class="{{ $labelClass }}">Username</label>
                            <input type="text" name="username" placeholder="e.g. jdelacruz"
                                   autocomplete="off"
                                   class="{{ $inputClass }}" />
                        </div>

                        <div>
                            <label class="{{ $labelClass }}">Password</label>
                            <div class="relative">
                                <input type="password" name="password" id="password" placeholder="••••••••"
                                       autocomplete="new-password"
                                       class="{{ $inputClass }} pr-10" />
                                <button type="button" onclick="togglePwd('password', this)"
                                        class="absolute inset-y-0 right-3 flex items-center text-gray-300 hover:text-gray-500 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div>
                            <label class="{{ $labelClass }}">Confirm Password</label>
                            <div class="relative">
                                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••"
                                       autocomplete="new-password"
                                       class="{{ $inputClass }} pr-10" />
                                <button type="button" onclick="togglePwd('password_confirmation', this)"
                                        class="absolute inset-y-0 right-3 flex items-center text-gray-300 hover:text-gray-500 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                    </div>

                    {{-- Password strength hint --}}
                    <p class="mt-3 text-[0.7rem] text-gray-400">
                        Use at least 8 characters, including uppercase, lowercase, a number, and a symbol.
                    </p>
                </div>

            </div>{{-- /card 2 --}}


            {{-- ══════════════════════════════════════════════
                 Footer Actions
            ══════════════════════════════════════════════ --}}
            <div class="flex items-center justify-end gap-2 pt-1 pb-4">

                <a href="{{ url()->previous() }}"
                   class="px-5 py-2.5 text-sm font-medium text-gray-500 bg-white border border-gray-200 rounded-lg transition hover:bg-gray-50 hover:text-gray-700">
                    Cancel
                </a>

                <button type="submit"
                        class="inline-flex items-center gap-2 px-7 py-2.5 text-sm font-semibold text-white bg-blue-600 rounded-lg shadow-sm shadow-blue-200 transition hover:bg-blue-700 hover:shadow-blue-300 active:scale-[0.98]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                    Save Account
                </button>

            </div>

        </div>{{-- /space-y-4 --}}

    </form>

    {{-- Toggle password visibility --}}
    <script>
        function togglePwd(id, btn) {
            const input = document.getElementById(id);
            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            btn.querySelector('svg').style.opacity = isHidden ? '1' : '0.4';
        }
    </script>

</x-app-layout>