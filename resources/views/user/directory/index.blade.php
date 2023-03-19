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
                        <div class="container px-5 py-24 mx-auto">
                            <div class="flex flex-col text-center w-full mb-20">
                                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">メモフォルダ</h1>
                                {{-- <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr
                                    hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you
                                    probably haven't heard of them.</p> --}}
                            </div>
                            @foreach ($directory as $dire)
                                <div class="flex flex-wrap -m-2">
                                    <div class="p-2 lg:w-1/3 md:w-1/2 w-full">
                                        <div class="h-full flex items-center border-gray-200 border p-4 rounded-lg">
                                            <img alt="team"
                                                class="w-16 h-16 bg-gray-100 object-cover object-center flex-shrink-0 rounded-full mr-4"
                                                src="https://dummyimage.com/80x80">
                                            <div class="flex-grow">
                                                <h2 class="text-gray-900 title-font font-medium">
                                                    {{ $dire->directory_name }}
                                                </h2>
                                                <p class="text-gray-500">更新日</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endforeach
                        </div>
                    </section>
                    {{-- ここから上が独自の --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
