// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPuas2Input = document.getElementsByClassName('avg');
let puas2d=0,puas2c=0,puas2b=0,puas2a=0;

for (let input of detailPuas2Input) {
        puas2d = input.dataset.puas2d
        puas2c = input.dataset.puas2c
        puas2b = input.dataset.puas2b
        puas2a = input.dataset.puas2a
  }

// Pie Chart Example
var ctx = document.getElementById("puas2PieChart");
var puas2PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Puas", "Tidak Puas", "Puas", "Sangat Puas"],
    datasets: [{
      data: [puas2d, puas2c, puas2b, puas2a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
