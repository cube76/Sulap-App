// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPuas8Input = document.getElementsByClassName('avg');
let puas8d=0,puas8c=0,puas8b=0,puas8a=0;

for (let input of detailPuas8Input) {
        puas8d = input.dataset.puas8d
        puas8c = input.dataset.puas8c
        puas8b = input.dataset.puas8b
        puas8a = input.dataset.puas8a
  }

// Pie Chart Example
var ctx = document.getElementById("puas8PieChart");
var puas8PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Puas", "Tidak Puas", "Puas", "Sangat Puas"],
    datasets: [{
      data: [puas8d, puas8c, puas8b, puas8a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
