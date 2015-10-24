$(function() {

//    Morris.Area({
//        element: 'morris-area-chart',
////        data: [{
////            period: '2014 Q1',
////            Survey_1: 266,
////            Survey_3: 264
////        }, {
////            period: '2014 Q2',
////            Survey_1: 277,
////            Survey_2: 229,
////            Survey_3: 244
////        }, {
////            period: '2014 Q3',
////            Survey_1: 491,
////            Survey_2: 196,
////            Survey_3: 250
////        }, {
////            period: '2014 Q4',
////            Survey_1: 376,
////            Survey_2: 359,
////            Survey_3: 568
////        }, {
////            period: '2015 Q1',
////            Survey_1: 681,
////            Survey_2: 191,
////            Survey_3: 229
////        }, {
////            period: '2015 Q2',
////            Survey_1: 567,
////            Survey_2: 429,
////            Survey_3: 188
////        }, {
////            period: '2015 Q3',
////            Survey_1: 482,
////            Survey_2: 379,
////            Survey_3: 158
////        }, {
////            period: '2015 Q4',
////            Survey_1: 150,
////            Survey_2: 596,
////            Survey_3: 517
////        }, {
////            period: '2015 Q5',
////            Survey_1: 106,
////            Survey_2: 446,
////            Survey_3: 202
////        }, {
////            period: '2015 Q5',
////            Survey_1: 843,
////            Survey_2: 571,
////            Survey_3: 179
////        }],
//        xkey: 'period',
//        ykeys: ['Survey_1', 'Survey_2', 'Survey_3'],
//        labels: ['Survey 1', 'Survey 2', 'Survey 3'],
//        pointSize: 2,
//        hideHover: 'auto',
//        resize: true
//    });

    Morris.Donut({
        element: 'morris-donut-chart',
//        data: [{
//            label: "Survey Name 1",
//            value: 12
//        }, {
//            label: "Survey Name 3",
//            value: 30
//        }, {
//            label: "Survey Name 2",
//            value: 20
//        }],
        resize: true
    });

    Morris.Bar({
        element: 'morris-bar-chart',
        data: [{
            y: '2006',
            a: 100,
            b: 90
        }, {
            y: '2007',
            a: 75,
            b: 65
        }, {
            y: '2008',
            a: 50,
            b: 40
        }, {
            y: '2009',
            a: 75,
            b: 65
        }, {
            y: '2014',
            a: 50,
            b: 40
        }, {
            y: '2015',
            a: 75,
            b: 65
        }, {
            y: '2012',
            a: 100,
            b: 90
        }],
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Series A', 'Series B'],
        hideHover: 'auto',
        resize: true
    });

});
