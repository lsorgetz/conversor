<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table class="table-auto">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="w-1/2 px-4 py-2">Nome</th>
                            <th class="w-1/2 px-4 py-2">E-mail</th>
                          </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                    @if ($loop->index % 2)
                        <tr>
                    @else
                        <tr class="bg-gray-100">
                    @endif
                        <td class="border px-4 py-2">{{ $user->id }}</td>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                      </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $users->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
