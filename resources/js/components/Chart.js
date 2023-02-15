import { Chart } from "chart.js/auto";
import axios from "axios";

export default {
    template: `
        <div class="container mt-5 mb-5">
            <h4>Bitcoin price USD</h4>
            <canvas id="myChart"></canvas>
        </div>
    `,
    mounted() {
        axios
            .get('/bitcoin-trades')
            .then(response => {
                new Chart(
                    document.getElementById('myChart'),
                    {
                        type: 'line',
                        data: {
                            labels:  response.data.labels,
                            datasets: [{
                                label: 'Bitcoin price USD',
                                data: response.data.bitcoinValues,
                                borderWidth: 1,
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                },
                                x: {
                                    ticks: {
                                        callback: function (val, index) {
                                            return index % 2 === 0 ? this.getLabelForValue(val) : '';
                                        },
                                    },
                                },
                            },
                        },
                    }
                );
            })
    }
}
