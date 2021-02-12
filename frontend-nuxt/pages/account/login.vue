<
<template>
  <div>
    <!-- Content disini -->
    <!-- component login -->
    <div class="flex items-center justify-center mt-12">
        <div class="w-full max-w-md">
            <form class="shadow-lg rounded-md px-8 xs:px-4 pt-6 pb-8 mb-4 mx-4">
                <!-- @csrf -->
                <div class="text-indigo-500 text-3xl font-semibold flex justify-center py-2 mb-6">
                    Silakan Masuk
                </div>
                <div class="mb-4">
                    <label for="email" class="text-sm font-semibold text-gray-600">Email</label>
                    <input class="appearance-none border rounded w-full py-3 px-3 text-gray-900 leading-tight focus:border-indigo-500 focus:outline-none" name="email" type="email" required autofocus placeholder="Email" />
                </div>
                <div class="mb-4">
                    <label for="password" class="text-sm font-semibold text-gray-600">Password</label>
                    <input class="appearance-none border rounded w-full py-3 px-3 text-gray-900 mb-3 leading-tight focus:border-indigo-500 focus:outline-none" type="password" placeholder="Password" name="password" required autocomplete="current-password" />
                </div>
                <div class="mb-3 flex items-center justify-between">
                    <button class="px-6 py-2 rounded text-white inline-block shadow-lg bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700" type="submit">
                        Masuk
                    </button>
                    <!-- Kenapa kita ga provide lupa password? Karena kita gabisa otomatis kirim link ke email mereka, harus manual -->
                    <a class="inline-block align-baseline font-normal text-sm text-indigo-500 hover:text-indigo-800" href="#">
                        Butuh bantuan?
                    </a>
                </div>
                <div class="flex">
                    <NuxtLink to="/register" class="inline-block align-baseline font-normal text-sm text-indigo-500 hover:text-indigo-800 cursor-pointer" href="#">
                        Belum punya akun?
                    </NuxtLink>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</template>
