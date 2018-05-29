<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Widgets</title>

    <link href="<?php echo base_url();?>assets/backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/<?php echo base_url();?>assets/backend/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/backend/css/style.css" rel="stylesheet">

</head>

<body style="background-color: whitesmoke;">

    <!-- <div id="wrapper"> -->


        <!-- <div id="page-wrapper"> -->
            
            <table>
                <?php
                for ($i=0; $i < $print_quantity; $i++) 
                { 
                    if ($i%6===0) 
                    {
                        ?>
                        <tr>
                            
                        </tr>
                        <?php
                    }
                    else
                    {
                        ?>
                        <td style="border-color: black;">
                            <div class="col-lg-2" style="width: 100%;height: 100%">
                                <div class="widget style1 white-bg" style="border:solid;">
                                    <div class="row horizontal-align">
                                        <div class="col-xs-3" style="margin-left: 15px;">
                                            <i class="fa fa-barcode fa-3x"></i>
                                        </div>
                                        <br>
                                        <div class="col-xs-9 text-center">
                                            <h3 class="font-bold" style="margin-top: 10px;"><?=$barcode?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <?php
                    }
                }
                ?>
            </table>

        <!-- </div> -->
        <!-- </div> -->

    <!-- Mainly scripts -->
    <script src="<?php echo base_url();?>assets/backend/js/jquery-2.1.1.js"></script>
    <script src="<?php echo base_url();?>assets/backend/<?php echo base_url();?>assets/backend/js/jquery-ui-1.10.4.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?php echo base_url();?>assets/backend/<?php echo base_url();?>assets/backend/<?php echo base_url();?>assets/backend/js/inspinia.js"></script>
    <script src="<?php echo base_url();?>assets/backend/<?php echo base_url();?>assets/backend/js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="<?php echo base_url();?>assets/backend/js/plugins/iCheck/icheck.min.js"></script>

    <!-- Jvectormap -->
    <script src="<?php echo base_url();?>assets/backend/js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Flot -->
    <script src="<?php echo base_url();?>assets/backend/<?php echo base_url();?>assets/backend/<?php echo base_url();?>assets/backend/js/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>assets/backend/<?php echo base_url();?>assets/backend/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="<?php echo base_url();?>assets/backend/js/plugins/flot/jquery.flot.resize.js"></script>
    <script>
        $(document).ready(function(){
            var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
            var d2 = [[1262304000000, 5], [1264982400000, 200], [1267401600000, 1605], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];

            var data1 = [
                { label: "Data 1", data: d1, color: '#17a084'},
                { label: "Data 2", data: d2, color: '#127e68' }
            ];
            $.plot($("#flot-chart1"), data1, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        }
                    },
                    points: {
                        width: 0.1,
                        show: false
                    }
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false
                }
            });

            var data2 = [
                { label: "Data 1", data: d1, color: '#19a0a1'}
            ];
            $.plot($("#flot-chart2"), data2, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        }
                    },
                    points: {
                        width: 0.1,
                        show: false
                    }
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false
                }
            });

            var data3 = [
                { label: "Data 1", data: d1, color: '#fbbe7b'},
                { label: "Data 2", data: d2, color: '#f8ac59' }
            ];
            $.plot($("#flot-chart3"), data3, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        }
                    },
                    points: {
                        width: 0.1,
                        show: false
                    }
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false
                }
            });

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green'
            });

            $(".todo-list").sortable({
                placeholder: "sort-highlight",
                handle: ".handle",
                forcePlaceholderSize: true,
                zIndex: 999999
            }).disableSelection();

            var mapData = {
                "US": 498,
                "SA": 200,
                "CA": 1300,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
                "RU": 2000
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 1,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },
                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                }
            });
        });
    </script>


</body>

</html>
