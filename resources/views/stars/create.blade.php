<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-white text-center mb-6 font-bold">Create a Star</H1>
        <form method="POST" action="{{ route('stars.store') }}" enctype="multipart/form-data">
            @csrf
            <input
                name="first_name"
                type="text"
                placeholder="{{ __('Enter a first name!') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-2"
            >
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            <input
                name="last_name"
                type="text"
                placeholder="{{ __('Enter a last name!') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-2"
            >
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            <textarea
                name="description"
                placeholder="{{ __('Enter a description!') }}"
                class="block w-full h-80 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-2"
            >{{ old('description') }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            @include('shared.uploadfile')
            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
                <x-danger-button>
                    <a href="{{ route('stars.index') }}" class="btn btn-danger delete-user">{{ __('Cancel') }}</a>
                </x-danger-button>
            </div>
        </form>
    </div>
</x-app-layout>
