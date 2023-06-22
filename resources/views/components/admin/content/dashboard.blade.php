<x-layouts.main-layout>

        <x-utils.table.index>

            <x-slot name="heading">
                <x-utils.table.heading>Email</x-utils.table.heading>
                <x-utils.table.heading>Name</x-utils.table.heading>
            </x-slot>


            @foreach ($user as $item)
            <x-utils.table.row> {{ $item->email }}</x-utils.table.row>
            <x-utils.table.row> {{ $item->name }}</x-utils.table.row>

                @endforeach

        </x-utils.table.index>
</x-layouts.main-layout>
