// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPenting6Input = document.getElementsByClassName('avg');
let penting6d=0,penting6c=0,penting6b=0,penting6a=0;

for (let input of detailPenting6Input) {
        penting6d = input.dataset.penting6d
        penting6c = input.dataset.penting6c
        penting6b = input.dataset.penting6b
        penting6a = input.dataset.penting6a
  }

// Pie Chart Example
var ctx = document.getElementById("penting6PieChart");
var penting6PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Penting", "Tidak Penting", "Penting", "Sangat Penting"],
    datasets: [{
      data: [penting6d, penting6c, penting6b, penting6a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
