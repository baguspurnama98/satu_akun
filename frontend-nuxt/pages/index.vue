<template>
  <div>
    <!-- Content disini -->
    <Landing class="my-12" />
    <!-- component campaign -->
    <section
      id="section2"
      class="container px-4 my-12 mx-auto flex flex-wrap items-center justify-between"
    >
      <div
        class="flex flex-col items-center justify-center bg-white min-h-screen min-w-screen"
      >
        <div class="text-center mb-10">
          <h1
            class="font-sans text-3xl font-bold tracking-wider leading-none text-black mb-4"
          >
            Berpatungan lebih murah
          </h1>
          <p
            class="text-gray-700 tracking-widest font-sans leading-relaxed text-base"
          >
            Yuk mulai patungan aja!
          </p>
        </div>
        <div
          class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 md:gap-6 gap-4"
        >
          <CardCampaign
            v-for="item in items"
            :key="item.title"
            :title="item.title"
          />
        </div>
      </div>
    </section>
    <!-- component hero keunggulan -->
    <section class="text-gray-700 body-font my-12">
      <div class="container px-5 mx-auto flex flex-wrap">
        <div class="text-center mb-10">
          <h1
            class="sm:text-3xl text-2xl font-medium text-center title-font text-gray-900 mb-4"
          >
            <b>Satu Akun</b> saja cukup
          </h1>
          <p class="text-base leading-relaxed">
            Merdeka dalam akses apa saja melalui patungan. Kamu bisa patungan
            akun tanpa ada batasan slot, patungan akun platform apa saja, hingga
            jaminan tanpa penipuan
          </p>
        </div>
        <div class="flex flex-wrap -m-4">
          <div class="p-4 lg:w-1/2 md:w-full">
            <div
              class="flex border rounded-lg border-gray-400 p-8 sm:flex-row flex-col"
            >
              <div
                class="w-16 h-16 mr-8 xs:mx-auto mb-4 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 flex-shrink-0"
              >
                <svg
                  fill="currentColor"
                  class="w-8 h-8"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                  ></path>
                </svg>
              </div>
              <div class="flex-grow">
                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">
                  Mudah dan legal untuk patungan
                </h2>
                <p class="leading-relaxed text-base">
                  Kami carikan kamu teman patungan untuk membeli akun premium.
                  "Kasih wording yang tepat"
                </p>
              </div>
            </div>
          </div>
          <div class="p-4 lg:w-1/2 md:w-full">
            <div
              class="flex border rounded-lg border-gray-400 p-8 sm:flex-row flex-col"
            >
              <div
                class="w-16 h-16 mr-8 xs:mx-auto mb-4 inline-flex items-center justify-center rounded-full bg-red-100 text-red-500 flex-shrink-0"
              >
                <svg
                  fill="currentColor"
                  class="w-8 h-8"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                  ></path>
                </svg>
              </div>
              <div class="flex-grow">
                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">
                  Pembayaran apa saja gak pakai ribet
                </h2>
                <p class="leading-relaxed text-base">
                  Tidak perlu pakai kartu kredit, cukup bayar pakai media
                  pembayaran apa saja. Tidak perlu upload bukti pembayaran
                  (Wording)
                </p>
              </div>
            </div>
          </div>
          <div class="p-4 lg:w-1/2 md:w-full">
            <div
              class="flex border rounded-lg border-gray-400 p-8 sm:flex-row flex-col"
            >
              <div
                class="w-16 h-16 mr-8 xs:mx-auto mb-4 inline-flex items-center justify-center rounded-full bg-green-100 text-green-500 flex-shrink-0"
              >
                <svg
                  fill="currentColor"
                  class="w-8 h-8"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                  ></path>
                </svg>
              </div>
              <div class="flex-grow">
                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">
                  Data kamu aman
                </h2>
                <p class="leading-relaxed text-base">
                  Kami berusaha semaksimal mungkin jaga keamanan dan menghindari
                  penipuan. Pastikan kamu baca mekanisme keamanan dan kebijakan
                  privasi layanan Satu Akun
                </p>
                <a class="mt-3 text-indigo-500 inline-flex items-center" href=""
                  >Selengkapnya
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-4 h-4 ml-2"
                    viewBox="0 0 24 24"
                  >
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
          <div class="p-4 lg:w-1/2 md:w-full">
            <div
              class="flex border rounded-lg border-gray-400 p-8 sm:flex-row flex-col"
            >
              <div
                class="w-16 h-16 mr-8 xs:mx-auto mb-4 inline-flex items-center justify-center rounded-full bg-orange-100 text-orange-500 flex-shrink-0"
              >
                <svg
                  fill="currentColor"
                  class="w-8 h-8"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 20 20"
                >
                  <path
                    d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a3 3 0 013-3h5c.256 0 .512.098.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z"
                  ></path>
                </svg>
              </div>
              <div class="flex-grow">
                <h2 class="text-gray-900 text-lg title-font font-medium mb-3">
                  Harga bersaing
                </h2>
                <p class="leading-relaxed text-base">
                  Kami coba berikan harga yang kompetitif dengan kualitas
                  layanan mumpuni, <i>harga mahasiswa</i>. Coba lihat detail
                  penawaran yang kami berikan di skema harga.
                </p>
                <a
                  class="mt-3 text-indigo-500 inline-flex items-center"
                  href="/pricing"
                  >Selengkapnya
                  <svg
                    fill="none"
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    class="w-4 h-4 ml-2"
                    viewBox="0 0 24 24"
                  >
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
<script>
import Landing from '@/components/Hero/Landing'
import CardCampaign from '@/components/Campaign/CardCampaign'

export default {
  layout: 'default',
  components: { Landing, CardCampaign },
  data() {
    return {
      items: [
        { title: 'Sharing Account Netflix 1 Bulan' },
        { title: 'Belajar Coding Javascript' },
        { title: 'Disney Hotstar' },
        {
          title:
            'Patungan Beli Akun Dicoding selama 1 tahun bebas kelas apa saja yang ada, yuk murah meriah',
        },
        { title: 'Sharing Account Netflix 1 Bulan' },
        { title: 'Belajar Coding Javascript' },
        { title: 'Disney Hotstar' },
      ],
    }
  },
}
</script>

<style>
/* Sample `apply` at-rules with Tailwind CSS
.container {
@apply min-h-screen flex justify-center items-center text-center mx-auto;
}
*/
</style>
