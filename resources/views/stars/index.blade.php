<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <x-primary-button>
           <a href="{{ route('stars.create') }}">Add a {{ __('Star') }}</a>
        </x-primary-button>
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($stars as $star)
                <div class="p-6 flex space-x-2">
                    <img src="{{ $star->file?->file_path }}" alt="photo_star" class="mb-2 shadow-2xl object-cover h-[6rem] w-[5rem] rounded object-top">
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800">{{ $star->first_name }}</span>
                                <span class="text-gray-800">{{ $star->last_name }}</span>
                                @unless ($star->created_at->eq($star->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                                @endunless
                            </div>
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('stars.edit', $star)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>
                                    @if ($star->user->is(auth()->user()))
                                        <form method="POST" action="{{ route('stars.destroy', $star) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('stars.destroy', $star)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    @endif
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>





