app.factory('Serviciosdatoscompartidos', function ($http,SweetAlert,textos) {
    return {
        BaseUrlServicios: "/Proxy/getsetwsdatoscompartidos.php",
        Get: Get,
        Post: Post
    };

    function Get(Metodo, Params, Callbak) {
        var URL = this.BaseUrlServicios + Metodo;
        $http.get(URL, { params: Params }).success(function (data, status, headers, config) {
            Callbak(data);
        }).error(function (data, status, header, config) {
            Callbak({ error: 2, Dta: 0, Msg: "" });
        });
    }
    
    function Post(Metodo, Params, Callbak) {
        $http.post(this.BaseUrlServicios, {Metodo:Metodo,Params:Params}).success(function (data, status, headers, config) {
            Callbak(data);
        }).error(function (data, status, header, config) {
            Callbak({ error: 2, Dta: 0, Msg: "" })
        });
    }
})
