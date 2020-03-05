// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPuas7Input = document.getElementsByClassName('avg');
let puas7d=0,puas7c=0,puas7b=0,puas7a=0;

for (let input of detailPuas7Input) {
        puas7d = input.dataset.puas7d
        puas7c = input.dataset.puas7c
        puas7b = input.dataset.puas7b
        puas7a = input.dataset.puas7a
  }

// Pie Chart Example
var ctx = document.getElementById("puas7PieChart");
var puas7PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Puas", "Tidak Puas", "Puas", "Sangat Puas"],
    datasets: [{
      data: [puas7d, puas7c, puas7b, puas7a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
