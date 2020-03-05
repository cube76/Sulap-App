// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPuas3Input = document.getElementsByClassName('avg');
let puas3d=0,puas3c=0,puas3b=0,puas3a=0;

for (let input of detailPuas3Input) {
        puas3d = input.dataset.puas3d
        puas3c = input.dataset.puas3c
        puas3b = input.dataset.puas3b
        puas3a = input.dataset.puas3a
  }

// Pie Chart Example
var ctx = document.getElementById("puas3PieChart");
var puas3PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Puas", "Tidak Puas", "Puas", "Sangat Puas"],
    datasets: [{
      data: [puas3d, puas3c, puas3b, puas3a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
