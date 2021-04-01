<template>
  <div>
    <ManageCampaign :task="'edit'" />
  </div>
</template>
<script>
import moment from 'moment'
import loadImage from 'blueimp-load-image'
import ManageCampaign from '@/components/Campaign/ManageCampaign'

export default {
  name: 'Create_Campaign',
  // semua form akan disimpan dalam campaign atribute
  // categories disini gunanya untuk dropdown
  data() {
    return {
      loading: false,
      terms: false,
      categories: '',
      img_base64: null,
      duration: {
        value: '',
        unit: 'days',
      },
      expired: {
        value: '',
      },
      campaign: {
        id: '',
        categories_id: '',
        title: '',
        status: '0',
        description: '',
        expired_date: '',
        duration_date: '',
        durasi: '',
        slot_capacity: '',
        slot_price: '',
        media_blob: '',
        media_url: '',
        password_email: '',
      },
    }
  },

  computed: {
    isDisabled: function () {
      return !this.terms
    },
  },

  methods: {
    handleSave() {
      this.loading = true
      this.campaign.expired_date = moment(this.campaign.expired_date).format(
        'YYYY-MM-DD HH:mm:ss'
      )
      this.campaign.duration_date = moment(this.campaign.duration_date).format(
        'YYYY-MM-DD HH:mm:ss'
      )

      //   Smart ways, daripada capek pak formData satu satu, astagfiruloh
      let formData = new FormData()
      Object.keys(this.campaign).map((key) => {
        formData.append(key, this.campaign[key])
      })

      this.$axios
        .$post(`campaign/update/${this.campaign.id}`, formData)
        .then((resp) => {
          console.log(resp)
          if (resp.message === 'UPDATED') {
            this.$router.push(
              `/campaign/${resp.campaign.id}/${resp.campaign.slug}`
            )
          }
        })
        .catch((errors) => {
          console.dir(errors)
        })
    },

    /**
     * @param e = event dari input file onchange
     */
    async setImageFile(e) {
      if (e !== null || e.target.files) {
        this.campaign.media_blob = e.target.files[0]
        var self = this

        await loadImage(e.target.files[0], {
          orientation: true,
          meta: true,
          canvas: true,
        })
          .then(function (data) {
            if (!data.exif || !data.imageHead) return // jika tidak terdapat exif maka return
            /**
             * return blob, blob disimpan kembali ke file
             * as jpeg
             */
            return new Promise(function (resolve) {
              data.image.toBlob(function (blob) {
                data.blob = blob
                resolve(data)
              }, 'image/jpeg')
            })
          })
          .then(function (data) {
            if (!data) return
            self.campaign.media_blob = data.blob
          })
          .catch((err) => console.error(err))

        // draw blob ke gambar as canvas
        if (typeof FileReader === 'function') {
          const reader = new FileReader()
          reader.readAsDataURL(this.campaign.media_blob)
          reader.onload = (event) => {
            self.img_base64 = event.target.result
            this.drawToCanvas(event.target.result)
          }
        }
      }
    },

    /**
     * hanya menerima base64
     * @param base64 = string contain base64 file
     */
    drawToCanvas(base64) {
      const img = new Image()
      img.src = base64 // assign converted image to image object
      img.onload = function () {
        const canvas = document.getElementById('canvas') // create canvas object
        const ctx = canvas.getContext('2d')
        canvas.width = img.width
        canvas.height = img.height
        ctx.drawImage(img, 0, 0) // draw image
      }
    },

    setDurationDate() {
      if (this.duration.unit == 'days') {
        if (this.duration.value > 31) {
          this.duration.value = 31
        }
        this.campaign.duration_date = this.addDate(
          parseInt(this.duration.value),
          'days'
        )
        this.campaign.durasi = this.duration.value + ' Hari'
      }
      if (this.duration.unit == 'months') {
        if (this.duration.value > 12) {
          this.duration.value = 12
        }
        this.campaign.duration_date = this.addDate(
          parseInt(this.duration.value),
          'months'
        )
        this.campaign.durasi = this.duration.value + ' Bulan'
      }
      if (this.duration.unit == 'years') {
        this.campaign.duration_date = this.addDate(
          parseInt(this.duration.value),
          'years'
        )
        this.campaign.durasi = this.duration.value + ' Tahun'
      }
    },

    addDateExpired() {
      var date = new Date()
      this.campaign.expired_date = new Date(
        date.setDate(date.getDate() + parseInt(this.expired.value))
      ).toISOString()
    },

    addDate(val, unit) {
      let date = new Date()
      switch (unit) {
        case 'days':
          return new Date(date.setDate(date.getDate() + val)).toISOString()
        case 'months':
          return new Date(date.setMonth(date.getMonth() + val)).toISOString()
        case 'years':
          return new Date(
            date.setFullYear(date.getFullYear() + val)
          ).toISOString()
      }
    },
  },

  async mounted() {
    await this.$axios
      .$get('campaign/categories')
      .then((resp) => {
        const { categories } = resp
        this.categories = categories
        // console.log(this.categories)
      })
      .catch((errors) => {
        console.log(errors)
      })

    this.$axios
      .$get(`campaign/${this.$route.params.idCampaign}`)
      .then((resp) => {
        console.log(resp)
        this.campaign = resp.campaigns

        let duration = resp.campaigns.durasi.toLowerCase().split(' ')
        this.duration.value = duration[0]
        this.duration.unit =
          duration[1] === 'hari'
            ? 'days'
            : duration[1] === 'bulan'
            ? 'months'
            : 'years'
        this.expired.value = moment(resp.campaigns.expired_date).diff(
          moment(resp.campaigns.created_at),
          'days'
        )
        delete this.campaign.email_id
        console.log(this.expired.value)
      })
  },
}
</script>

<style scoped>
input:checked + svg {
  display: block;
}
</style>
