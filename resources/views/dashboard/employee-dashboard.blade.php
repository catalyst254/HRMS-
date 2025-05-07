@extends('layouts.master')

@section('content')
<div class="pt-20 pb-10 px-6">
    <div class="container mx-auto max-w-screen-xl">

        <!-- Greeting -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Welcome back, {{ Auth::user()->name }} 👋</h2>

        <!-- Dashboard Widgets -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Leave Balance -->
            <div class="bg-white rounded-xl shadow p-5 border">
                <p class="text-sm text-gray-500">Remaining Leave Days</p>
                <p class="text-3xl font-bold text-blue-600 mt-1">12</p>
            </div>

            <!-- Latest Salary -->
            <div class="bg-white rounded-xl shadow p-5 border">
                <p class="text-sm text-gray-500">Last Net Salary</p>
                <p class="text-3xl font-bold text-green-600 mt-1">Ksh 82,000</p>
            </div>

            <!-- Performance Rating -->
            <div class="bg-white rounded-xl shadow p-5 border">
                <p class="text-sm text-gray-500">Performance Rating</p>
                <p class="text-xl font-bold text-yellow-500 mt-1">⭐ Meets Expectations</p>
            </div>

            <!-- Trainings Completed -->
            <div class="bg-white rounded-xl shadow p-5 border">
                <p class="text-sm text-gray-500">Trainings Completed</p>
                <p class="text-3xl font-bold text-purple-600 mt-1">4</p>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Recent Leave Requests -->
            <div class="bg-white rounded-xl shadow p-6 border">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Recent Leave Requests</h3>
                <ul class="space-y-3">
                    <li class="flex justify-between text-sm text-gray-600">
                        <span>Annual Leave - 3 Days</span>
                        <span class="bg-yellow-100 text-yellow-800 px-2 py-0.5 rounded-full">Pending</span>
                    </li>
                    <li class="flex justify-between text-sm text-gray-600">
                        <span>Sick Leave - 1 Day</span>
                        <span class="bg-green-100 text-green-800 px-2 py-0.5 rounded-full">Approved</span>
                    </li>
                </ul>
                <a href="#" class="inline-block mt-4 text-sm text-blue-600 hover:underline">View All</a>
            </div>

            <!-- Latest Payslip -->
            <div class="bg-white rounded-xl shadow p-6 border">
                <h3 class="text-lg font-semibold text-gray-700 mb-4">Latest Payslip</h3>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li><strong>Month:</strong> March 2025</li>
                    <li><strong>Basic:</strong> Ksh 65,000</li>
                    <li><strong>Allowances:</strong> Ksh 20,000</li>
                    <li><strong>Deductions:</strong> Ksh 3,000</li>
                    <li><strong>Net:</strong> <span class="text-green-600 font-bold">Ksh 82,000</span></li>
                </ul>
                <a href="#" class="inline-block mt-4 text-sm text-blue-600 hover:underline">Download PDF</a>
            </div>
        </div>
    </div>
</div>
@endsection
