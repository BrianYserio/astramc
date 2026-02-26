<nav class="bg-[#f9f9f9] h-screen fixed top-0 left-0 min-w-[240px] py-6 px-4 overflow-auto">

    {{-- Logo --}}
    <a href="#">
        <img src="{{ asset('assets/img/new-astra-logo.png') }}" alt="Astra Logo" class="w-[200px]" />
    </a>

        {{-- ========== Management ========== --}}
    <x-navigation.sidebar-section label="Transaction" />

    {{-- Dashboard --}}
    <ul class="mt-2">
        <li>
            <x-navigation.sidebar-sub-link href="{{ route('dashboard') }}" label="Dashboard">
                <x-icons.dashboard />
            </x-navigation.sidebar-sub-link>
        </li>
    </ul>

    {{-- Administrative --}}
    <x-navigation.sidebar-group label="Administrative">
        <x-navigation.sidebar-sub-link href="{{ route('transmittal.index') }}" label="Transmittal" />
        <x-navigation.sidebar-sub-link href="{{ route('adjustment-request.index') }}" label="Adjustment Request" />
        <x-navigation.sidebar-sub-link href="{{ route('it-service-request.index') }}" label="IT Service Request" />
        <x-navigation.sidebar-sub-link href="{{ route('marketing-service-request.index') }}" label="Marketing Service Request" />
        <x-navigation.sidebar-sub-link href="{{ route('product-service-request.index') }}" label="Product Display Request" />
        <x-navigation.sidebar-sub-link href="{{ route('corrective-action-request.index') }}" label="Corrective Action Request" />
    </x-navigation.sidebar-group>

    {{-- Importation --}}
    <x-navigation.sidebar-group label="Importation" :collapsed="true">
        <x-navigation.sidebar-sub-link href="{{ route('shipment-order.index') }}" label="Shipment Order" />
        <x-navigation.sidebar-sub-link href="{{ route('shipment-registry.index') }}" label="Shipment Registry" />
        <x-navigation.sidebar-sub-link href="#" label="Import Fund" />
        <x-navigation.sidebar-sub-link href="#" label="Shipment Monitoring" />
    </x-navigation.sidebar-group>

    {{-- Registration --}}
    <x-navigation.sidebar-group label="Registration" :collapsed="true">
        <x-navigation.sidebar-sub-link href="#" label="Request For Registration" />
        <x-navigation.sidebar-sub-link href="#" label="Registration Fund (Old)" />
        <x-navigation.sidebar-sub-link href="#" label="Registration Fund (New)" />
        <x-navigation.sidebar-sub-link href="#" label="RGF Replenishment" />
        <x-navigation.sidebar-sub-link href="#" label="Transfer Of Ownership Fund" />
        <x-navigation.sidebar-sub-link href="#" label="Registration Monitoring" />
    </x-navigation.sidebar-group>

    {{-- ========== Management ========== --}}
    <x-navigation.sidebar-section label="Management" />

    {{-- Warehouse --}}
    <x-navigation.sidebar-group label="Warehouse" :collapsed="true">
        <x-navigation.sidebar-sub-link href="#" label="Units" />
        <x-navigation.sidebar-sub-link href="#" label="Attachments" />
        <x-navigation.sidebar-sub-link href="#" label="Items" />
    </x-navigation.sidebar-group>

    {{-- Sales --}}
    <x-navigation.sidebar-group label="Sales" :collapsed="true">
        <x-navigation.sidebar-sub-link href="#" label="Clients" />
        <x-navigation.sidebar-sub-link href="#" label="Agents" />
        <x-navigation.sidebar-sub-link href="#" label="Financing Company" />
    </x-navigation.sidebar-group>

    {{-- Production | Service --}}
    <x-navigation.sidebar-group label="Production | Service" :collapsed="true">
        <x-navigation.sidebar-sub-link href="#" label="Add-Ons Service" />
        <x-navigation.sidebar-sub-link href="#" label="Contractor" />
    </x-navigation.sidebar-group>

    {{-- Purchasing --}}
    <x-navigation.sidebar-group label="Purchasing" :collapsed="true">
        <x-navigation.sidebar-sub-link href="#" label="Import Supplier" />
        <x-navigation.sidebar-sub-link href="#" label="Local Supplier" />
        <x-navigation.sidebar-sub-link href="#" label="Supplier" />
        <x-navigation.sidebar-sub-link href="#" label="Office Equipments" />
        <x-navigation.sidebar-sub-link href="#" label="Furniture & Fixture" />
        <x-navigation.sidebar-sub-link href="#" label="Marketing" />
        <x-navigation.sidebar-sub-link href="#" label="Service Units" />
        <x-navigation.sidebar-sub-link href="#" label="Employee Benefits" />
        <x-navigation.sidebar-sub-link href="#" label="Production Equipments" />
    </x-navigation.sidebar-group>

    {{-- Accounting --}}
    <x-navigation.sidebar-group label="Accounting" :collapsed="true">
        <x-navigation.sidebar-sub-link href="#" label="Generated Toll" />
        <x-navigation.sidebar-sub-link href="#" label="Generated Fuel" />
    </x-navigation.sidebar-group>

       {{-- Human Resource --}}
    <x-navigation.sidebar-group label="Human Resource" :collapsed="true">
        <x-navigation.sidebar-sub-link href="{{route('employees.index')}}" label="Employees" />
    </x-navigation.sidebar-group>

       {{-- Administrator --}}
    <x-navigation.sidebar-group label="Administrator" :collapsed="true">
        <x-navigation.sidebar-sub-link href="{{route('user-accounts.index')}}" label="User Accounts" />
        <x-navigation.sidebar-sub-link href="{{route('user-logs.index')}}" label="User Logs" />
    </x-navigation.sidebar-group>

    {{-- Account Actions --}}
    <x-navigation.sidebar-group label="Account" :collapsed="true">
        <x-navigation.sidebar-sub-link href="{{ route('profile.edit') }}" label="Profile">
            <x-icons.profileIcon />
        </x-navigation.sidebar-sub-link>

        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-navigation.sidebar-sub-link
                    href="{{ route('logout') }}"
                    label="Log Out"
                    onclick="event.preventDefault(); this.closest('form').submit();"
                />
            </form>
        </li>
    </x-navigation.sidebar-group>

</nav>