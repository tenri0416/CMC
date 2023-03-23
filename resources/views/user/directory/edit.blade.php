<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            フォルダ変更
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                {{-- ここから↓が挑戦 --}}
                <section class="text-gray-600 body-font relative">
                    <div class="container mx-auto">
                      <div class="flex flex-col text-center w-full mb-12">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">フォルダ変更</h1>
                      </div>
                      <x-input-error :messages="$errors->get('direcoty_name')" class="mt-2" />
                        <div class="lg:w-1/2 md:w-2/3 mx-auto">
                            <div class="flex flex-wrap -m-2">
                                <div class="p-2 w-1/2">
                                    <div class="relative">
                                        <form method="post" action="{{ route('user.directory.update', ['directory' => $directory->id]) }}">
                                            @csrf
                                            @method('PUT')
                                            <label for="name" class="leading-7 text-sm text-gray-600">フォルダ名</label>
                                            <input type="text"  value="{{ old('directory_name', $directory->directory_name) }}" name="directory_name" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            </div>
                          </div>
                          <div class="p-2 w-1/2">
                            <div class="relative">
                              <label for="email" class="leading-7 text-sm text-gray-600">    　　　</label>
                              <button class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">保存</button>
                            </div>
                        </form>
                          </div>
                          <div class="p-2 w-full pt-24">
                            {{-- <div class="relative">
                              <label for="message" class="leading-7 text-sm text-gray-600">Message</label>
                              <textarea id="message" name="message" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
                            </div>
                          </div> --}}
                          <div class="p-2 w-full">

                            <button onclick="location.href='{{ route('user.directory.index') }}'"
                                class="flex mx-auto text-white bg-emerald-500 border-0 py-2 px-8 focus:outline-none hover:bg-emerald-600 rounded text-lg">戻る</button>
                          </div>

                        </div>
                      </div>
                    </div>
                  </section>
                {{-- ここから上が挑戦 --}}

            </div>
        </div>
    </div>

</x-app-layout>
