// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPenting4Input = document.getElementsByClassName('avg');
let penting4d=0,penting4c=0,penting4b=0,penting4a=0;

for (let input of detailPenting4Input) {
        penting4d = input.dataset.penting4d
        penting4c = input.dataset.penting4c
        penting4b = input.dataset.penting4b
        penting4a = input.dataset.penting4a
  }

// Pie Chart Example
var ctx = document.getElementById("penting4PieChart");
var penting4PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Penting", "Tidak Penting", "Penting", "Sangat Penting"],
    datasets: [{
      data: [penting4d, penting4c, penting4b, penting4a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
