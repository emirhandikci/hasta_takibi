
function getValue(){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
      })
   
      
    var ates,nabiz,sicaklik;
    Plotly.plot('graph', [{
        y: [],
        mode: 'lines',
        line: {
            color: '#E50914'
        }
    }]);
    Plotly.plot('graph2', [{
        y: [],
        mode: 'lines',
        line: {
            color: '#E50914'
        }
    }]);
    Plotly.plot('graph3', [{
        y: [],
        mode: 'lines',
        line: {
            color: '#E50914'
        }
    }]);
    setInterval(function () {
        $.ajax({
            type: "POST",
            url: "php/getValue.php",
            success: function(data) {
                veri=JSON.parse(data);
                nabiz=veri.nabiz;
                ates=veri.ates;
                sicaklik=veri.sicaklik;
            }
        });
        Plotly.extendTraces('graph', {
            y: [
                [ates]
            ]
        }, [0])
        Plotly.extendTraces('graph2', {
            y: [
                [sicaklik]
            ]
        }, [0])
        Plotly.extendTraces('graph3', {
            y: [
                [nabiz]
            ]
        }, [0])
        if(sicaklik>30 || ates>30 || nabiz>30 ){
            Toast.fire({
                icon: 'warning',
                title: `Sıcaklık: ${sicaklik}, Ateş: ${ates} Nabız: ${nabiz}`
            })
        }
        
    }, 1000);
}
$( document ).ready(function() {
    getValue();
});
