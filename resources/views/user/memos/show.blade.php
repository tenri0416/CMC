<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{$directory}}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- ここから下が独自の --}}
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y-2 divide-gray-200 text-sm">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                                        ファイル名
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                                       前文
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-2 text-left font-medium text-gray-900">
                                        作成日
                                    </th>

                                    <th class="px-4 py-2"></th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">

                                @foreach ($memos as $memo)
                                <tr>


                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                            {{ $memo->title }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $memo->content }}</td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700">{{ $memo->created_at }}
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700"><button
                                                onclick="location.href='{{ route('user.memo.edit', ['memo' => $memo->id]) }}'"
                                                class=" text-white bg-blue-300 border-0 py-2 px-2 focus:outline-none hover:bg-blue-500 rounded ">編集</button>
                                        </td>
                                        <form id="delete_{{ $memo->id }}" method="post"
                                            action="{{ route('user.memo.destroy', ['memo' => $memo->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <td class="whitespace-nowrap px-4 py-2">
                                                <a data-id="{{ $memo->id }}" onclick="deletePost(this)"
                                                    class=" text-white bg-red-300 border-0 py-2 px-2 focus:outline-none hover:bg-red-500 rounded ">削除</a>

                                            </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    {{-- ここから上が独自の --}}
                </div>
            </div>
        </div>
    </div>
    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除してもいいですか?')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
