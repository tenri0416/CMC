<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            メモ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- ここから下が独自の --}}
                    <x-flash-message status="session('status')" />
                    <section class="text-gray-600 body-font">
                        <div class="flex justify-end mb-2">
                            {{-- ボタン区域した --}}


                            <!-- Modal toggle -->
                            <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px- py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                <img alt="folder" {{-- class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4" --}}
                                    src="{{ asset('/images/icons8-mac-folder-48.png') }}">
                                作成
                            </button>

                            <!-- Main modal -->
                            <div id="authentication-modal" tabindex="-1" aria-hidden="true"
                                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
                                <div class="relative w-full h-full max-w-md md:h-auto">
                                    <!-- Modal content -->
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button"
                                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                            data-modal-hide="authentication-modal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg> <span class="sr-only">Close modal</span>
                                        </button>

                                        <div class="px-6 py-6 lg:px-8">
                                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">フォルダ作成
                                            </h3>
                                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                            <form class="space-y-6"
                                            method="post"action="{{ route('user.directory.store') }}">
                                            @csrf

                                            <div>
                                                <label for="email"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">フォルダ名</label>
                                                <input type="text" name="directory_name" id="directory_name"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                placeholder="フォルダ" required>
                                            </div>

                                            <button type="submit"
                                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">作成</button>

                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- ボタン区域上 --}}
                        </div>

                    {{-- ここから上が独自の --}}
                   {{-- ここから挑戦↓ --}}
                    <section class="text-gray-600 body-font">
                        <div class="container mx-auto">
                            <div class="flex flex-col text-center w-full mb-1">
                                <h1 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">フォルダ</h1>

                            </div>
                            <div class="lg:w-2/3 w-full mx-auto overflow-auto">
                                <table class="table-auto w-full text-left whitespace-no-wrap">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tl rounded-bl">
                                                フォルダ名</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                作成日</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                更新日</th>
                                            <th
                                                class="px-4 py-3 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100">
                                                </th>
                                            <th
                                                class="w-10 title-font tracking-wider font-medium text-gray-900 text-sm bg-gray-100 rounded-tr rounded-br">
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($directory as $dire)
                                            <tr>
                                                <td class="md:px-4 py-3"><a href="{{route('user.memo.show',$dire->id)}}">{{ $dire->directory_name }}</a></td>
                                                <td class="md:px-4 py-3">{{$dire->created_at->diffForHumans()}}</td>
                                                <td class="md:px-4 py-3">{{$dire->updated_at->diffForHumans()}}</td>
                                                <td class="md:px-4 py-3">
                                                    <button
                                                        onclick="location.href='{{ route('user.directory.edit', ['directory' => $dire->id]) }}'"
                                                        class=" text-white bg-blue-300 border-0 py-2 px-2 focus:outline-none hover:bg-blue-500 rounded ">編集</button>
                                                </td>
                                                <form id="delete_{{ $dire->id }}" method="post"
                                                    action="{{ route('user.directory.destroy', ['directory' => $dire->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <td class="px-4 py-3 w-24">
                                                        <a data-id="{{ $dire->id }}" onclick="deletePost(this)"
                                                            class=" text-white bg-red-300 border-0 py-2 px-2 focus:outline-none hover:bg-red-500 rounded ">削除</a>
                                                        </td>
                                                    </form>
                                            </tr>
                                        @endforeach

                                        </tr>
                                    </tbody>
                                </table>
                            </div>



                        </div>
                    </section>
                    {{ $directory->links() }}

                    {{-- ここから挑戦上 --}}

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
