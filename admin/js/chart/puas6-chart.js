// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPuas6Input = document.getElementsByClassName('avg');
let puas6d=0,puas6c=0,puas6b=0,puas6a=0;

for (let input of detailPuas6Input) {
        puas6d = input.dataset.puas6d
        puas6c = input.dataset.puas6c
        puas6b = input.dataset.puas6b
        puas6a = input.dataset.puas6a
  }

// Pie Chart Example
var ctx = document.getElementById("puas6PieChart");
var puas6PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Puas", "Tidak Puas", "Puas", "Sangat Puas"],
    datasets: [{
      data: [puas6d, puas6c, puas6b, puas6a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
