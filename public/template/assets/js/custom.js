/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

// Fungsi Hapus
function hapus(id){
    $('#del-'+id).submit();
}

function prints(id){
    console.log(id);
    document.getElementById('jenisnya').value = id;
    $('#prints').submit();
}

//Pagination 
$(document).ready(function(){
    $('#myTable').DataTable();
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
        $.getJSON('/Transaksi/status',function(data){
            $.each(data, function(key,value){
                output.push('<option value="' + value.kode_status + '">' + value.kode_status + '|' + value.nama_status + '</option>');
            });
        $('#kode_status' + Nomor).html(output.join(''));
    });
}


//TAMBAH BARIS BARU PEMBINAAN 
function Barisbarupembinaan() {
    var Nomor = $("#tableLoop tbody tr").length + 1;
    var Baris = '<tr>';
        Baris += '<td class="text-center">' + Nomor + '</td>';
        Baris += '<td>';
        Baris += '<select class="form-control" name="akun[]" id="akun' + Nomor + '" required></select>';
        Baris += '</td>';
        Baris += '<td>';
        Baris += '<select class="form-control" name="kode_item[]" id="kode_item' + Nomor + '" required></select>';
        Baris += '</td>';
        Baris += '<td>';
        Baris += '<input type="text" name="rincian[]" class="form-control" placeholder="rincian..." required></input>';
        Baris += '</td>';
        Baris += '<td>';
        Baris += '<input type="number" name="volume[]" class="form-control volume" id="volume' + Nomor + '" placeholder="volume..." required></input>';
        Baris += '</td>';
        Baris += '<td>';
        Baris += '<input type="number" name="harga_satuan[]" class="form-control harga_satuan" id="harga_satuan' + Nomor + '" placeholder="harga satuan..." required></input>';
        Baris += '</td>';
        Baris += '<td>';
        Baris += '<input type="number" name="jumlah[]" class="form-control jumlah" id="jumlah' + Nomor + '" placeholder="jumlah..." readonly></input>';
        Baris += '</td>';
        Baris += '<td class="text-center">';
        Baris += '<a class="btn btn-sm btn-warning" title="Hapus Baris" id="HapusBaris"><i class="fas fa-trash"></i></a>';
        Baris += '</td>';
        Baris += '</tr>';
        
    $("#tableLoop tbody").append(Baris);

    // Fungsi untuk mengatur select akun dan item
    FormSelectAkun(Nomor);
    FormSelectItem(Nomor);

    // Menambahkan event listener untuk perubahan pada volume dan harga_satuan
    updateJumlah(Nomor);
}

function updateJumlah(Nomor) {
    // Ketika volume atau harga_satuan berubah
    $('#volume' + Nomor).on('input', function() {
        hitungJumlah(Nomor);
    });
    $('#harga_satuan' + Nomor).on('input', function() {
        hitungJumlah(Nomor);
    });
}

function hitungJumlah(Nomor) {
    // Ambil nilai volume dan harga_satuan
    var volume = parseFloat($('#volume' + Nomor).val()) || 0;
    var harga_satuan = parseFloat($('#harga_satuan' + Nomor).val()) || 0;

    // Hitung jumlah
    var jumlah = volume * harga_satuan;

    // Update field jumlah
    $('#jumlah' + Nomor).val(jumlah.toFixed(2));  // Menampilkan dengan 2 angka desimal
}

$(document).ready(function(){
    var A;
    for (A = 1; A<= 1; A++){
        Barisbarupembinaan();
    }
    $('#Barisbarupembinaan').click(function(e){
        e.preventDefault();
        Barisbarupembinaan();
    });
    $("tableLoop tbody").find('input[type=text').filter(':visible:first').focus();
});

$(document).on('click', '#HapusBaris', function(e){
    e.preventDefault();
    var Nomor = 1;
    $(this).parent().parent().remove();
    $('tableLoop tbody tr').each(function(){
        $(this).find('td:nth-child(1)').html(Nomor);
        Nomor++;
    });
});

function FormSelectAkun(Nomor) {
    var output = [];
    output.push('<option value=""> Pilih Data </option>');
    //ambil datanya disini
        $.getJSON('/PencairanPembinaan/akun',function(data){
            $.each(data, function(key,value){
                output.push('<option value="' + value.kode_akun + '">' + value.kode_akun + '|' + value.nama_akun + '</option>');
            }); 
        $('#akun' + Nomor).html(output.join(''));
    });
}

function FormSelectItem(Nomor) {
    var output = [];
    output.push('<option value=""> Pilih Data </option>');
    //ambil datanya disini
        $.getJSON('/PencairanPembinaan/item',function(data){
            $.each(data, function(key,value){
                output.push('<option value="' + value.kode_item + '">' + value.kode_item + ' | ' + value.nama_item + '</option>');
            });
        $('#kode_item' + Nomor).html(output.join(''));
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
