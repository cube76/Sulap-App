// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPenting2Input = document.getElementsByClassName('avg');
let penting2d=0,penting2c=0,penting2b=0,penting2a=0;

for (let input of detailPenting2Input) {
        penting2d = input.dataset.penting2d
        penting2c = input.dataset.penting2c
        penting2b = input.dataset.penting2b
        penting2a = input.dataset.penting2a
  }

// Pie Chart Example
var ctx = document.getElementById("penting2PieChart");
var penting2PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Penting", "Tidak Penting", "Penting", "Sangat Penting"],
    datasets: [{
      data: [penting2d, penting2c, penting2b, penting2a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
