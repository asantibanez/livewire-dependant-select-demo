<div class="m-16 p-8 bg-indigo-100 rounded-lg border border-indigo-200">
    <div>
        <h1 class="text-3xl font-bold text-indigo-700">
            Want to rent a car for your next vacation?
        </h1>
        <p class="py-4 text-gray-800">
            Just pick the model of your liking and we will make it happen!
        </p>
    </div>
    <div class="py-4 grid grid-cols-1 sm:grid-cols-3 col-gap-6 row-gap-4">
        <livewire:select
            title="City"
            :value="$city"
            :options="$cities"
            emitUpEvent="citySelected"
        />

        <livewire:select
            title="Brand"
            :value="$brand"
            :options="$brands"
            key="city-{{ $city ?? 'none' }}-brands"
            emitUpEvent="brandSelected"
        />

        <livewire:select
            title="Model"
            :value="$model"
            :options="$models"
            key="brand-{{ $brand ?? 'none' }}-models"
            emitUpEvent="modelSelected"
        />
    </div>
    <div class="pt-4">
        <button
            class="border rounded-lg text-white p-3 {{ $ready ? 'bg-indigo-500' : ' bg-indigo-200 '}}"
            wire:click="onMakeItRainClick"/>
            Make it RAIN!
        </button>
    </div>

    <div>
        @if($message != null)
            <div class="mt-8 bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
                <p class="text-sm">
                    {{$message}}
                </p>
            </div>
        @endif
    </div>
</div>
