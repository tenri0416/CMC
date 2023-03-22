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
                    {{-- ここから上が独自の --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
