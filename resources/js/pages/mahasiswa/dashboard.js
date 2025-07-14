import { poinSKKMProgressChart } from "../../components/charts";

// Poin SKKM Circular Progress Chart
const skkmChartCanvas = document.querySelector('#poinSKKMProgressChart');
const targetPoin = parseInt(skkmChartCanvas.dataset.target);
const currentPoin = parseInt(skkmChartCanvas.dataset.current);
poinSKKMProgressChart(skkmChartCanvas, currentPoin, targetPoin);
