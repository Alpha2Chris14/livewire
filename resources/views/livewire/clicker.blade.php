<div>
    @if (session('success'))
        <span class="px-3 py-3 bg-green-600 round text-white">{{ session('success') }}</span>
    @endif
    <form class="p-5" wire:submit='handleClicker'>
        <input class="block rounded border border-gray-100 px-3 py-1 mb-1" type="text" wire:model='name' name="name"
            placeholder="name">
        @error('name')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
        <input class="block rounded border border-gray-100 px-3 py-1 mb-1" type="email" wire:model='email'
            name="email" placeholder="email">
        @error('email')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
        <input class="block rounded border border-gray-100 px-3 py-1 mb-1" type="password" wire:model='password'
            name="password" placeholder="password">
        @error('password')
            <span class="text-red-500 text-xs">{{ $message }}</span>
        @enderror
        <button class="block rounded px-3 py-1 bg-gray-400 text-white">Create User</button>
    </form>
    <hr>
    <div>
        @foreach ($users as $user)
            <h3>{{ $user->name }}</h3>
        @endforeach
    </div>
</div>
