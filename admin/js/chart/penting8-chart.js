// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPenting8Input = document.getElementsByClassName('avg');
let penting8d=0,penting8c=0,penting8b=0,penting8a=0;

for (let input of detailPenting8Input) {
        penting8d = input.dataset.penting8d
        penting8c = input.dataset.penting8c
        penting8b = input.dataset.penting8b
        penting8a = input.dataset.penting8a
  }

// Pie Chart Example
var ctx = document.getElementById("penting8PieChart");
var penting8PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Penting", "Tidak Penting", "Penting", "Sangat Penting"],
    datasets: [{
      data: [penting8d, penting8c, penting8b, penting8a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
