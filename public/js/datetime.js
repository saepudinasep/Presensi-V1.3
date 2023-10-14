
function date_time(id)
{

        date    = new Date;
        tahun   = date.getFullYear();
        bulan   = date.getMonth();
        if(bulan<10) { bulan = "0"+bulan; }
        tanggal = date.getDate();
        if(tanggal<10) { tanggal = "0"+tanggal; }
        // hari    = date.getDay();

        // namabulan = new Array('Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        // namahari  = new Array('Minggu','Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu');

        h = date.getHours();
        if(h<10) { h = "0"+h; }
        m = date.getMinutes();
        if(m<10) { m = "0"+m; }
        s = date.getSeconds();
        if(s<10) { s = "0"+s; }

        //susun dengan format baru
        // result = namahari[hari]+', '+tanggal+' '+namabulan[bulan]+' '+tahun+' / '+h+':'+m+':'+s;
        hasil = tahun+'-'+bulan+'-'+tanggal+' '+h+':'+m+':'+s;
        document.getElementById(id).innerHTML = hasil;
        setTimeout('date_time("'+id+'");','1000');
        return true;
}