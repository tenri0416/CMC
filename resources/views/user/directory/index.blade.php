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
                    <section class="text-gray-600 body-font">
                        <div class="flex justify-end mb-4">
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
                        <div class="container px-5 py-24 mx-auto">
                            <div class="flex flex-col text-center w-full mb-20">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">メモフォルダ</h1>
                                {{-- <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr
                                    hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you
                                    probably haven't heard of them.</p> --}}
                            </div>
                            <div class="flex flex-wrap -m-2">
                                @foreach ($directory as $dire)
                                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                            <img alt="folder"
                                                class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                                src="{{ asset('/images/icons8-mac-folder-48.png') }}">

                                            <a href="{{ route('user.memo.index',$dire->id) }}">
                                                <div class="flex-grow">
                                                    <h2 class="text-gray-900 title-font font-medium"contenteditable>
                                                        {{ $dire->directory_name }}
                                                    </h2>
                                                    <p class="text-gray-500">更新日</p>
                                                </div>
                                            </a>

                                            <form id="delete_{{ $dire->id }}" method="post"
                                                action="{{ route('user.directory.destroy', ['directory' => $dire->id]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <div class="px-4 py-3">
                                                    <a data-id="{{ $dire->id }}" onclick="deletePost(this)"
                                                        class=" text-white bg-red-300 border-0 py-2 px-4 focus:outline-none hover:bg-red-500 rounded ">削除</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{ $directory->links() }}
                    </section>
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
