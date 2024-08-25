<x-guest-layout>
    <form action="{{ route('login') }}" method="post">
        @csrf
        <x-text-input name="email" label="Email" type="email"></x-text-input>
        <x-text-input name="password" label="Password" type="password"></x-text-input>
        <x-button fullw="true">Tette</x-button>
    </form>
</x-guest-layout>