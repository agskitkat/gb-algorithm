<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="chart/chartist.min.css">
    <style>
        .ct-series-b .ct-bar {
            stroke: #02009c;
        }
    </style>
    <title>Тестирование интераторов</title>
</head>
<body>
    <div class="container">
        <div class="">
            <div class="form-group">
                <label>Степень для чмсла 2 - колтчество элементов в шаге</label>
                <input id="test-elements" type="number" step="1" class="form-control" placeholder="">
            </div>

            <a href="#test" id="btn-start" class="btn btn-primary">Начать тест</a>
        </div>

        <div class="ct-chart" style="margin-top:30px;height:500px;"></div>
        <script>
            var test = function() {
                var input = document.querySelector("#test-elements");
                var btn = document.querySelector("#btn-start");

                var chart_a = [];
                var chart_b = [];
                var labels = [];

                btn.addEventListener('click', () => {

                        let val = +input.value;

                        for(var i = 0; val > i; i++) {
                            let data = (2**i);
                            labels.push(data);

                            let a = JSON.parse(request(data, 'foreach'));
                            chart_a.push( a.Time );

                            let b = JSON.parse(request(data, 'spl'));
                            chart_b.push( b.Time );

                        }

                        var data = {
                            labels: labels,
                            series: [
                                chart_a,
                                chart_b
                            ]
                        };
                        var options = {
                            seriesBarDistance: 10
                        };
                        var responsiveOptions = [
                            ['screen and (max-width: 640px)', {
                                seriesBarDistance: 5,
                                axisX: {
                                    labelInterpolationFnc: function (value) {
                                        return value[0];
                                    }
                                }
                            }]
                        ];
                        new Chartist.Bar('.ct-chart', data, options, responsiveOptions);
                });

                var request = function(val, type) {
                    // Синхронно !!!
                    var xhr = new XMLHttpRequest();
                    xhr.open('GET', "test.php?test=" + (val ? val : 1) + "&type=" + (type ? type : 'foreach'), false);
                    xhr.send();
                    if (xhr.status !== 200) {
                        console.log(xhr.status + ': ' + xhr.statusText);
                        return false;
                    } else {
                        return xhr.responseText;
                    }
                };
            };

           new test();
        </script>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="chart/chartist.min.js"></script>
</body>
</html>