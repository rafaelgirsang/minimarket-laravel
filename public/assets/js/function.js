function base_url() {

    var url;
    var hostname = window.location.hostname;
    if (hostname == '127.0.0.1') {
        url = window.location.origin + '';
    } else {
        url = window.location.origin + "/app";
    }
    return url;
}

function time() {
    date = new Date();
    millisecond = date.getMilliseconds();
    return jam = date.getHours();
}


function day(day) {
    date = new Date();
    millisecond = date.getMilliseconds();
    return day = date.getDate();
}

function monthName(bulan) {
    date = new Date();
    millisecond = date.getMilliseconds();
    arrbulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    var bulan = Number(bulan);

    if (bulan) {
        bulan = bulan - 1;
    } else {
        bulan = date.getMonth();
    }

    return arrbulan[bulan];

}

function month() {
    date = new Date();
    millisecond = date.getMilliseconds();
    return date.getMonth();
}


function year(tahun) {
    date = new Date();
    millisecond = date.getMilliseconds();
    if (tahun) {
        tahun = tahun;
    } else {
        tahun = date.getFullYear();;
    }
    return tahun;

}


function convertDateToIndoString(date) {

    let d = new Date(date);

    let a = d.toLocaleDateString("id"); // "17/8/2021"
    let b = a.split('/');
    return b[0] + ' ' + monthName(b[1]) + ' ' + b[2];
    // return e = b[0]+'-'+b[1]+'-'+b[2];


}


function formatIndo(date) {

    let d = new Date(date);

    let a = d.toLocaleDateString("id"); // "17/8/2021"
    return a;


}


function dd(variabel) {
    console.log(variabel);
}


function money(money) {

    const rupiah = new Intl.NumberFormat('id-ID').format(money)
    // const rupiah = (number)=>{  new Intl.NumberFormat("id-ID", {
    //     style: "currency",
    //     currency: "IDR"
    //   }).format(number);
    // }

    return rupiah;
}