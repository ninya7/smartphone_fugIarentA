$(document).ready(function(){
    $("#add_kommentar_button").click(function(){
        $("#add_kommentar_formular").slideToggle("slow");
    });
    $("#button_all").click(function(){
      $("#top").slideToggle("slow");
      $("#all").slideToggle("slow");
      $("#carousel-example-generic").slideToggle("slow");
      if($(this).text()=="Show all"){
        $(this).text("Hide all");
      }else{
        $(this).text("Show all");
      }
    });
});
