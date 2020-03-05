// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailInput = document.getElementsByClassName('avg');
let d=0,c=0,b=0,a=0;


for (let input of detailInput) {
        d = input.dataset.pentingd
        c = input.dataset.pentingc
        b = input.dataset.pentingb
        a = input.dataset.pentinga
  }


// Pie Chart Example
var ctx = document.getElementById("pentingPieChart");
var pentingPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Penting", "Tidak Penting", "Penting", "Sangat Penting"],
    datasets: [{
      data: [d, c, b, a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
