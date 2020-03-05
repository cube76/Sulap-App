// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPuas5Input = document.getElementsByClassName('avg');
let puas5d=0,puas5c=0,puas5b=0,puas5a=0;

for (let input of detailPuas5Input) {
        puas5d = input.dataset.puas5d
        puas5c = input.dataset.puas5c
        puas5b = input.dataset.puas5b
        puas5a = input.dataset.puas5a
  }

// Pie Chart Example
var ctx = document.getElementById("puas5PieChart");
var puas5PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Puas", "Tidak Puas", "Puas", "Sangat Puas"],
    datasets: [{
      data: [puas5d, puas5c, puas5b, puas5a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
