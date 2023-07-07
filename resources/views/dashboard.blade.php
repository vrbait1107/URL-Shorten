<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">

                <x-session-status class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 my-6 rounded relative" role="alert" :status="session('status')" />
                
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Sr.No.
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Short Url
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Destination Url
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse ($data as $key=>$value)
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $loop->iteration }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $value->default_short_url }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $value->destination_url }}
                                </td>
                                <th scope="col" class="px-6 py-3">
                                    <form
                                        action="{{ route('dashboard.destroy', $value->id ) }}"
                                        method="post" onsubmit="return confirm('Are you sure..?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>

                                    <a href="{{ route('dashboard.edit', $value->id ) }}" >
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Edit</button>
                                    </a>

                                    <a href="{{ $value->default_short_url  }}" target="_blank" >
                                        <button type="button" class="btn btn-sm btn-outline-danger">Visit</button>
                                    </a>

                                    <form
                                        action="{{ route('dashboard.disable', $value->id ) }}"
                                        method="post" onsubmit="return confirm('Are you sure..?')">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Disable</button>
                                    </form>

                                </th>
                            </tr>
                        @empty
                            <tr>
                                <td rowspan="4">
                                    No Data Available
                                </td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
