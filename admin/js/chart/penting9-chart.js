// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPenting9Input = document.getElementsByClassName('avg');
let penting9d=0,penting9c=0,penting9b=0,penting9a=0;

for (let input of detailPenting9Input) {
        penting9d = input.dataset.penting9d
        penting9c = input.dataset.penting9c
        penting9b = input.dataset.penting9b
        penting9a = input.dataset.penting9a
  }

// Pie Chart Example
var ctx = document.getElementById("penting9PieChart");
var penting9PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Penting", "Tidak Penting", "Penting", "Sangat Penting"],
    datasets: [{
      data: [penting9d, penting9c, penting9b, penting9a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
