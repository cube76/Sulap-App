// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detail2Input = document.getElementsByClassName('avg');
let puasd=0,puasc=0,puasb=0,puasa=0;

for (let input of detail2Input) {
        puasd = input.dataset.puasd
        puasc = input.dataset.puasc
        puasb = input.dataset.puasb
        puasa = input.dataset.puasa
  }

// Pie Chart Example
var ctx = document.getElementById("puasPieChart");
var puasPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Puas", "Tidak Puas", "Puas", "Sangat Puas"],
    datasets: [{
      data: [puasd, puasc, puasb, puasa],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
