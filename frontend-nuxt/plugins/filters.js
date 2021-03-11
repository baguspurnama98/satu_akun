import Vue from 'vue'
import moment from 'moment'
import 'moment/locale/id'
moment.locale('id')

Vue.filter('formatRupiah', (nominal) => {
  var number_string = String(nominal)
      .replace(/[^,\d]/g, '')
      .toString(),
    split = number_string.split(','),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi)

  if (ribuan) {
    let separator = sisa ? '.' : ''
    rupiah += separator + ribuan.join('.')
  }

  rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah
  return rupiah ? 'Rp ' + rupiah : ''
})

Vue.filter('formatDate', (date) => {
  const monthNames = [
    'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember',
  ]
  let dateNew = moment(date).format('DD/MM/YYYY')
  var splitted = dateNew.split('/')
  return `${splitted[0]} ${monthNames[splitted[1] - 1]} ${splitted[2]}`
})

Vue.filter('remainingTime', (date) => {
  const sisaTime = moment(date, 'YYYY-MM-DD HH:mm:ss').fromNow()
  var newsisaTime = sisaTime.split(' ').slice(1).join(' ')
  return newsisaTime
})
