<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- ここから下が独自の --}}
                    <section class="text-gray-600 body-font">
                        <div class="container px-5 py-24 mx-auto">
                            <div class="flex flex-col text-center w-full mb-20">
                                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">
                                    {{ $directory_name->directory->directory_name }}</h1>

                            </div>

                            <form method="post"action="{{route('user.memo.store',['memo'=>$directory_name->directory->id])}}">
                                @csrf
                                @method('post')

                                <button>作成</button>
                            </form>
                            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                                Plan</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                Speed</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                Storage</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                Price</th>
                                            <th
                                                class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($memos as $memo)
                                            <tr>

                                                <td class="px-4 py-3"><a
                                                        href="{{ route('user.memo.open', $memo->id) }}">{{ $memo->title }}</a>
                                                </td>
                                                <td class="px-4 py-3"></td>
                                                <td class="px-4 py-3 text-lg text-gray-900"></td>
                                                {{--<td class="w-10 text-center">
                                                    <input name="plan" type="radio">
                                                </td> --}}
                                                <form id="delete_{{ $memo->id }}" method="post"
                                                    action="{{ route('user.memo.destroy', ['memo' => $memo->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                <td class="px-4 py-3">
                                                    <a data-id="{{ $memo->id }}" onclick="deletePost(this)"
                                                        class=" text-white bg-red-300 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded ">削除</a>
                                                    </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <div class="flex pl-4 mt-4 lg:w-2/3 w-full mx-auto">
                                <a class="text-indigo-500 inline-flex items-center md:mb-2 lg:mb-0">Learn More
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2"
                                        viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                                <button onclick="location.href='{{ route('user.directory.index') }}'"
                                    class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded">戻る</button>
                            </div>
                        </div>
                    </section>
                    {{-- ここから上が独自の --}}


                </div>
            </div>
        </div>
    </div>
    <script>
        function deletePost(e) {
            console.log(e);
            'use strict';
            if (confirm('本当に削除してもいいですか?')) {
                document.getElementById('delete_' + e.dataset.id).submit();
            }
        }
    </script>
</x-app-layout>
