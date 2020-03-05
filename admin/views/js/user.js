
const updateButtons = document.getElementsByClassName('user-detail');
const userid = document.getElementById('user-id');
const deleteButtons = document.getElementsByClassName('user-delete');
const userid2 = document.getElementById('user-id-2');
const username = document.getElementById('user-name');
// const password = document.getElementById('user-password');
const privilege = document.getElementById('user-privilege');
const fill = document.getElementById('user-fill');
const waktuuser = document.getElementById('user-waktu');
const mitra = document.getElementById('user-mitra');
const defaultpass = document.getElementById('myInput');

for (let button of updateButtons) {
    button.addEventListener('click', () => {
      userid.value = button.dataset.id
      username.value = button.dataset.name
      // password.value = button.dataset.password
      privilege.value = button.dataset.privilege
      fill.value = button.dataset.fill
      waktuuser.value = button.dataset.waktu
      mitra.value = button.dataset.mitra
    })
  }

  for (let button of deleteButtons) {
    button.addEventListener('click', () => {
        userid2.value = button.dataset.id
    })
  }

  function do_default()
    {
      defaultpass.value = "blup3gl"
    }
