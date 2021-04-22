<template>
  <div class="py-10">
    <div class="mx-auto max-w-6xl">
      <div class="p-4">
        <div class="flex flex-col md:flex-row">
          <div class="md:w-3/4">
            <span class="p-2 text-gray-600 text-2xl xs:text-xl font-medium">
              Frequently Asked Question</span
            >
            <accordion :title="'FAQ'" :data="data"></accordion>
          </div>

          <div class="md:w-1/4 p-2 text-sm flex flex-col">
            <!-- Menuju WhatsApp -->
            <span class="py-2 text-lg text-gray-600">Jika kamu masih memiliki pertanyaan</span>
            <a
              href="#"
              class="inline-flex items-center align-items-center shadow-md justify-center gap-4 px-5 py-3 mx-3 rounded-t-md text-base text-white transition bg-green-500 hover:bg-green-600 focus:bg-green-700"
              style="text-align: center"
            >
              <svg
                fill="currentColor"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="0"
                class="w-5 h-5"
                viewBox="0 0 24 24"
              >
                <path
                  d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"
                />
              </svg>
              Tanya Admin
            </a>
            <a
              href="#"
              class="inline-flex items-center align-items-center shadow-md justify-center gap-4 px-5 py-3 mx-3 rounded-b-md text-base text-white transition bg-red-500 hover:bg-red-600 focus:bg-red-700"
              style="text-align: center"
            >
              <svg
                fill="currentColor"
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="0"
                class="w-5 h-5"
                viewBox="0 0 24 24"
              >
                <path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.273H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L5.455 4.64 12 9.548l6.545-4.91 1.528-1.145C21.69 2.28 24 3.434 24 5.457z"/>
              </svg>
              Email Admin
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Accordion from "@/components/Accordion";
export default {
  components: {
    Accordion,
  },
  data() {
    return {
      data: [
        {
          title: "Bagaimana cara membuat campaign baru?",
          content: "Nengok apee?",
        },
        {
          title: "Berapa jumlah maksimal campaign berjalan?",
          content: "Di isi dulu yaa.",
        },
        {
          title: "Apakah menurutmu Dewa Kipas jago bermain catur?",
          content:
            "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia temporibus doloremque non eligendi unde ipsam? Voluptatibus, suscipit deserunt quidem delectus perferendis velit molestias, veritatis officia fugiat cumque quaerat earum adipisci?",
        },
        {
          title: "Apakah benar bumi itu datar?",
          content:
            "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia temporibus doloremque non eligendi unde ipsam? Voluptatibus, suscipit deserunt quidem delectus perferendis velit molestias, veritatis officia fugiat cumque quaerat earum adipisci?",
        },
      ],
    };
  },
};
</script>
