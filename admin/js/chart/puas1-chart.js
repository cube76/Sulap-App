// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPuas1Input = document.getElementsByClassName('avg');
let puas1d=0,puas1c=0,puas1b=0,puas1a=0;

for (let input of detailPuas1Input) {
        puas1d = input.dataset.puassatud
        puas1c = input.dataset.puassatuc
        puas1b = input.dataset.puassatub
        puas1a = input.dataset.puassatua
  }

// Pie Chart Example
var ctx = document.getElementById("puas1PieChart");
var puas1PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Puas", "Tidak Puas", "Puas", "Sangat Puas"],
    datasets: [{
      data: [puas1d, puas1c, puas1b, puas1a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
