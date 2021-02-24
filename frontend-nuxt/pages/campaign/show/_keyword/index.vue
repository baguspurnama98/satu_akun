<template>
  <div
    class="container px-4 my-5 mx-auto flex-wrap justify-between min-h-screen"
  >
    <header>
      <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
          <div
            class="w-full text-gray-700 md:text-center text-2xl font-semibold"
          >
            Kategori Campaign
          </div>
        </div>
        <nav
          :class="isOpen ? '' : 'hidden'"
          class="sm:flex sm:justify-center sm:items-center mt-4"
        >
          <div class="flex flex-col sm:flex-row">
            <a
              class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0"
              href="#"
              >Edukasi</a
            >
            <a
              class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0"
              href="#"
              >Hiburan</a
            >
            <a
              class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0"
              href="#"
              >Hobi</a
            >
          </div>
        </nav>
        <div
          class="relative items-center text-gray-900 my-5 xs:mb-5 w-1/2 xs:w-full mx-auto"
        >
          <input
            type="search"
            name="serch"
            placeholder="Cari apa? contoh: Netflix, Udemy"
            class="bg-gray-100 w-full h-10 px-5 py-6 pr-10 rounded-full text-md focus:outline-none shadow-md"
          />
          <button type="submit" class="absolute right-0 top-0 mt-4 mr-4">
            <svg
              class="h-4 w-4 fill-current focus:outline-none hover:scale-100"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              version="1.1"
              id="Capa_1"
              x="0px"
              y="0px"
              viewBox="0 0 56.966 56.966"
              style="enable-background: new 0 0 56.966 56.966"
              xml:space="preserve"
              width="512px"
              height="512px"
            >
              <path
                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"
              />
            </svg>
          </button>
        </div>
      </div>
    </header>
    <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 md:gap-6 gap-4">
      <CardCampaign
        v-for="item in items"
        :key="item.title"
        :title="item.title"
      />
    </div>
  </div>
</template>
<script>
import CardCampaign from '@/components/Campaign/CardCampaign'

export default {
  layout: 'default',
  components: { CardCampaign },
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
