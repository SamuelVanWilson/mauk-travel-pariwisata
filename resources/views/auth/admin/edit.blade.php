<x-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    @auth
      <x-slot name="gambar">{{ $user->gambar }}</x-slot>
    @endauth
    <main>
        <section  class="py-40 bg-gray-100  bg-opacity-50">
            <div class="mx-auto container max-w-2xl md:w-3/4 shadow-md">
              <div class="bg-gray-100 p-4 border-t-2 bg-opacity-5 border-indigo-400 rounded-t">
                <div class="max-w-sm mx-auto md:w-full md:mx-0">
                  <div class="inline-flex items-center space-x-4">
                    <img
                      class="w-10 h-10 object-cover rounded-full"
                      alt="User avatar"
                      src="{{ asset('storage/profile/'.$user->gambar) }}"
                    />
      
                    <h1 class="text-gray-600">{{ $user->nama }}</h1>
                  </div>
                </div>
              </div>
              <form method="POST" enctype="multipart/form-data" action="{{ route('auth.update') }}" class="bg-white space-y-6">
                @csrf
                @method('PUT')
                <div class="md:inline-flex space-y-4 md:space-y-0 w-full p-4 text-gray-500 items-center">
                  <h2 class="md:w-1/3 max-w-sm mx-auto">Account</h2>
                  <div class="md:w-2/3 max-w-sm mx-auto">
                    <label class="text-sm text-gray-400">Email (Tidak Dapat Diubah)</label>
                    <div class="w-full inline-flex border">
                      <div class="pt-2 w-1/12 bg-gray-100 bg-opacity-50">
                        <svg
                          fill="none"
                          class="w-6 text-gray-400 mx-auto"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                          />
                        </svg>
                      </div>
                      <input
                        type="email"
                        class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                        placeholder="{{ $user->email }}"
                        disabled
                      />
                    </div>
                  </div>
                </div>
      
                <hr />
                <div class="md:inline-flex  space-y-4 md:space-y-0  w-full p-4 text-gray-500 items-center">
                  <h2 class="md:w-1/3 mx-auto max-w-sm">Personal info</h2>
                  <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                    <div>
                      <label class="text-sm text-gray-400">Nama</label>
                      <div class="w-full inline-flex border">
                        <div class="w-1/12 pt-2 bg-gray-100">
                          <svg
                            fill="none"
                            class="w-6 text-gray-400 mx-auto"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                            />
                          </svg>
                        </div>
                        <input
                          type="text"
                          class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                          name="nama"
                          value="{{ old('nama', $user->nama) }}"
                        />
                      </div>
                    </div>
                    <div>
                      <label class="text-sm text-gray-400">No Handphone</label>
                      <div class="w-full inline-flex border">
                        <div class="pt-2 w-1/12 bg-gray-100">
                          <svg
                            fill="none"
                            class="w-6 text-gray-400 mx-auto"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"
                            />
                          </svg>
                        </div>
                        <input
                          type="tel"
                          class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                          pattern="^(+62)[0-9]{10-13}$"
                          name="no_handphone"
                          value="{{ old('no_handphone', $user->no_handphone) }}"
                        />
                      </div>
                    </div>
                    <div>
                      <label class="text-sm text-gray-400">Foto Profil</label>
                      <div class="w-full inline-flex">
                        <input
                          type="file"
                          class="w-11/12 focus:outline-none focus:text-gray-600 p-2"
                          name="gambar"
                        />
                      </div>
                    </div>
                  </div>
                </div>
      
                <hr />
                <div class="md:inline-flex w-full space-y-4 md:space-y-0 p-8 text-gray-500 items-center">
                  <h2 class="md:w-4/12 max-w-sm mx-auto">Change password</h2>
                  <div class="md:w-2/3 mx-auto max-w-sm space-y-5">
                    <div>
                      <div class="w-full inline-flex border-b">
                        <div class="w-1/12 pt-2">
                          <svg
                            fill="none"
                            class="w-6 text-gray-400 mx-auto"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                            />
                          </svg>
                        </div>
                        <input
                          type="password"
                          class="w-11/12 focus:outline-none focus:text-gray-600 p-2 ml-4"
                          name="password_lama"
                          placeholder="Old"
                        />
                      </div>
                    </div>
                    <div>
                      <div class="w-full inline-flex border-b">
                        <div class="w-1/12 pt-2">
                          <svg
                            fill="none"
                            class="w-6 text-gray-400 mx-auto"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                            />
                          </svg>
                        </div>
                        <input
                          type="password"
                          class="w-11/12 focus:outline-none focus:text-gray-600 p-2 ml-4"
                          name="password_baru"
                          placeholder="New"
                        />
                      </div>
                    </div>
                  </div>
      
                </div>
                <div class=" p-4 text-right space-x-5 pb-4 mb-2">
                  <button type="submit" class="text-white mx-auto max-w-sm rounded-md text-center bg-indigo-400 py-2 px-4 inline-flex items-center focus:outline-none md:float-right">
                    <svg
                      fill="none"
                      class="w-4 text-white mr-2"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                      />
                    </svg>
                    Update
                  </button>
                </div>
                
                <hr />
              </form>
              <form method="POST" enctype="multipart/form-data" action="{{ route('auth.destroy') }}" class="mt-2 w-full p-4 text-right text-gray-500">
                @csrf
                @method('DELETE')
                <button class="inline-flex items-center focus:outline-none mr-4 bg-red-800 text-white py-2 px-4">
                  Logout
                </button>
              </form>
            </div>
        </section>
    </main>
</x-layout>