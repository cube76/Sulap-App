// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPuas9Input = document.getElementsByClassName('avg');
let puas9d=0,puas9c=0,puas9b=0,puas9a=0;

for (let input of detailPuas9Input) {
        puas9d = input.dataset.puas9d
        puas9c = input.dataset.puas9c
        puas9b = input.dataset.puas9b
        puas9a = input.dataset.puas9a
  }

// Pie Chart Example
var ctx = document.getElementById("puas9PieChart");
var puas9PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Puas", "Tidak Puas", "Puas", "Sangat Puas"],
    datasets: [{
      data: [puas9d, puas9c, puas9b, puas9a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
