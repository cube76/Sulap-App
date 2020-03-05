// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

const detailPuas4Input = document.getElementsByClassName('avg');
let puas4d=0,puas4c=0,puas4b=0,puas4a=0;

for (let input of detailPuas4Input) {
        puas4d = input.dataset.puas4d
        puas4c = input.dataset.puas4c
        puas4b = input.dataset.puas4b
        puas4a = input.dataset.puas4a
  }

// Pie Chart Example
var ctx = document.getElementById("puas4PieChart");
var puas4PieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Sangat Tidak Puas", "Tidak Puas", "Puas", "Sangat Puas"],
    datasets: [{
      data: [puas4d, puas4c, puas4b, puas4a],
      backgroundColor: ['#dc3545', '#ffcc01', '#007bff', '#ee7600'],
    }],
  },
});
