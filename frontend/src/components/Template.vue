<template>
<div class="hello">

    <div class="flex items-center justify-center">
        <div class="bg-white shadow-lg rounded mb-4 course">
            <div class="course-preview">
            </div>
            <div class="course-info">
                <h6 class="text-sm">Paket Premium</h6>
                <h1 class="font-bold text-3xl subpixel-antialiased">
                    Netflix
                </h1>
                <div class="py-3 mb-3">
                    <div class="flex justify-start cursor-pointer text-gray-700 hover:text-blue-400 hover:bg-blue-100 rounded-md px-2 py-2 my-2">
                        <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span>
                        <div class="font-medium px-2">Kapasitas Maksimum 4 orang</div>
                    </div>
                    <div class="flex justify-start cursor-pointer text-gray-700 hover:text-blue-400 hover:bg-blue-100 rounded-md px-2 py-2 my-2">
                        <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span>
                        <div class="font-medium px-2">4 perangkat bersamaan</div>
                    </div>
                    <div class="flex justify-start cursor-pointer text-gray-700 hover:text-blue-400 hover:bg-blue-100 rounded-md px-2 py-2 my-2">
                        <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span>
                        <div class="font-medium px-2">Bayar ketika grup penuh</div>
                    </div>
                    <div class="flex justify-start cursor-pointer text-gray-700 hover:text-blue-400 hover:bg-blue-100 rounded-md px-2 py-2 my-2">
                        <span class="bg-green-400 h-2 w-2 m-2 rounded-full"></span>
                        <div class="font-medium px-2">Tagihan bulanan murah</div>
                    </div>
                </div>
                <button class="px-4 py-2 rounded text-white inline-block shadow-lg bg-red-500 hover:bg-red-600 focus:bg-red-700" type="submit">
                    Selengkapnya
                </button>
            </div>
        </div>
    </div>

    <!-- component -->
    <div class="flex items-center justify-center">
        <div class="w-full max-w-md">
            <form class="bg-white shadow-lg rounded px-12 pt-6 pb-8 mb-4">
                <!-- @csrf -->
                <div class="text-gray-800 text-2xl flex justify-center border-b-2 py-2 mb-4">
                    Silahkan Login
                </div>
                <div class="mb-4">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="email" type="email" required autofocus placeholder="Email" />
                </div>
                <div class="mb-6">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password" placeholder="Password" name="password" required autocomplete="current-password" />
                </div>
                <div class="flex items-center justify-between">
                    <button class="px-4 py-2 rounded text-white inline-block shadow-lg bg-blue-500 hover:bg-blue-600 focus:bg-blue-700" type="submit">
                        Sign In
                    </button>
                    <a class="inline-block align-baseline font-normal text-sm text-blue-500 hover:text-blue-800" href="#">
                        Forgot Password?
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- component -->
    <div>
        <section class="text-gray-700">
            <div class="container px-5 py-24 mx-auto">
                <div class="text-center mb-20">
                    <h1 class="sm:text-3xl text-2xl font-medium text-center title-font text-gray-900 mb-4">
                        Frequently Asked Question
                    </h1>
                    <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto">
                        The most common questions about how our business works and what
                        can do for you.
                    </p>
                </div>
                <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                    <div class="w-full lg:w-1/2 px-4 py-2">
                        <details class="mb-4">
                            <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                                How Long is this site live?
                            </summary>

                            <span>
                                Laboris qui labore cillum culpa in sunt quis sint veniam.
                                Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis
                                minim velit nostrud pariatur culpa magna in aute.
                            </span>
                        </details>
                        <details class="mb-4">
                            <summary class="font-semibold bg-gray-200 rounded-md py-2 px-4">
                                Can I install/upload anything I want on there?
                            </summary>

                            <span>
                                Laboris qui labore cillum culpa in sunt quis sint veniam.
                                Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis
                                minim velit nostrud pariatur culpa magna in aute.
                            </span>
                        </details>
                        <details class="mb-4">
                            <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                                How can I migrate to another site?
                            </summary>

                            <span>
                                Laboris qui labore cillum culpa in sunt quis sint veniam.
                                Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis
                                minim velit nostrud pariatur culpa magna in aute.
                            </span>
                        </details>
                    </div>
                    <div class="w-full lg:w-1/2 px-4 py-2">
                        <details class="mb-4">
                            <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                                Can I change the domain you give me?
                            </summary>

                            <span class="px-4 py-2">
                                Laboris qui labore cillum culpa in sunt quis sint veniam.
                                Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis
                                minim velit nostrud pariatur culpa magna in aute.
                            </span>
                        </details>
                        <details class="mb-4">
                            <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                                How many sites I can create at once?
                            </summary>

                            <span class="px-4 py-2">
                                Laboris qui labore cillum culpa in sunt quis sint veniam.
                                Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis
                                minim velit nostrud pariatur culpa magna in aute.
                            </span>
                        </details>
                        <details class="mb-4">
                            <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                                How can I communicate with you?
                            </summary>

                            <span class="px-4 py-2">
                                Laboris qui labore cillum culpa in sunt quis sint veniam.
                                Dolore ex aute deserunt esse ipsum elit aliqua. Aute quis
                                minim velit nostrud pariatur culpa magna in aute.
                            </span>
                        </details>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</template>

<script>
export default {
    name: "HelloWorld",
    props: {
        msg: String,
    },
};
</script>
