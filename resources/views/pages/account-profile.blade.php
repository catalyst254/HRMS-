@extends('layouts.master')
@section('content')
<!-- Page-content -->
<div class="group-data-[sidebar-size=lg]:ltr:md:ml-vertical-menu group-data-[sidebar-size=lg]:rtl:md:mr-vertical-menu group-data-[sidebar-size=md]:ltr:ml-vertical-menu-md group-data-[sidebar-size=md]:rtl:mr-vertical-menu-md group-data-[sidebar-size=sm]:ltr:ml-vertical-menu-sm group-data-[sidebar-size=sm]:rtl:mr-vertical-menu-sm pt-[calc(theme('spacing.header')*_1)] pb-[calc(theme('spacing.header')0.8)] px-4 group-data-[navbar=bordered]:pt-[calc(theme('spacing.header')1.3)] group-data-[navbar=hidden]:pt-0 group-data-[layout=horizontal]:mx-auto group-data-[layout=horizontal]:max-w-screen-2xl group-data-[layout=horizontal]:px-0 group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:ltr:md:ml-auto group-data-[layout=horizontal]:group-data-[sidebar-size=lg]:rtl:md:mr-auto group-data-[layout=horizontal]:md:pt-[calc(theme('spacing.header')1.6)] group-data-[layout=horizontal]:px-3 group-data-[layout=horizontal]:group-data-[navbar=hidden]:pt-[calc(theme('spacing.header')_0.9)]">
    <div class="container-fluid group-data-[content=boxed]:max-w-boxed mx-auto">
        <div class="mt-1 -ml-3 -mr-3 rounded-none card">
            <div class="card-body !px-2.5">
                <div class="grid grid-cols-1 gap-5 lg:grid-cols-12 2xl:grid-cols-12">
                    <div class="lg:col-span-2 2xl:col-span-1">
                        @if(!empty($profileDetail->name))
                        @php
                        $fullName = $profileDetail->name;
                        $parts = explode(' ', $fullName);
                        $initials = '';
                        foreach ($parts as $part) {
                        $initials .= strtoupper(substr($part, 0, 1));
                        }
                        @endphp
                        @endif
                        <div class="relative inline-block rounded-full shadow-md size-20 bg-slate-100 profile-user xl:size-28">
                            @if(!empty($profileDetail->avatar))
                            <img src="{{ URL::to('assets/images/user/'.$profileDetail->avatar) }}" alt="" class="object-cover border-0 rounded-full img-thumbnail user-profile-image">
                            @elseif($profileDetail->avatar === null)
                            <div class="flex items-center justify-center font-medium rounded-full size-10 shrink-0 bg-slate-200 text-slate-800 dark:text-zink-50 dark:bg-zink-600">
                                {{ $initials }}
                            </div>
                            @else
                            <img src="{{ URL::to('assets/images/user/'.Session::get('avatar')) }}" alt="" class="object-cover border-0 rounded-full img-thumbnail user-profile-image">
                            @endif
                            <div class="absolute bottom-0 flex items-center justify-center rounded-full size-8 ltr:right-0 rtl:left-0 profile-photo-edit">
                                <input id="profile-img-file-input" type="file" class="hidden profile-img-file-input">
                                <label for="profile-img-file-input" class="flex items-center justify-center bg-white rounded-full shadow-lg cursor-pointer size-8 dark:bg-zink-600 profile-photo-edit">
                                    <i data-lucide="image-plus" class="size-4 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-500"></i>
                                </label>
                            </div>
                        </div>
                    </div><!--end col-->
                    <div class="lg:col-span-10 2xl:col-span-9">
                        <h5 class="mb-1">
                            @if(!empty($profileDetail->name))
                            {{ $profileDetail->name }}
                            @else
                            {{ Session::get('name') }}
                            @endif
                            <i data-lucide="badge-check" class="inline-block size-4 text-sky-500 fill-sky-100 dark:fill-custom-500/20"></i>
                        </h5>
                        <div class="flex gap-3 mb-4">
                            <p class="text-slate-500 dark:text-zink-200"><i data-lucide="user-circle" class="inline-block size-4 ltr:mr-1 rtl:ml-1 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-500"></i>
                                @if(!empty($profileDetail->position))
                                {{ $profileDetail->position }}
                                @elseif($profileDetail->position === null)
                                N/A
                                @else
                                {{ Session::get('name') }}
                                @endif
                            </p>
                            <p class="text-slate-500 dark:text-zink-200"><i data-lucide="map-pin" class="inline-block size-4 ltr:mr-1 rtl:ml-1 text-slate-500 dark:text-zink-200 fill-slate-100 dark:fill-zink-500"></i>
                                @if(!empty($profileDetail->location))
                                {{ $profileDetail->location }}
                                @elseif($profileDetail->location === null)
                                N/A
                                @else
                                {{ Session::get('location') }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <!--end grid-->
            </div>
            {{-- RIGHT PANEL --}}
            <div class="lg:col-span-9 space-y-6">

                {{-- Row 1: Basic & Employee Details --}}
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
                    {{-- Basic Info --}}
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-4 font-semibold text-gray-700">Basic Information</h6>
                            <table class="w-full text-sm text-gray-700">
                                <tbody>
                                    <tr><th class="py-2">Full Name</th><td>{{ $profileDetail->name ?? 'N/A' }}</td></tr>
                                    <tr><th class="py-2">Phone No</th><td>{{ $profileDetail->phone_number ?? 'N/A' }}</td></tr>
                                    <tr><th class="py-2">Email</th><td>{{ $profileDetail->email ?? 'N/A' }}</td></tr>
                                    <tr><th class="py-2">Gender</th><td>{{ ucfirst($profileDetail->gender ?? 'N/A') }}</td></tr>
                                    <tr><th class="py-2">Date of Birth</th><td>{{ $profileDetail->dob ?? 'N/A' }}</td></tr>
                                    <tr><th class="py-2">National ID NO</th><td>{{ $profileDetail->username ?? 'N/A' }}</td></tr>
                                    <tr><th class="py-2">Nationality</th><td>{{ $profileDetail->nationality ?? 'N/A' }}</td></tr>
                                    <tr><th class="py-2">Joining Date</th>
                                        <td>
                                            @if(!empty($profileDetail->join_date))
                                                {{ \Carbon\Carbon::parse($profileDetail->join_date)->format('d M, Y') }}
                                                <span class="text-xs text-gray-500">({{ \Carbon\Carbon::parse($profileDetail->join_date)->diffForHumans() }})</span>
                                            @else N/A
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Employee Details --}}
                    <div class="card">
                        <div class="card-body">
                            <h6 class="mb-4 font-semibold text-gray-700">Employee Details</h6>
                            <table class="w-full text-sm text-gray-700">
                                <tbody>
                                    <tr><th class="py-2">Role</th><td>{{ $profileDetail->role_name ?? 'N/A' }}</td></tr>
                                    <tr><th class="py-2">Department</th><td>{{ $profileDetail->department ?? 'N/A' }}</td>
                                    </tr>
                                    <tr><th class="py-2">Job Title</th><td>{{ $profileDetail->phone_number ?? 'N/A' }}</td></tr>
                                    <tr><th class="py-2">Employee ID</th><td>{{ $profileDetail->employee_id ?? 'N/A' }}</td></tr>
                                    <tr><th class="py-2">Date Hired</th><td>{{ ucfirst($profileDetail->gender ?? 'N/A') }}</td></tr>
                                    <tr><th class="py-2">Supervisor</th><td>{{ $profileDetail->supervisor ?? 'N/A' }}</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Row 2: Contact & Address --}}
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-4 font-semibold text-gray-700">Contact & Address</h6>
                        <table class="w-full text-sm text-gray-700">
                            <tbody>
                                <tr><th class="py-2">Postal Address</th><td>{{ $profileDetail->name ?? 'N/A' }}</td></tr>
                                <tr><th class="py-2">Residential Address</th><td>{{ $profileDetail->username ?? 'N/A' }}</td></tr>
                                <tr><th class="py-2">Emergency Contact</th><td>{{ $profileDetail->phone_number ?? 'N/A' }}</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

@section('script')
<!-- pages-account init js-->
<script src="{{ URL::to('assets/js/pages/pages-account.init.js') }}"></script>
@endsection
@endsection