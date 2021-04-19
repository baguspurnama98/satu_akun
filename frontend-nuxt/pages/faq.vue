<template>
  <div class="py-10">
    <div class="mx-auto max-w-6xl">
      <div class="p-2 rounded">
        <div class="flex flex-col md:flex-row">
          <div class="md:w-3/4">
            <span class="text-gray-600 text-2xl xs:text-lg font-medium">
              Frequently Asked Question</span
            >
            <accordion :title="'FAQ'" :data="data"></accordion>
          </div>

          <div class="md:w-1/4 p-4 text-sm">
          <!-- Menuju WhatsApp -->
            <a
              href="#"
              class="flex items-center align-items-center justify-center px-5 py-3 mx-3 rounded-md text-base text-white transition bg-green-500 hover:bg-green-600 focus:bg-green-700"
              style="text-align: center"
              >Tanya Admin
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
          content:
            "Nengok apee?",
        },
        {
          title: "Berapa jumlah maksimal campaign berjalan?",
          content:
            "Di isi dulu yaa.",
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
