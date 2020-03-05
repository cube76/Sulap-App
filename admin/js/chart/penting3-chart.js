// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPenting3Input = document.getElementsByClassName('avg');
let penting3d=0,penting3c=0,penting3b=0,penting3a=0;

for (let input of detailPenting3Input) {
        penting3d = input.dataset.penting3d
        penting3c = input.dataset.penting3c
        penting3b = input.dataset.penting3b
        penting3a = input.dataset.penting3a
  }

// Pie Chart Example
var ctx = document.getElementById("penting3PieChart");
var penting3PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Penting", "Tidak Penting", "Penting", "Sangat Penting"],
    datasets: [{
      data: [penting3d, penting3c, penting3b, penting3a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
