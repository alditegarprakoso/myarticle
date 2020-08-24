// event pada saat link diklik

$('.page-scroll').on('click', function(e){    
    // ambil isi dari href
    var tujuan =  $(this).attr('href');

    // tangkap elemen yang bersangkutan dengan href seperti section, div, dll
    var elemenTujuan = $(tujuan);
    
    // pindah scroll dengan scrollTop menggunakan animasi dari easing jquery
    $('html, body').animate({        
        scrollTop: elemenTujuan.offset().top - 100
    },1000, 'easeInOutExpo');

    e.preventDefault();
});