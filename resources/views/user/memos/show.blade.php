<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
<<<<<<< HEAD
            {{$directory}}

=======
            {{ __('Dashboard') }}
>>>>>>> origin/main
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- ここから下が独自の --}}
<<<<<<< HEAD
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

=======
                    @foreach ($memo as $m)
                        <div class="bg-white py-6 sm:py-8 lg:py-12">
                            <div class="mx-auto max-w-screen-md px-4 md:px-8">
                                {{-- ここから下トライ --}}
                                <form method="post" action="{{ route('user.memo.update', ['memo' => $m->id]) }}">
                                    @csrf
                                    @method('PUT')
                                        {{-- <button type="submit"
                                            class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600">
                                         保存</button> --}}

                                    <h1 class="mb-4 text-center text-2xl font-bold text-gray-800 sm:text-3xl md:mb-6">
                                        <input type="text" id="memo-title" name="title" placeholder="タイトルを入力する..."
                                            value="{{ old('title', $m->title) }}" />
                                    </h1>
                                    <p class="mb-6 text-gray-500 sm:text-lg md:mb-8">
                                        <textarea id="memo-content" name="content" placeholder="内容を入力する...">{{ old('content', $m->content) }}</textarea>
                                    </p>
                                </form>
                                <button onclick="location.href='{{ route('user.memo.index', $m->directory_id) }}'"
                                    class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">戻る</button>
                                {{-- ここから上トライ --}}
                                <button type="submit"
                                class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600">保存</button>


                            </div>
                        </div>
                    @endforeach
>>>>>>> origin/main
                    {{-- ここから上が独自の --}}
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
    <script>
        function deletePost(e) {
            'use strict';
            if (confirm('本当に削除してもいいですか?')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
=======
>>>>>>> origin/main
</x-app-layout>
