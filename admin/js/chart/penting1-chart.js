// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPenting1Input = document.getElementsByClassName('avg');
let penting1d=0,penting1c=0,penting1b=0,penting1a=0;

for (let input of detailPenting1Input) {
        penting1d = input.dataset.penting1d
        penting1c = input.dataset.penting1c
        penting1b = input.dataset.penting1b
        penting1a = input.dataset.penting1a
  }

// Pie Chart Example
var ctx = document.getElementById("penting1PieChart");
var penting1PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Penting", "Tidak Penting", "Penting", "Sangat Penting"],
    datasets: [{
      data: [penting1d, penting1c, penting1b, penting1a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
