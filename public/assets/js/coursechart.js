// Initialize and render the coursesurvey chart
function createCourseSurveyChart(courseData) {
   
    var coursesurveychart = {
        series: [
            {
                name: "Course Survey",
                data: courseData,
            },
        ],
        chart: {
            height: 280,
            type: "bar",
            events: {
                click: function (chart, w, e) {},
            },
            toolbar: {
                show: false,
            },
            fontFamily: "Inter, sans-serif",
            toolbar: {
                show: false,
            },
        },
        colors: [
            "#267DFF",
            "#7B6AFE",
            "#FF51A4",
            "#FF7C51",
            "#00D085",
            "#FFC41F",
            "#FF3232",
        ],
        plotOptions: {
            bar: {
                columnWidth: "20%",
                distributed: true,
                borderRadius: 5,
            },
        },
        dataLabels: {
            enabled: false,
        },
        legend: {
            show: false,
        },
        yaxis: {
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            tickAmount: 6,
            labels: {
                formatter: (value) => {
                   // return value / 10 + "K";
                    return value;
                },
                offsetX: -10,
    
                offsetY: 0,
                style: {
                    fontSize: "16px",
                    fontWeight: "600",
                    colors: "#7780A1",
                    cssClass: "apexcharts-xaxis-title",
                },
            },
            opposite: false,
        },
        xaxis: {
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            categories: [
                "Strongly Disagree",
                "Disagree",
                "Uncertain",
                "Agree",
                "Strongly Agree",
            ],
            labels: {
                style: {
                    fontSize: "16px",
                    fontWeight: "600",
                    colors: "#7780A1",
                    cssClass: "apexcharts-xaxis-title",
                },
            },
        },
        grid: {
            borderColor: "#e0e6ed",
            strokeDashArray: 2,
            xaxis: {
                lines: {
                    show: false,
                },
            },
            yaxis: {
                lines: {
                    show: true,
                },
            },
            padding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 25,
            },
        },
    };
    var coursesurveychart = new ApexCharts(document.querySelector("#coursesurvey"), coursesurveychart);
    coursesurveychart.render();
        return coursesurveychart; // Return chart instance
    }