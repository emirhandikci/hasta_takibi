function rand() {
    return Math.random();
}

Plotly.plot('graph', [{
    y: [1, 2, 3].map(rand),
    mode: 'lines',
    line: {
        color: '#E50914'
    }
}]);

var cnt = 0;

var interval = setInterval(function () {

    Plotly.extendTraces('graph', {
        y: [
            [rand()]
        ]
    }, [0])

    if (cnt === 100) clearInterval(interval);
}, 300);

Plotly.plot('graph2', [{
    y: [1, 2, 3].map(rand),
    mode: 'lines',
    line: {
        color: '#E50914'
    }
}]);

var cnt = 0;

var interval = setInterval(function () {

    Plotly.extendTraces('graph2', {
        y: [
            [rand()]
        ]
    }, [0])

    if (cnt === 100) clearInterval(interval);
}, 300);

function rand() {
    return Math.random();
}

Plotly.plot('graph3', [{
    y: [1, 2, 3].map(rand),
    mode: 'lines',
    line: {
        color: '#E50914'
    }
}]);

var cnt = 0;

var interval = setInterval(function () {

    Plotly.extendTraces('graph3', {
        y: [
            [rand()]
        ]
    }, [0])

    if (cnt === 100) clearInterval(interval);
}, 300);