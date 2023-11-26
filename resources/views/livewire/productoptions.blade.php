@props(['product'])
<div>
    <h3 class="mb-4 font-semibold text-gray-900 dark:text-white">Options</h3>
    <div>
        @foreach ($options as $index => $option)
            <div class="mb-4">
                <div class="flex items-center gap-2">
                    <input wire:model="options.{{ $index }}.name" type="text" class="w-48 px-3 py-2 text-sm border rounded-lg" placeholder="Option Name">
                    <input wire:model="options.{{ $index }}.quantity" type="number" class="w-24 px-3 py-2 text-sm border rounded-lg" placeholder="Quantity">
                    <x-secondary-button wire:click="removeOption({{ $index }})">Remove</x-secondary-button>
                </div>
            </div>
        @endforeach
        <x-primary-button wire:click="addOption">Add Option</x-primary-button>
    </div>
    <div class="mt-6 flex justify-end">
        <x-danger-button wire:click="saveOptions">Save Options</x-danger-button>
    </div>
</div>