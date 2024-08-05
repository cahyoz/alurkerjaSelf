@extends('layouts.app')

@section('content')
<section class="vh-1 pt-10">
    <div class="container py-5 h-100">
        <ul
            class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 dark:border-gray-700 dark:text-gray-400">
            <li class="me-2">
                <a href="/profile"
                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">basic</a>
            </li>
            <li class="me-2" aria-current="page">
                <a href="#"
                    class="inline-block p-4 text-blue-600 bg-gray-100 rounded-t-lg active dark:bg-gray-800 dark:text-blue-500">Details</a>
            </li>
            <li class="me-2">
                <a href="/password"
                    class="inline-block p-4 rounded-t-lg hover:text-gray-600 hover:bg-gray-50 dark:hover:bg-gray-800 dark:hover:text-gray-300">Password</a>
            </li>
        </ul>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <form method="POST" action="{{ route('complete.registration') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="company_name" class="form-label">{{ __('Company') }}</label>
                    <input list="companies" id="company_name" name="company_name" class="form-control"
                        value="{{ old('company_name', $companyName) }}" required>
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
                    <label for="position_name" class="form-label">{{ __('Position') }}</label>
                    <input list="positions" id="position_name" name="position_name" class="form-control"
                        value="{{ old('position_name', $positionName) }}" required>
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
                    <label for="province_name" class="form-label">{{ __('Province') }}</label>
                    <select id="province_name" name="province_name" class="form-control" required>
                        <option value="" disabled selected>Select a province</option>
                        @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                        @endforeach
                    </select>
                    @error('province_name')
                    <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="city_name" class="form-label">{{ __('City') }}</label>
                    <select id="city_name" name="city_name" class="form-control" required>
                        <option value="" disabled selected>Select a city</option>
                        <!-- Cities will be dynamically loaded here -->
                    </select>
                    @error('city_name')
                    <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <script>
                document.getElementById('province_name').addEventListener('change', function() {
                    var provinceId = this.value;
                    var citySelect = document.getElementById('city_name');
                    citySelect.innerHTML = '<option value="" disabled selected>Loading...</option>';

                    fetch('/get-cities/' + provinceId)
                        .then(response => response.json())
                        .then(cities => {
                            citySelect.innerHTML =
                                '<option value="" disabled selected>Select a city</option>';
                            cities.forEach(city => {
                                var option = document.createElement('option');
                                option.value = city.id;
                                option.textContent = city.name;
                                citySelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching cities:', error);
                            citySelect.innerHTML =
                                '<option value="" disabled selected>Error loading cities</option>';
                        });
                });
                </script>

                <div class="mb-4">
                    <label for="company_size_size" class="form-label">{{ __('Company Size') }}</label>
                    <input list="company_sizes" id="company_size_size" name="company_size_size" class="form-control"
                        value="{{ old('company_size_size', $userCompanySize) }}" required>
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
                    <label for="address_detail" class="form-label">{{ __('Address Detail') }}</label>
                    <textarea id="address_detail" name="address_detail" class="form-control"
                        required>{{ old('address_detail', $addressDetail) }}</textarea>
                    @error('address_detail')
                    <p class="mt-2 text-red-600 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-6">
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-300">
                        {{ __('Complete Update') }}
                    </button>
                </div>
            </form>
        </div>
</section>

<script>
document.getElementById('profilePictureWrapper').addEventListener('click', function() {
    document.getElementById('profilePictureInput').click();
});

document.getElementById('profilePictureInput').addEventListener('change', function() {
    document.getElementById('profilePictureForm').submit();
});

const profilePictureWrapper = document.getElementById('profilePictureWrapper');
const profilePictureOverlay = document.getElementById('profilePictureOverlay');

profilePictureWrapper.addEventListener('mouseover', () => {
    profilePictureOverlay.classList.remove('d-none');
});

profilePictureWrapper.addEventListener('mouseout', () => {
    profilePictureOverlay.classList.add('d-none');
});
</script>
@endsection