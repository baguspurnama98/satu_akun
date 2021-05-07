<template>
  <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
    <div class="w-full mb-5">
      <h3 class="font-bold pb-3 text-4xl text-indigo-500">Buat Campaign</h3>
      <div class="bg-blue-100 p-3 rounded-lg xs:text-sm">
        <p>
          Pastikan campaign Anda sesuai dengan
          <b
            ><NuxtLink to="/tnc" class="hover:text-indigo-500 text-red-500"
              >syarat dan ketentuan Patungin.com</NuxtLink
            ></b
          >.
        </p>
        <p>
          Patungin menghimbau untuk menjalankan campaign yang wajar atau campaign Anda
          dapat diturunkan oleh Patungin.com sesuai S&K yang berlaku.
        </p>
      </div>
    </div>
    <form v-on:submit.prevent="handleSave">
      <h5 class="font-semibold py-3 px-6 xs:px-4 text-xl inline text-gray-600 xs:text-md">
        Informasi Campaign
      </h5>

      <section
        class="mx-3 mb-10 w-full py-5 px-6 xs:px-4 rounded-b-md shadow-md bg-white"
      >
        <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2">
          <div class="col-span-1">
            <h6 class="font-semibold py-3 text-lg inline xs:text-sm">Judul Campaign</h6>
            <span
              class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
              >Wajib</span
            >
            <p class="text-xs lg:pr-20 md:pr-10 xs:pr-0">
              Tulis judul campaign Anda dengan singkat, padat dan jelas
            </p>
          </div>
          <div class="sm:col-span-2">
            <div>
              <input
                type="text"
                class="appearance-none border rounded w-full py-3 px-3 text-gray-900 leading-tight focus:outline-none focus:border-indigo-500 xs:text-sm"
                placeholder="Contoh: Akun Sharing Netflix 1 Bulan"
                v-model="campaign.title"
                required
              />
            </div>
          </div>
        </div>

        <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2 mt-4">
          <div class="col-span-1">
            <h6 class="font-semibold py-3 text-lg inline xs:text-sm">
              Kategori Campaign
            </h6>
            <span
              class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
              >Wajib</span
            >
            <p class="text-xs md:pr-20">Pilih kategori campaign yang sesuai</p>
          </div>

          <div class="sm:col-span-2 xs:pl-4">
            <div class="grid grid-cols-3 gap-2">
              <label class="inline-flex items-center py-2 xs:py-0">
                <select
                  class="w-full border capitalize focus:outline-none focus:ring focus:border-indigo-400 py-2 px-2 rounded xs:text-sm"
                  name="categories"
                  v-model="campaign.categories_id"
                >
                  <option
                    v-for="val in categories"
                    :key="val.id"
                    :value="val.id"
                    class="capitalize"
                  >
                    {{ val.categories }}
                  </option>
                </select>
              </label>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2 mt-4">
          <div class="col-span-1">
            <h6 class="font-semibold py-3 text-lg inline xs:text-sm">Deskripsi</h6>
            <span
              class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
              >Wajib</span
            >
            <p class="text-xs lg:pr-20 md:pr-10 xs:pr-0">
              Tulis deskripsi campaign Anda sedetail mungkin
            </p>
          </div>

          <div class="sm:col-span-2">
            <div>
              <textarea
                required
                class="w-full h-96 appearance-none border rounded py-3 px-3 text-gray-900 leading-tight focus:outline-none focus:border-indigo-500 xs:text-sm"
                placeholder=""
                rows="5"
                v-model="campaign.description"
              />
            </div>
          </div>
        </div>
      </section>

      <h5 class="font-semibold py-3 px-6 xs:px-4 text-xl inline text-gray-600 xs:text-md">
        Harga Campaign
      </h5>
      <section
        class="mx-3 mb-10 w-full py-5 px-6 xs:px-4 rounded-b-md shadow-md bg-white"
      >
        <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2">
          <div class="col-span-1">
            <h6 class="font-semibold py-3 text-lg inline xs:text-sm">Jumlah Slot</h6>
            <span
              class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
              >Wajib</span
            >
            <p class="text-xs md:pr-20">
              Masukan total slot yang Anda buka untuk campaign (Tidak termasuk Anda)
            </p>
          </div>

          <div class="sm:col-span-2">
            <div>
              <input
                type="number"
                required
                min="2"
                max="20"
                class="w-full border focus:outline-none focus:ring focus:border-indigo-400 p-2 rounded xs:text-sm"
                placeholder="Contoh: 2"
                @keypress="filterDecimal"
                v-model="campaign.slot_capacity"
              />
            </div>
            <span
              class="text-red-700 text-sm font-semibold"
              v-if="campaign.slot_capacity !== '' && campaign.slot_capacity < 2"
              >*Jumlah minimal slot 2</span
            >
            <!-- sementara kapasitas maksimumnya 10 dulu -->
            <span
              class="text-red-700 text-sm font-semibold"
              v-if="campaign.slot_capacity !== '' && campaign.slot_capacity > 10"
              >*Jumlah maksimal slot 10</span
            >
          </div>
        </div>

        <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2 mt-4">
          <div class="col-span-1">
            <h6 class="font-semibold py-3 text-lg inline xs:text-sm">Harga/slot</h6>
            <span
              class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
              >Wajib</span
            >
            <p class="text-xs md:pr-20">
              Anda bebas menentukan harga setiap slot yang harus dikeluarkan anggota
              campaign. Rentang harga yang diperbolehkan Rp 10.000 - Rp 499.999.
            </p>
          </div>

          <div class="sm:col-span-2">
            <div class="mt-1 relative rounded-md shadow-sm">
              <div
                class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"
              >
                <span class="text-gray-800 text-sm">Rp</span>
              </div>
              <input
                type="number"
                name="price"
                min="10000"
                id="price"
                class="border focus:outline-none focus:ring focus:border-indigo-400 p-2 xs:text-sm block w-full pl-10 rounded"
                placeholder="10000"
                required
                @keypress="filterDecimal"
                v-model="campaign.slot_price"
              />
            </div>
            <!-- sementara ada batas atas 500 ribu -->
            <span
              class="text-red-700 text-sm font-semibold"
              v-if="
                campaign.slot_price !== '' &&
                campaign.slot_price < 10000 &&
                campaign.slot_price >= 500000
              "
              >*Rentang harga yang diperbolehkan Rp 10.000 - Rp 499.999</span
            >
          </div>
        </div>
      </section>

      <h5 class="font-semibold py-3 px-6 xs:px-4 text-xl inline text-gray-600 xs:text-md">
        Waktu Campaign
      </h5>
      <section
        class="mx-3 mb-10 w-full py-5 px-6 xs:px-4 rounded-b-md shadow-md bg-white"
      >
        <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2">
          <div class="col-span-1">
            <h6 class="font-semibold py-3 text-lg inline xs:text-sm">Durasi Campaign</h6>
            <span
              class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
              >Wajib</span
            >
            <p class="text-xs md:pr-20">Pilih durasi/lama dari platform anda berjalan</p>
          </div>

          <div class="sm:col-span-2 xs:pl-4">
            <div class="grid grid-cols-3 gap-2">
              <label class="inline-flex items-center py-2 xs:py-0">
                <input
                  type="number"
                  min="1"
                  class="w-full border focus:outline-none focus:ring focus:border-indigo-400 p-2 rounded xs:text-sm"
                  placeholder="Contoh: 2"
                  v-model="duration.value"
                  v-on:blur="setDurationDate"
                  @keypress="filterDecimal"
                  required
                />
              </label>
              <label class="inline-flex items-center py-2 xs:py-0">
                <select
                  class="w-full border focus:outline-none focus:ring focus:border-indigo-400 py-2 px-1 rounded xs:text-sm"
                  name="range_period"
                  id="range_period"
                  v-model="duration.unit"
                  v-on:change="setDurationDate"
                >
                  <option value="days">Hari</option>
                  <option value="months">Bulan</option>
                  <option value="years">Tahun</option>
                </select>
              </label>
            </div>
          </div>
        </div>

        <div class="grid grid-cols-3 xs:grid-cols-1 gap-4 xs:gap-2 mt-4">
          <div class="col-span-1">
            <h6 class="font-semibold py-3 text-lg inline xs:text-sm">Expired Campaign</h6>
            <span
              class="bg-red-200 p-1 ml-1 rounded-md w-auto text-red-600 text-xs font-semibold"
              >Wajib</span
            >
            <p class="text-xs lg:pr-20 md:pr-10 xs:pr-0">
              Pilih lama campaign Anda aktif pada Patungin.com
            </p>
          </div>

          <div class="sm:col-span-2 xs:pl-4">
            <div class="grid grid-cols-3 gap-2">
              <label class="inline-flex items-center py-2 xs:py-0">
                <input
                  type="radio"
                  name="expired"
                  class="form-radio h-4 w-4 xs:h-3 xs:w-3 text-gray-600"
                  v-model="expired.value"
                  value="1"
                  v-on:change="addDateExpired"
                  :disabled="task == 'edit'"
                /><span class="ml-2 text-gray-700 xs:text-sm">1 Hari</span>
              </label>
              <label class="inline-flex items-center py-2 xs:py-0">
                <input
                  name="expired"
                  type="radio"
                  class="form-radio h-4 w-4 text-gray-600 xs:h-3 xs:w-3"
                  v-model="expired.value"
                  v-on:change="addDateExpired"
                  value="3"
                  :disabled="task == 'edit'"
                /><span class="ml-2 text-gray-700 xs:text-sm">3 Hari</span>
              </label>
              <label class="inline-flex items-center py-2 xs:py-0">
                <input
                  name="expired"
                  type="radio"
                  class="form-radio h-4 w-4 text-gray-600 xs:h-3 xs:w-3"
                  v-model="expired.value"
                  v-on:change="addDateExpired"
                  value="7"
                  :disabled="task == 'edit'"
                /><span class="ml-2 text-gray-700 xs:text-sm">7 Hari</span>
              </label>
            </div>
          </div>
        </div>
      </section>

      <section class="mx-3 w-full pt-2 py-5 px-6 my-4 rounded-b-md shadow-md bg-white">
        <div class="mt-4 mb-1 xs:my-2">
          <h5 class="font-semibold py-3 text-lg inline xs:text-sm">Upload Foto</h5>
          <span
            class="bg-gray-200 p-1 ml-1 rounded-md w-auto text-gray-600 text-xs font-semibold"
            >Opsional</span
          >
        </div>
        <div class="mb-3">
          <p class="text-sm">Format gambar .jpg .jpeg .png</p>
        </div>
        <div class="pb-5 flex flex-wrap items-center justify-between">
          <div
            id="empty-cover-art"
            class="rounded w-full md:px-4 py-16 xs:py-8 text-center md:border-solid md:border md:border-gray-400"
          >
            <canvas
              v-if="campaign.media_blob !== ''"
              class="object-contain h-56 w-full mb-4"
              id="canvas"
            ></canvas>
            <svg
              v-else
              class="mx-auto h-12 w-12 text-gray-500 m-3"
              stroke="currentColor"
              fill="none"
              viewBox="0 0 48 48"
              aria-hidden="true"
            >
              <path
                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
            <input
              type="file"
              accept="image/*"
              class="text-sm border rounded w-full p-3"
              @change="setImageFile"
            />
            <!-- <div class="py-4">Tambah Foto</div> -->
          </div>
        </div>
      </section>
      <label class="flex items-center pl-3 py-3 xs:pl-0">
        <input
          type="checkbox"
          name="expired"
          class="form-tick h-6 w-6 xs:h-5 xs:w-5 focus:outline-none text-gray-600"
          v-model="terms"
        />
        <span class="ml-3 xs:ml-2 text-gray-700 xs:text-sm"
          >Kamu menyetujui
          <NuxtLink to="/tnc" class="text-red-500">Syarat dan Ketentuan</NuxtLink>
          yang berlaku pada layanan ini</span
        >
      </label>

      <div class="w-full text-center my-5 md:my-10">
        <button
          class="w-1/3 xs:w-full py-2 rounded text-white inline-block shadow-md bg-indigo-500 hover:bg-indigo-600 focus:bg-indigo-700"
          type="submit"
          v-bind:class="[isDisabled ? 'opacity-50' : '']"
          :disabled="isDisabled"
        >
          <span class="inline-flex items-center p-0 m-0">
            <svg
              v-if="loading"
              class="animate-spin -ml-1 mr-3 h-4 w-4 text-white"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
            >
              <circle
                class="opacity-25"
                cx="12"
                cy="12"
                r="10"
                stroke="currentColor"
                stroke-width="4"
              ></circle>
              <path
                class="opacity-75"
                fill="currentColor"
                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
              ></path>
            </svg>

            Buat Campaign</span
          >
        </button>
        <span
          class="text-red-800 text-sm block text-font-semibold"
          v-if="message_error === true"
          >Terdapat kesalahan, cek kembali Formnya</span
        >
      </div>
    </form>
  </div>
</template>
<script>
import moment from "moment";
import loadImage from "blueimp-load-image";

export default {
  name: "Create_Campaign",
  props: ["task"],
  // semua form akan disimpan dalam campaign atribute
  // categories disini gunanya untuk dropdown
  data() {
    return {
      loading: false,
      message_error: false,
      terms: false,
      categories: "",
      img_base64: null,
      duration: {
        value: "",
        unit: "days",
      },
      expired: {
        value: "",
      },
      campaign: {
        categories_id: "",
        title: "",
        status: "0",
        description: "",
        expired_date: "",
        duration_date: "",
        durasi: "",
        slot_capacity: "",
        slot_price: "",
        media_blob: "",
        media_url: "",
        password_email: "",
      },
    };
  },

  computed: {
    isDisabled: function () {
      return !this.terms;
    },
  },

  methods: {
    handleSave() {
      if (
        parseInt(this.campaign.slot_price) < 10000 ||
        parseInt(this.campaign.slot_price) >= 500000 ||
        parseInt(this.campaign.slot_capacity) < 2 ||
        parseInt(this.campaign.slot_capacity) > 10
      ) {
        this.message_error = true;
        setTimeout(() => {
          this.message_error = false;
        }, 5000);
      } else {
        this.loading = true;
        this.campaign.expired_date = moment(this.campaign.expired_date).format(
          "YYYY-MM-DD HH:mm:ss"
        );
        this.campaign.duration_date = moment(this.campaign.duration_date).format(
          "YYYY-MM-DD HH:mm:ss"
        );

        //   Smart ways, daripada capek pak formData satu satu, astagfiruloh
        let formData = new FormData();
        Object.keys(this.campaign).map((key) => {
          formData.append(key, this.campaign[key]);
        });
        // console.log(this.campaign)
        if (this.task === "create") {
          this.$axios
            .$post(`campaign/store/${this.$store.state.user.id}`, formData)
            .then((resp) => {
              console.log(resp);
              if (resp.message === "CREATED") {
                this.$toast.show({
                  title: "Berhasil dibuat",
                  message: "Yeay, Campaign kamu berhasil dibuat!",
                  classToast: "bg-green-400",
                  classTitle: "text-white text-xl",
                  classMessage: "text-white",
                  classClose: "text-green-200",
                  classTimeout: "bg-green-600",
                  timeout: 3,
                });
                this.loading = false;
                this.$router.push(`/campaign/${resp.campaign.id}/${resp.campaign.slug}`);
              }
            })
            .catch((errors) => {
              console.log(errors);
            });
        } else {
          this.$axios
            .$post(`campaign/update/${this.campaign.id}`, formData)
            .then((resp) => {
              console.log(resp);
              if (resp.message === "UPDATED") {
                this.$toast.show({
                  title: "Berhasil Disimpan",
                  message: "Campaign kamu telah disimpan",
                  classToast: "bg-green-400",
                  classTitle: "text-white text-xl",
                  classMessage: "text-white",
                  classClose: "text-green-200",
                  classTimeout: "bg-green-600",
                  timeout: 3,
                });
                this.loading = false;
                this.$router.push(`/campaign/${resp.campaign.id}/${resp.campaign.slug}`);
              }
            })
            .catch((errors) => {
              console.dir(errors);
            });
        }
      }
    },

    filterDecimal(e) {
      const key = e.key;

      // If is '.' key, stop it
      if (key === ".") return e.preventDefault();

      // OPTIONAL
      // If is 'e' key, stop it
      if (key === "e") return e.preventDefault();
    },

    /**
     * @param e = event dari input file onchange
     */
    async setImageFile(e) {
      if (e !== null || e.target.files) {
        this.campaign.media_blob = e.target.files[0];
        var self = this;

        await loadImage(e.target.files[0], {
          orientation: true,
          meta: true,
          canvas: true,
        })
          .then(function (data) {
            if (!data.exif || !data.imageHead) return; // jika tidak terdapat exif maka return
            /**
             * return blob, blob disimpan kembali ke file
             * as jpeg
             */
            return new Promise(function (resolve) {
              data.image.toBlob(function (blob) {
                data.blob = blob;
                resolve(data);
              }, "image/jpeg");
            });
          })
          .then(function (data) {
            if (!data) return;
            self.campaign.media_blob = data.blob;
          })
          .catch((err) => console.error(err));

        // draw blob ke gambar as canvas
        if (typeof FileReader === "function") {
          const reader = new FileReader();
          reader.readAsDataURL(this.campaign.media_blob);
          reader.onload = (event) => {
            self.img_base64 = event.target.result;
            this.drawToCanvas(event.target.result);
          };
        }
      }
    },

    /**
     * hanya menerima base64
     * @param base64 = string contain base64 file
     */
    drawToCanvas(base64) {
      const img = new Image();
      img.src = base64; // assign converted image to image object
      img.onload = function () {
        const canvas = document.getElementById("canvas"); // create canvas object
        const ctx = canvas.getContext("2d");
        canvas.width = img.width;
        canvas.height = img.height;
        ctx.drawImage(img, 0, 0); // draw image
      };
    },

    setDurationDate() {
      if (this.duration.value !== "") {
        if (this.duration.unit == "days") {
          if (this.duration.value > 31) {
            this.duration.value = 31;
          }
          this.campaign.duration_date = this.addDate(
            parseInt(this.duration.value),
            "days"
          );
          this.campaign.durasi = this.duration.value + " Hari";
        }
        if (this.duration.unit == "months") {
          if (this.duration.value > 12) {
            this.duration.value = 12;
          }
          this.campaign.duration_date = this.addDate(
            parseInt(this.duration.value),
            "months"
          );
          this.campaign.durasi = this.duration.value + " Bulan";
        }
        if (this.duration.unit == "years") {
          this.campaign.duration_date = this.addDate(
            parseInt(this.duration.value),
            "years"
          );
          this.campaign.durasi = this.duration.value + " Tahun";
        }
      } else {
        return;
      }
    },

    addDateExpired() {
      var date = new Date();
      this.campaign.expired_date = new Date(
        date.setDate(date.getDate() + parseInt(this.expired.value))
      ).toISOString();
    },

    addDate(val, unit) {
      let date = new Date();
      switch (unit) {
        case "days":
          return new Date(date.setDate(date.getDate() + val)).toISOString();
        case "months":
          return new Date(date.setMonth(date.getMonth() + val)).toISOString();
        case "years":
          return new Date(date.setFullYear(date.getFullYear() + val)).toISOString();
      }
    },
  },

  mounted() {
    if (this.task === "create") {
      console.log("create");
    } else {
      this.$axios.$get(`campaign/${this.$route.params.idCampaign}`).then((resp) => {
        console.log(resp);
        this.campaign = resp.campaigns;

        let duration = resp.campaigns.durasi.toLowerCase().split(" ");
        this.duration.value = duration[0];
        this.duration.unit =
          duration[1] === "hari" ? "days" : duration[1] === "bulan" ? "months" : "years";
        let date_created = moment.utc(resp.campaigns.created_at).toDate();
        let date_created_local = moment(date_created)
          .local()
          .format("YYYY-MM-DD HH:mm:ss");
        let date_expired = moment(resp.campaigns.expired_date).format(
          "YYYY-MM-DD HH:mm:ss"
        );
        console.log(date_expired);
        console.log(date_created_local);
        this.expired.value = moment
          .duration(
            moment(date_expired, "YYYY-MM-DD").diff(
              moment(date_created_local, "YYYY-MM-DD")
            )
          )
          .asDays();
        delete this.campaign.email_id;
      });
    }
    this.$axios
      .$get("campaign/categories")
      .then((resp) => {
        const { categories } = resp;
        this.categories = categories;
        // console.log(this.categories)
      })
      .catch((errors) => {
        console.log(errors);
      });
  },
  // beforeMount() {
  //   this.$destroy()
  // },
};
</script>

<style scoped>
input:checked + svg {
  display: block;
}
</style>
