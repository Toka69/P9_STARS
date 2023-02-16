<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <h1 class="text-white text-center mb-6 font-bold">Edit a Star</H1>
        <form method="POST" action="{{ route('stars.update', $star) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <label for="first_name" class="text-white">First Name</label>
            <input
                name="first_name"
                type="text"
                value="{{ old('first_name', $star->first_name) }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-2"
            >
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            <label for="first_name" class="text-white">Last Name</label>
            <input
                name="last_name"
                type="text"
                value="{{ old('last_name', $star->last_name) }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-2"
            >
            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            <label for="first_name" class="text-white">Description</label>
            <textarea
                name="description"
                class="block w-full h-80 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mb-2"
            >{{ old('description', $star->description) }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            @if(isset($file))
                <img src="{{ $file->file_path }}" alt="photo_star" class="mb-2 shadow-2xl object-cover h-[12rem] w-[10rem] rounded object-top">
            @endif
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
