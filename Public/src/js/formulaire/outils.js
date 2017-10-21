var Form = {
    useConnection : {
        on: function () {
            document.getElementById("formConnection").style.display = "block";
            document.getElementById("formInscription").style.display = "none";
    },
        off : function () {
            document.getElementById("formConnection").style.display = "none";
        }

    },
    useInscription : {
        on: function () {
            document.getElementById("formInscription").style.display = "block";
            document.getElementById("formConnection").style.display = "none";
        },
        off : function () {
            document.getElementById("formInscription").style.display = "none";
        },

    }

}