@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-md bg-gray-900 dark:bg-gray-800 shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-gray-100 text-center">
                {{ __('Complete Registration') }}</h2>

            <form method="POST" action="{{ route('complete.registration') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="company_name"
                        class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Company') }}</label>
                    <input list="companies" id="company_name" name="company_name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 @error('company_name') border-red-500 @enderror"
                        value="{{ old('company_name') }}" required>
                    <datalist id="companies">
                        @foreach ($companies as $company)
                            <option value="{{ $company->name }}"></option>
                        @endforeach
                    </datalist>
                    @error('company_name')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="position_name"
                        class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Position') }}</label>
                    <input list="positions" id="position_name" name="position_name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 @error('position_name') border-red-500 @enderror"
                        value="{{ old('position_name') }}" required>
                    <datalist id="positions">
                        @foreach ($positions as $position)
                            <option value="{{ $position->name }}"></option>
                        @endforeach
                    </datalist>
                    @error('position_name')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="province_name"
                        class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Province') }}</label>
                    <input list="provinces" id="province_name" name="province_name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 @error('province_name') border-red-500 @enderror"
                        value="{{ old('province_name') }}" required>
                    <datalist id="provinces">
                        @foreach ($provinces as $province)
                            <option value="{{ $province->name }}"></option>
                        @endforeach
                    </datalist>
                    @error('province_name')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="city_name"
                        class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('City') }}</label>
                    <input list="cities" id="city_name" name="city_name"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 @error('city_name') border-red-500 @enderror"
                        value="{{ old('city_name') }}" required>
                    <datalist id="cities">
                        @foreach ($cities as $city)
                            <option value="{{ $city->name }}"></option>
                        @endforeach
                    </datalist>
                    @error('city_name')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="company_size_size"
                        class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Company Size') }}</label>
                    <input list="company_sizes" id="company_size_size" name="company_size_size"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 @error('company_size_size') border-red-500 @enderror"
                        value="{{ old('company_size_size') }}" required>
                    <datalist id="company_sizes">
                        @foreach ($companysizes as $companySize)
                            <option value="{{ $companySize->size }}"></option>
                        @endforeach
                    </datalist>
                    @error('company_size_size')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="address_detail"
                        class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Address Detail') }}</label>
                    <textarea id="address_detail" name="address_detail"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 @error('address_detail') border-red-500 @enderror"
                        required>{{ old('address_detail') }}</textarea>
                    @error('address_detail')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="whatsapp_number"
                        class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('WhatsApp Number') }}</label>
                    <input id="whatsapp_number" name="whatsapp_number" type="text"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 @error('whatsapp_number') border-red-500 @enderror"
                        value="{{ old('whatsapp_number') }}">
                    @error('whatsapp_number')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="profile_picture"
                        class="block text-gray-700 dark:text-gray-300 text-sm font-medium mb-2">{{ __('Profile Picture') }}</label>
                    <input id="profile_picture" name="profile_picture" type="file"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 @error('profile_picture') border-red-500 @enderror">
                    @error('profile_picture')
                        <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-6">
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                        {{ __('Complete Registration') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
