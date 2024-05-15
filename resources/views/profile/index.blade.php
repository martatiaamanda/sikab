@if (Auth::user()->role == 'user')
    <x-app-layout>
        <x-slot name="title">Profile</x-slot>

        <x-profile.index />
    </x-app-layout>
@else
    <x-admin-layout>
        <x-slot name="title">Profile</x-slot>

        <x-profile.index />
    </x-admin-layout>
@endif
