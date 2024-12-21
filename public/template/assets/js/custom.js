/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

// Fungsi Hapus
function hapus(id) {
  $("#del-" + id).submit();
}

function prints(id) {
  console.log(id);
  document.getElementById("jenisnya").value = id;
  $("#prints").submit();
}

//Pagination
$(document).ready(function () {
  $("#myTable").DataTable();
});

// //TAMBAH BARIS BARU
// function Barisbaru() {
//     var Nomor = $("#tableLoop tbody tr").length + 1;
//     var Baris = '<tr>';
//         Baris += '<td class="text-center">' + Nomor + '</td>';
//         Baris += '<td>';
//         Baris += '<select class="form-control" name="kode_akun[]" id="kode_akun' + Nomor + '" required></select>';
//         Baris += '</td>';
//         Baris += '<td>';
//         Baris += '<select class="form-control" name="kode_item[]" id="kode_item' + Nomor + '" required></select>';
//         Baris += '</td>';
//         Baris += '<td>';
//         Baris += '<input type="text" name="rincian[]" class="form-control" placeholder="rincian..." required></input>';
//         Baris += '</td>';
//         Baris += '<td>';
//         Baris += '<input type="number" name="volume[]" class="form-control" placeholder="volume..." required></input>';
//         Baris += '</td>';
//         Baris += '<td>';
//         Baris += '<input type="number" name="harga_satuan[]" class="form-control" placeholder="harga satuan..." required></input>';
//         Baris += '</td>';
//         Baris += '<td>';
//         Baris += '<input type="number" name="jumlah[]" class="form-control" placeholder="jumlah..." required></input>';
//         Baris += '</td>';
//         // Baris += '<td>';
//         // Baris += '<select class="form-control" name="id_status[]" id="id_status"' + Nomor + '" required></select>';
//         // Baris += '</td>';
//         Baris += '<td class="text-center">';
//         Baris += '<a class="btn btn-sm btn-warning" title="Hapus Baris" id="HapusBaris"><i class="fas fa-trash"></i></a>'
//         Baris += '</td>';
//         Baris += '</tr>';

//         $("#tableLoop tbody").append(Baris);
//         $("#tableLoop tbody td").each(function(){
//             $(this).find('td:nth-child(2) input').focus();
//         });

//         FormSelectAkun(Nomor);
//         FormSelectItem(Nomor);
//         // FormSelectStatus(Nomor);
// }
// $(document).ready(function(){
//     var A;
//     for (A = 1; A<= 1; A++){
//         Barisbaru();
//     }
//     $('#Barisbaru').click(function(e){
//         e.preventDefault();
//         Barisbaru();
//     });
//     $("tableLoop tbody").find('input[type=text').filter(':visible:first').focus();
// });

// $(document).on('click', '#HapusBaris', function(e){
//     e.preventDefault();
//     var Nomor = 1;
//     $(this).parent().parent().remove();
//     $('tableLoop tbody tr').each(function(){
//         $(this).find('td:nth-child(1)').html(Nomor);
//         Nomor++;
//     });
// });

// function FormSelectAkun(Nomor) {
//     var output = [];
//     output.push('<option value=""> Pilih Data </option>');
//     //ambil datanya disini
//         $.getJSON('/TransaksiPembinaan/akun',function(data){
//             $.each(data, function(key,value){
//                 output.push('<option value="' + value.kode_akun + '">' + value.kode_akun + '|' + value.nama_akun + '</option>');
//             });
//         $('#kode_akun' + Nomor).html(output.join(''));
//     });
// }

// function FormSelectItem(Nomor) {
//     var output = [];
//     output.push('<option value=""> Pilih Data </option>');
//     //ambil datanya disini
//         $.getJSON('/TransaksiPembinaan/item',function(data){
//             $.each(data, function(key,value){
//                 output.push('<option value="' + value.kode_item + '">' + value.kode_item + '|' + value.nama_item + '</option>');
//             });
//         $('#kode_item' + Nomor).html(output.join(''));
//     });
// }

function FormSelectStatus(Nomor) {
  var output = [];
  output.push('<option value=""> Pilih Data </option>');
  //ambil datanya disini
  $.getJSON("/Transaksi/status", function (data) {
    $.each(data, function (key, value) {
      output.push(
        '<option value="' +
          value.kode_status +
          '">' +
          value.kode_status +
          "|" +
          value.nama_status +
          "</option>"
      );
    });
    $("#kode_status" + Nomor).html(output.join(""));
  });
}

// Mengonversi data PHP ke format JSON dan menyimpannya dalam variabel JavaScript
var kegiatanAkun = JSON.parse(
  document.getElementById("kegiatan-akun-data").textContent
);
var kodeItem = JSON.parse(
  document.getElementById("kode-item-data").textContent
);

console.log(kegiatanAkun); // Debugging untuk memastikan data diterima
console.log(kodeItem); // Debugging untuk memastikan data diterima

// Fungsi untuk menambahkan baris baru
function addRow() {
  const tableBody = document.getElementById("tableBody");
  const rowCount = tableBody.rows.length;
  const newRow = tableBody.insertRow(rowCount);

  let kegiatanOptions = "";
  kegiatanAkun.forEach(function (kegiatan) {
    kegiatanOptions += `<option value="${kegiatan.kegiatan}">${kegiatan.kegiatan}</option>`;
  });

  let akunOptions = "";
  kegiatanAkun.forEach(function (kegiatan) {
    akunOptions += `<option value="${kegiatan.akun}">${kegiatan.akun}</option>`;
  });

  let kodeItemOptions = "";
  kodeItem.forEach(function (item) {
    kodeItemOptions += `<option value="${item.kode_item}">${item.kode_item}</option>`;
  });

  newRow.innerHTML = `
        <td style="width: 5%">${rowCount + 1}</td>
        <td style="width: 20%">
            <select class="form-control" name="data[${rowCount}][kegiatan]" required>
                <option value="">Pilih Kegiatan</option>
                ${kegiatanOptions}
            </select>
        </td>
        <td style="width: 15%">
            <select class="form-control" name="data[${rowCount}][akun]" required>
                <option value="">Pilih Akun</option>
                ${akunOptions}
            </select>
        </td>
        <td style="width: 10%">
            <select class="form-control" name="data[${rowCount}][kode_item]" required>
                <option value="">Pilih Kode Item</option>
                ${kodeItemOptions}
            </select>
        </td>
        <td style="width: 20%"><input type="text" class="form-control" name="data[${rowCount}][rincian]" required></td>
        <td style="width: 10%"><input type="number" class="form-control volume-input" name="data[${rowCount}][volume]" value="0" min="0" required></td>
        <td style="width: 10%"><input type="number" class="form-control harga-input" name="data[${rowCount}][harga_satuan]" value="0" min="0" required></td>
        <td style="width: 10%"><input type="text" class="form-control jumlah-input" name="data[${rowCount}][jumlah]" value="0" readonly></td>
        <td><button type="button" class="btn btn-danger btn-sm remove"><i class="fa fa-trash"></i></button></td>
    `;

  const row = newRow;
  const volumeInput = row.querySelector(".volume-input");
  const hargaInput = row.querySelector(".harga-input");
  const jumlahInput = row.querySelector(".jumlah-input");

  function updateJumlah() {
    const volume = parseFloat(volumeInput.value) || 0;
    const harga = parseFloat(hargaInput.value) || 0;
    const total = volume * harga;
    jumlahInput.value = total.toFixed(2);
  }

  volumeInput.addEventListener("input", updateJumlah);
  hargaInput.addEventListener("input", updateJumlah);

  const removeButton = newRow.querySelector(".remove");
  removeButton.addEventListener("click", function () {
    newRow.remove();
    updateRowNumbers();
  });
}

// Fungsi untuk memperbarui nomor urut
function updateRowNumbers() {
  const rows = document.querySelectorAll("#tableBody tr");
  rows.forEach((row, index) => {
    row.querySelector("td:first-child").innerText = index + 1;
  });
}

document.querySelector("form").addEventListener("submit", function (e) {
  const rows = document.querySelectorAll("#tableBody tr");
  let valid = true;

  rows.forEach((row) => {
    const inputs = row.querySelectorAll("input, select");
    inputs.forEach((input) => {
      if (!input.value) {
        valid = false;
        alert("Harap isi semua field di tabel!");
      }
    });
  });

  if (!valid) {
    e.preventDefault();
  }
});

document.querySelectorAll("select").forEach(function (select) {
  select.addEventListener("change", function () {
    console.log(`${this.name}: ${this.value}`);
  });
});

function addEventListenersToSelects() {
  document.querySelectorAll("select").forEach(function (select) {
    if (!select.dataset.listenerAdded) {
      select.addEventListener("change", function () {
        console.log(`${this.name}: ${this.value}`);
      });
      select.dataset.listenerAdded = true;
    }
  });
}

document.getElementById("addRowButton").addEventListener("click", function () {
  addRow();
});

document.addEventListener("DOMContentLoaded", function () {
  addRow();
});

// //TAMBAH BARIS BARU PEMBINAAN
// function Barisbarupembinaan() {
//     var Nomor = $("#tableLoop tbody tr").length + 1;
//     var Baris = '<tr>';
//         Baris += '<td class="text-center">' + Nomor + '</td>';
//         Baris += '<td>';
//         Baris += '<select class="form-control" name="kegiatan[]" id="akun' + Nomor + '" required></select>';
//         Baris += '</td>';
//         Baris += '<td>';
//         Baris += '<select class="form-control" name="kode_item[]" id="kode_item' + Nomor + '" required></select>';
//         Baris += '</td>';
//         Baris += '<td>';
//         Baris += '<input type="text" name="rincian[]" class="form-control" placeholder="rincian..." required></input>';
//         Baris += '</td>';
//         Baris += '<td>';
//         Baris += '<input type="number" name="volume[]" class="form-control volume" id="volume' + Nomor + '" placeholder="volume..." required></input>';
//         Baris += '</td>';
//         Baris += '<td>';
//         Baris += '<input type="number" name="harga_satuan[]" class="form-control harga_satuan" id="harga_satuan' + Nomor + '" placeholder="harga satuan..." required></input>';
//         Baris += '</td>';
//         Baris += '<td>';
//         Baris += '<input type="number" name="jumlah[]" class="form-control jumlah" id="jumlah' + Nomor + '" placeholder="jumlah..." readonly></input>';
//         Baris += '</td>';
//         Baris += '<td class="text-center">';
//         Baris += '<a class="btn btn-sm btn-warning" title="Hapus Baris" id="HapusBaris"><i class="fas fa-trash"></i></a>';
//         Baris += '</td>';
//         Baris += '</tr>';

//     $("#tableLoop tbody").append(Baris);

//     // Fungsi untuk mengatur select akun dan item
//     FormSelectAkun(Nomor);
//     FormSelectItem(Nomor);

//     // Menambahkan event listener untuk perubahan pada volume dan harga_satuan
//     updateJumlah(Nomor);
// }

// function updateJumlah(Nomor) {
//   // Ketika volume atau harga_satuan berubah
//   $("#volume" + Nomor).on("input", function () {
//     hitungJumlah(Nomor);
//   });
//   $("#harga_satuan" + Nomor).on("input", function () {
//     hitungJumlah(Nomor);
//   });
// }

// function hitungJumlah(Nomor) {
//   // Ambil nilai volume dan harga_satuan
//   var volume = parseFloat($("#volume" + Nomor).val()) || 0;
//   var harga_satuan = parseFloat($("#harga_satuan" + Nomor).val()) || 0;

//   // Hitung jumlah
//   var jumlah = volume * harga_satuan;

//   // Update field jumlah
//   $("#jumlah" + Nomor).val(jumlah.toFixed(2)); // Menampilkan dengan 2 angka desimal
// }

$(document).ready(function () {
  var A;
  for (A = 1; A <= 1; A++) {
    Barisbarupembinaan();
  }
  $("#Barisbarupembinaan").click(function (e) {
    e.preventDefault();
    Barisbarupembinaan();
  });
  $("tableLoop tbody").find("input[type=text").filter(":visible:first").focus();
});

$(document).on("click", "#HapusBaris", function (e) {
  e.preventDefault();
  var Nomor = 1;
  $(this).parent().parent().remove();
  $("tableLoop tbody tr").each(function () {
    $(this).find("td:nth-child(1)").html(Nomor);
    Nomor++;
  });
});

function FormSelectAkun(Nomor) {
  var output = [];
  output.push('<option value=""> Pilih Data </option>');
  //ambil datanya disini
  $.getJSON("/PencairanPembinaan/akun", function (data) {
    $.each(data, function (key, value) {
      output.push(
        '<option value="' +
          value.kode_akun +
          '">' +
          value.kode_akun +
          "|" +
          value.nama_akun +
          "</option>"
      );
    });
    $("#akun" + Nomor).html(output.join(""));
  });
}

function FormSelectItem(Nomor) {
  var output = [];
  output.push('<option value=""> Pilih Data </option>');
  //ambil datanya disini
  $.getJSON("/PencairanPembinaan/item", function (data) {
    $.each(data, function (key, value) {
      output.push(
        '<option value="' +
          value.kode_item +
          '">' +
          value.kode_item +
          " | " +
          value.nama_item +
          "</option>"
      );
    });
    $("#kode_item" + Nomor).html(output.join(""));
  });
}

// function FormSelectStatus(Nomor) {
//     var output = [];
//     output.push('<option value=""> Pilih Data </option>');
//     //ambil datanya disini
//         $.getJSON('/Transaksi/status',function(data){
//             $.each(data, function(key,value){
//                 output.push('<option value="' + value.kode_status + '">' + value.kode_status + '|' + value.nama_status + '</option>');
//             });
//         $('#kode_status' + Nomor).html(output.join(''));
//     });
// }
