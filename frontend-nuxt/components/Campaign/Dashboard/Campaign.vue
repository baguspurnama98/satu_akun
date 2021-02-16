<template>
  <section class="text-gray-600 body-font overflow-hidden">
    <div class="container mx-auto">
      <div class="lg:w-4/5 mx-auto flex flex-wrap">
        <img
          alt="ecommerce"
          class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded"
          src="https://dummyimage.com/400x400"
        />
        <div class="lg:w-1/2 w-full lg:pl-10 lg:py-6 px-5 mt-6 lg:mt-0">
          <h2 class="text-sm title-font text-gray-500 tracking-widest">Campaign Akun</h2>
          <h1 class="text-gray-900 text-3xl title-font font-medium mb-1">
            The Catcher in the Rye
          </h1>
          <div class="flex mb-4">
            <span class="flex items-center text-gray-600"> Bagus Purnama </span>
            <span class="flex ml-3 pl-3 border-l-2 border-gray-200 space-x-2s">
              <icon-social></icon-social>
            </span>
          </div>
          <div class="py-3 mb-3">
              <!-- Deskripsi -->
            <p class="leading-relaxed">Fam locavore kickstarter distillery. Mixtape chillwave tumeric sriracha taximy chia microdosing tilde DIY. XOXO fam indxgo juiceramps cornhole raw denim forage brooklyn. Everyday carry +1 seitan poutine tumeric. Gastropub blue bottle austin listicle pour-over, neutra jean shorts keytar banjo tattooed umami cardigan.</p>
        

            <!-- Template ini hanya akan muncul ketika yang login adalah pemilik host atau slot dan status sudah berlangsung atau selesai -->
            <template v-if="true">
              <!-- disini isinya element informasi akun -->
              <div class="py-3 mt-3">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                  Informasi Campaign
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                  Detail personal campaign yang dapat digunakan.
                </p>
              </div>
              <div class="border-t border-gray-200">
                <dl>
                  <div
                    class="bg-gray-50 py-2 sm:grid sm:grid-cols-3 sm:gap-4"
                  >
                    <dt class="text-sm font-medium text-gray-600">Alamat Email</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                      Margot Foster
                    </dd>
                  </div>
                </dl>
                <dl>
                  <div
                    class="bg-gray-50 py-2 sm:grid sm:grid-cols-3 sm:gap-4"
                  >
                    <dt class="text-sm font-medium text-gray-600">Password</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                      Margot Foster
                    </dd>
                  </div>
                </dl>
                <dl>
                  <div
                    class="bg-gray-50 py-2 sm:grid sm:grid-cols-3 sm:gap-4"
                  >
                    <dt class="text-sm font-medium text-gray-600">Nomor Telepon</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0">
                      Margot Foster
                    </dd>
                  </div>
                </dl>
              </div>
            </template>
          </div>
          <div class="flex mt-6 items-center pt-5 border-t-2 border-gray-100">
            <!-- Batalkan dan Edit hanya aktif ketika dia adalah host dan status masih aktif -->
            <button
              class="flex ml-auto text-white bg-red-500 border-0 py-2 px-4 focus:outline-none hover:bg-red-600 rounded"
            >
              Batalkan
            </button>
            <button
              class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded"
            >
              Edit
            </button>
            <!-- Ajukan perpanjangan hanya aktif ketika dia adalah slot dan status expired -->
            <button
              class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-4 focus:outline-none hover:bg-indigo-600 rounded"
            >
              Perpanjang
            </button>
            <!-- Laporkan hanya aktif ketika dia adalah slot dan status berlangsung -->
            <button
              class="flex ml-auto text-white bg-red-500 border-0 py-2 px-4 focus:outline-none hover:bg-red-600 rounded"
            >
              Laporkan
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import IconSocial from "../../Profil/IconSocial";
export default {
  name: "DashboardCampaign",

  components: { IconSocial },
  // status: aktif, ekspired, berlangsung, refund
  // ini bakal dapatin data si pemilik host juga
  props: ["postTitle"],
  // kita pakai props, data disini hanya sebagai contoh
  data() {
    return {
      campaign: {
        status: "aktif",
        judul: "Apa Mau Loe Haah? Gak suka?",
        host: "Anastasya Eka",
        dana_terkumpul: "Rp 20.000",
      },
    };
  },
  methods: {},
};
</script>
