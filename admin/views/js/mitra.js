const deleteButtons = document.getElementsByClassName('mitra-delete');
const id = document.getElementById('mitra-id');
const id_user = document.getElementById('mitra-id-user');
const detailButtons = document.getElementsByClassName('mitra-detail');
const name = document.getElementById('mitra-name');
const waktu = document.getElementById('mitra-waktu');
const puas1 = document.getElementById('puas-1');
const puas2 = document.getElementById('puas-2');
const puas3 = document.getElementById('puas-3');
const puas4 = document.getElementById('puas-4');
const puas5 = document.getElementById('puas-5');
const puas6 = document.getElementById('puas-6');
const puas7 = document.getElementById('puas-7');
const puas8 = document.getElementById('puas-8');
const puas9 = document.getElementById('puas-9');
const totalpuas = document.getElementById('total-puas');
const penting1 = document.getElementById('penting-1');
const penting2 = document.getElementById('penting-2');
const penting3 = document.getElementById('penting-3');
const penting4 = document.getElementById('penting-4');
const penting5 = document.getElementById('penting-5');
const penting6 = document.getElementById('penting-6');
const penting7 = document.getElementById('penting-7');
const penting8 = document.getElementById('penting-8');
const penting9 = document.getElementById('penting-9');
const totalpenting = document.getElementById('total-penting');

for (let button of deleteButtons) {
    button.addEventListener('click', () => {
        id.value = button.dataset.id
        id_user.value = button.dataset.user
    })
  }

for (let button of detailButtons) {
    button.addEventListener('click', () => {
        name.value = button.dataset.mitra
        waktu.value = button.dataset.waktu
        if(button.dataset.puas1 == 43.75){
            puas1.value = "Sangat Tidak Puas";
        }else if(button.dataset.puas1 == 62.50){
            puas1.value = "Tidak Puas";
        }else if(button.dataset.puas1 == 81.25){
            puas1.value = "Puas";
        }else if(button.dataset.puas1 == 100.00){
            puas1.value = "Sangat Puas";
        }
        if(button.dataset.puas2 == 43.75){
            puas2.value = "Sangat Tidak Puas";
        }else if(button.dataset.puas2 == 62.50){
            puas2.value = "Tidak Puas";
        }else if(button.dataset.puas2 == 81.25){
            puas2.value = "Puas";
        }else if(button.dataset.puas2 == 100.00){
            puas2.value = "Sangat Puas";
        }
        if(button.dataset.puas3 == 43.75){
            puas3.value = "Sangat Tidak Puas";
        }else if(button.dataset.puas3 == 62.50){
            puas3.value = "Tidak Puas";
        }else if(button.dataset.puas3 == 81.25){
            puas3.value = "Puas";
        }else if(button.dataset.puas3 == 100.00){
            puas3.value = "Sangat Puas";
        }
        if(button.dataset.puas4 == 43.75){
            puas4.value = "Sangat Tidak Puas";
        }else if(button.dataset.puas4 == 62.50){
            puas4.value = "Tidak Puas";
        }else if(button.dataset.puas4 == 81.25){
            puas4.value = "Puas";
        }else if(button.dataset.puas4 == 100.00){
            puas4.value = "Sangat Puas";
        }
        if(button.dataset.puas5 == 43.75){
            puas5.value = "Sangat Tidak Puas";
        }else if(button.dataset.puas5 == 62.50){
            puas5.value = "Tidak Puas";
        }else if(button.dataset.puas5 == 81.25){
            puas5.value = "Puas";
        }else if(button.dataset.puas5 == 100.00){
            puas5.value = "Sangat Puas";
        }
        if(button.dataset.puas6 == 43.75){
            puas6.value = "Sangat Tidak Puas";
        }else if(button.dataset.puas6 == 62.50){
            puas6.value = "Tidak Puas";
        }else if(button.dataset.puas6 == 81.25){
            puas6.value = "Puas";
        }else if(button.dataset.puas6 == 100.00){
            puas6.value = "Sangat Puas";
        }
        if(button.dataset.puas7 == 43.75){
            puas7.value = "Sangat Tidak Puas";
        }else if(button.dataset.puas7 == 62.50){
            puas7.value = "Tidak Puas";
        }else if(button.dataset.puas7 == 81.25){
            puas7.value = "Puas";
        }else if(button.dataset.puas7 == 100.00){
            puas7.value = "Sangat Puas";
        }
        if(button.dataset.puas9 == 43.75){
            puas9.value = "Sangat Tidak Puas";
        }else if(button.dataset.puas9 == 62.50){
            puas9.value = "Tidak Puas";
        }else if(button.dataset.puas9 == 81.25){
            puas9.value = "Puas";
        }else if(button.dataset.puas9 == 100.00){
            puas9.value = "Sangat Puas";
        }
        if(button.dataset.puas8 == 43.75){
            puas8.value = "Sangat Tidak Puas";
        }else if(button.dataset.puas8 == 62.50){
            puas8.value = "Tidak Puas";
        }else if(button.dataset.puas8 == 81.25){
            puas8.value = "Puas";
        }else if(button.dataset.puas8 == 100.00){
            puas8.value = "Sangat Puas";
        }
        totalpuas.value = button.dataset.totalpuas
        if(button.dataset.penting1 == 43.75){
            penting1.value = "Sangat Tidak Penting";
        }else if(button.dataset.penting1 == 62.50){
            penting1.value = "Tidak Penting";
        }else if(button.dataset.penting1 == 81.25){
            penting1.value = "Penting";
        }else if(button.dataset.penting1 == 100.00){
            penting1.value = "Sangat Penting";
        }
        if(button.dataset.penting2 == 43.75){
            penting2.value = "Sangat Tidak Penting";
        }else if(button.dataset.penting2 == 62.50){
            penting2.value = "Tidak Penting";
        }else if(button.dataset.penting2 == 81.25){
            penting2.value = "Penting";
        }else if(button.dataset.penting2 == 100.00){
            penting2.value = "Sangat Penting";
        }
        if(button.dataset.penting3 == 43.75){
            penting3.value = "Sangat Tidak Penting";
        }else if(button.dataset.penting3 == 62.50){
            penting3.value = "Tidak Penting";
        }else if(button.dataset.penting3 == 81.25){
            penting3.value = "Penting";
        }else if(button.dataset.penting3 == 100.00){
            penting3.value = "Sangat Penting";
        }
        if(button.dataset.penting4 == 43.75){
            penting4.value = "Sangat Tidak Penting";
        }else if(button.dataset.penting4 == 62.50){
            penting4.value = "Tidak Penting";
        }else if(button.dataset.penting4 == 81.25){
            penting4.value = "Penting";
        }else if(button.dataset.penting4 == 100.00){
            penting4.value = "Sangat Penting";
        }
        if(button.dataset.penting5 == 43.75){
            penting5.value = "Sangat Tidak Penting";
        }else if(button.dataset.penting5 == 62.50){
            penting5.value = "Tidak Penting";
        }else if(button.dataset.penting5 == 81.25){
            penting5.value = "Penting";
        }else if(button.dataset.penting5 == 100.00){
            penting5.value = "Sangat Penting";
        }
        if(button.dataset.penting6 == 43.75){
            penting6.value = "Sangat Tidak Penting";
        }else if(button.dataset.penting6 == 62.50){
            penting6.value = "Tidak Penting";
        }else if(button.dataset.penting6 == 81.25){
            penting6.value = "Penting";
        }else if(button.dataset.penting6 == 100.00){
            penting6.value = "Sangat Penting";
        }
        if(button.dataset.penting7 == 43.75){
            penting7.value = "Sangat Tidak Penting";
        }else if(button.dataset.penting7 == 62.50){
            penting7.value = "Tidak Penting";
        }else if(button.dataset.penting7 == 81.25){
            penting7.value = "Penting";
        }else if(button.dataset.penting7 == 100.00){
            penting7.value = "Sangat Penting";
        }
        if(button.dataset.penting8 == 43.75){
            penting8.value = "Sangat Tidak Penting";
        }else if(button.dataset.penting8 == 62.50){
            penting8.value = "Tidak Penting";
        }else if(button.dataset.penting8 == 81.25){
            penting8.value = "Penting";
        }else if(button.dataset.penting8 == 100.00){
            penting8.value = "Sangat Penting";
        }
        if(button.dataset.penting9 == 43.75){
            penting9.value = "Sangat Tidak Penting";
        }else if(button.dataset.penting9 == 62.50){
            penting9.value = "Tidak Penting";
        }else if(button.dataset.penting9 == 81.25){
            penting9.value = "Penting";
        }else if(button.dataset.penting9 == 100.00){
            penting9.value = "Sangat Penting";
        }
        totalpenting.value = button.dataset.totalpenting
    })
  }

  $(document).ready(function() {
    var t = $('#datamitra').DataTable( {
        "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        } ],
        "order": [[ 1, 'asc' ]]
    } );
 
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();
} );