// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPenting7Input = document.getElementsByClassName('avg');
let penting7d=0,penting7c=0,penting7b=0,penting7a=0;

for (let input of detailPenting7Input) {
        penting7d = input.dataset.penting7d
        penting7c = input.dataset.penting7c
        penting7b = input.dataset.penting7b
        penting7a = input.dataset.penting7a
  }

// Pie Chart Example
var ctx = document.getElementById("penting7PieChart");
var penting7PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Penting", "Tidak Penting", "Penting", "Sangat Penting"],
    datasets: [{
      data: [penting7d, penting7c, penting7b, penting7a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
