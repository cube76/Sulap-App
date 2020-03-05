const deleteButtons = document.getElementsByClassName('umum-delete');
const umumId2 = document.getElementById('umum-id-2');
const detailButtons = document.getElementsByClassName('umum-detail');
const umumId = document.getElementById('umum-id');
const topic = document.getElementById('umum-topic');
const feedback = document.getElementById('umum-desc');
const waktu = document.getElementById('umum-waktu');
const file = document.getElementById('umum-img');
// var img = document.querySelector("img");

for (let button of detailButtons) {
    button.addEventListener('click', () => {
      umumId.value = button.dataset.id
      topic.value = button.dataset.topic
      feedback.value = button.dataset.feedback
      waktu.value = button.dataset.waktu
      file.src = button.dataset.img
    })
  }

  for (let button of deleteButtons) {
    button.addEventListener('click', () => {
        umumId2.value = button.dataset.id
    })
  }

  $(document).ready(function() {
    var t = $('#dataumum').DataTable( {
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

$('img[data-enlargable]').addClass('img-enlargable').click(function(){
    var src = $(this).attr('src');
    $('<div>').css({
        background: 'RGBA(0,0,0,.5) url('+src+') no-repeat center',
        backgroundSize: 'contain',
        width:'100%', height:'100%',
        position:'fixed',
        zIndex:'10000',
        top:'0', left:'0',
        cursor: 'zoom-out'
    }).click(function(){
        $(this).remove();
    }).appendTo('body');
});