@isset($count)
    <div class="container mt-5 text-center">
        <h3>Livewire Counter</h3>
        <p>{{ $count }}</p>
        <button class="btn btn-success" wire:click="increment">+</button>
        <button class="btn btn-primary" wire:click="default">Reset</button>
        <button class="btn btn-danger" wire:click="decrement">-</button>
    </div>
@endisset
