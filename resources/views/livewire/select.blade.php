<div>
    <label for="country"
           class="block text-sm font-medium leading-5 text-gray-700">
        {{ $title ?? 'No title' }}
    </label>
    <div class="mt-1 rounded-md shadow-sm">
        <select wire:model="value" id="country" class="border rounded appearance-none bg-white p-2 w-full">
            <option value="">Choose a {{ $title ?? 'n option' }}</option>
            @foreach($options ?? [] as $option)
                <option value="{{ $option }}">
                    {{ $option }}
                </option>
            @endforeach
        </select>
    </div>
</div>
