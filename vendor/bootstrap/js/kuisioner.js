function check() {
    var setPenting1 = document.querySelector("[name=penting1]:checked");
    var setPuas1 = document.querySelector("[name=puas1]:checked");
    var setPenting2 = document.querySelector("[name=penting2]:checked");
    var setPuas2 = document.querySelector("[name=puas2]:checked");
    var setPenting3 = document.querySelector("[name=penting3]:checked");
    var setPuas3 = document.querySelector("[name=puas3]:checked");
    var setPenting4 = document.querySelector("[name=penting4]:checked");
    var setPuas4 = document.querySelector("[name=puas4]:checked");
    var setPenting5 = document.querySelector("[name=penting5]:checked");
    var setPuas5 = document.querySelector("[name=puas5]:checked");
    var setPenting6 = document.querySelector("[name=penting6]:checked");
    var setPuas6 = document.querySelector("[name=puas6]:checked");
    var setPenting7 = document.querySelector("[name=penting7]:checked");
    var setPuas7 = document.querySelector("[name=puas7]:checked");
    var setPenting8 = document.querySelector("[name=penting8]:checked");
    var setPuas8 = document.querySelector("[name=puas8]:checked");
    var setPenting9 = document.querySelector("[name=penting9]:checked");
    var setPuas9 = document.querySelector("[name=puas9]:checked");
    var error = [];
    var background = [];
    var danger = [];
    if (!setPenting1) {
        error.push("No 1 Layanan Kepentingan belum diisi");
        background.push(document.getElementById("penting11").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting11").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (!setPuas1) {
        error.push("No 1 Layanan Kepuasan belum diisi");
        background.push(document.getElementById("penting12").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting12").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (!setPenting2) {
        error.push("No 2 Layanan Kepentingan belum diisi");
        background.push(document.getElementById("penting21").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting21").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (!setPuas2) {
        error.push("No 2 Layanan Kepuasan belum diisi");
        background.push(document.getElementById("penting22").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting22").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (!setPenting3) {
        error.push("No 3 Layanan Kepentingan belum diisi");
        background.push(document.getElementById("penting31").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting31").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (!setPuas3) {
        error.push("No 3 Layanan Kepuasan belum diisi");
        background.push(document.getElementById("penting32").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting32").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (!setPenting4) {
        error.push("No 4 Layanan Kepentingan belum diisi");
        background.push(document.getElementById("penting41").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting41").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (!setPuas4) {
        error.push("No 4 Layanan Kepuasan belum diisi");
        background.push(document.getElementById("penting42").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting42").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (!setPenting5) {
        error.push("No 5 Layanan Kepentingan belum diisi");
        background.push(document.getElementById("penting51").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting51").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (!setPuas5) {
        error.push("No 5 Layanan Kepuasan belum diisi");
        background.push(document.getElementById("penting52").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting52").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (!setPenting6) {
        error.push("No 6 Layanan Kepentingan belum diisi");
        background.push(document.getElementById("penting61").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting61").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (!setPuas6) {
        error.push("No 6 Layanan Kepuasan belum diisi");
        background.push(document.getElementById("penting62").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting62").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (!setPenting7) {
        error.push("No 7 Layanan Kepentingan belum diisi");
        background.push(document.getElementById("penting71").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting71").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (!setPuas7) {
        error.push("No 7 Layanan Kepuasan belum diisi");
        background.push(document.getElementById("penting72").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting72").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (!setPenting8) {
        error.push("No 8 Layanan Kepentingan belum diisi");
        background.push(document.getElementById("penting81").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting81").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (!setPuas8) {
        error.push("No 8 Layanan Kepuasan belum diisi");
        background.push(document.getElementById("penting82").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting82").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (!setPenting9) {
        error.push("No 9 Layanan Kepentingan belum diisi");
        background.push(document.getElementById("penting91").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting91").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (!setPuas9) {
        error.push("No 9 Layanan Kepuasan belum diisi");
        background.push(document.getElementById("penting92").setAttribute("style", "background-color:#FFBABA;border-color:#fd79a8;border-style: solid;border-radius: 5px;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: visible;"));
    }else{
        background.push(document.getElementById("penting92").setAttribute("style", "background-color:#ffbe76;"));
        danger.push(document.getElementById("danger").setAttribute("style","visibility: hidden;display:none;"));
    }
    if (error.length > 0) {
        alert(error.join('\n\n')); // show one or two errors with a newline
        background.join();
        return; // no need to stay
    }
}