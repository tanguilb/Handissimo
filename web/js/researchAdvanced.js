$(document).ready(function () {




        var disabilities = document.getElementsByClassName('disability');
      //  console.log(disabilities);
        for (var i = 0; i < disabilities.length; i++) {


                var disability = JSON.parse(disabilities[i].value);

                document.getElementById("#research_advanced_disabilitytype").innerHTML = disability;






        }


});