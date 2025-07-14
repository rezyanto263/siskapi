import ApexCharts from "apexcharts";

export function poinSKKMProgressChart(element, currentPoin, targetPoin) {
    const percent = (currentPoin / targetPoin) * 100;

    const options = {
        chart: {
            height: 350,
            type: "radialBar",
        },
        series: [percent],
        colors: ["#2563EB"],
        fill: {
            type: "gradient",
            gradient: {
                shade: "dark",
                type: "horizontal",
                gradientToColors: ["#1E3A8A"],
                stops: [0, 100],
            },
        },
        plotOptions: {
            radialBar: {
                hollow: {
                    size: "60%",
                },
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        show: false,
                    },
                },
            },
        },
        stroke: {
            lineCap: "round",
        },
    };

    const chart = new ApexCharts(element, options);

    chart.render();
}
