// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPenting5Input = document.getElementsByClassName('avg');
let penting5d=0,penting5c=0,penting5b=0,penting5a=0;

for (let input of detailPenting5Input) {
        penting5d = input.dataset.penting5d
        penting5c = input.dataset.penting5c
        penting5b = input.dataset.penting5b
        penting5a = input.dataset.penting5a
  }

// Pie Chart Example
var ctx = document.getElementById("penting5PieChart");
var penting5PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Penting", "Tidak Penting", "Penting", "Sangat Penting"],
    datasets: [{
      data: [penting5d, penting5c, penting5b, penting5a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
