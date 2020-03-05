const infoButtons = document.getElementsByClassName('info');

for (let button of deleteButtons) {
    button.addEventListener('click', () => {
        umumId2.value = button.dataset.id
    })
  }

  $( function() {
    $( "#dialog" ).dialog();
  } );