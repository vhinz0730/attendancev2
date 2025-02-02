<div>
    <x-slot name="header" class="inline-flex">
        <x-student></x-student>
    </x-slot>
                        @if (session()->has('message'))
                            <div class="text-green-700 w-full bg-green-500 rounded-lg text-xl flex justify-center mr-72 p-3 mb-3">
                                {{ session('message') }}
                            </div>
                        @endif  
            <div class="relative mr-20 ml-20 overflow-x-auto">
                        <table class="w-full mb-10  mt-10 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Student Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Student ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Year
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Section
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            @foreach($students as $student)
                            <tbody>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                       {{ $student -> name ?? ''}} 
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $student -> student_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $student -> year }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $student -> section }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $student -> status }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div x-data="{ hover: false }" wire:ignore>
                                            <button x-on:mouseover="hover = true" x-on:mouseout="hover = false" type="button" wire:click="accept({{ $student->id }})" wire:confirm="Accept Application?"
                                                class="btn min-w-[5rem] min-h-[2rem] bg-blue-600 font-medium text-black hover:bg-green-700 active:bg-primary-focus/90 rounded-full">
                                                <i class="fa-solid fa-check"></i>
                                            <span x-show="hover">Approve</span>
                                            </button>
                                        </div>  
                                        <div x-data="{ hover: false }" wire:ignore>
                                            <button x-on:mouseover="hover = true" x-on:mouseout="hover = false" type="button" wire:click="delete({{ $student->id }})" wire:confirm="Accept Application?"
                                                class="btn min-w-[5rem] min-h-[2rem] mt-2 bg-blue-600 font-medium text-black hover:bg-red-700 active:bg-primary-focus/90 rounded-full">
                                                <i class="fa-solid fa-x"></i>
                                            <span x-show="hover">Disapprove</span>
                                            </button>
                                        </div>  
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                            <tfoot>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td colspan="6"> {{ $students->links() }}</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
</div>
