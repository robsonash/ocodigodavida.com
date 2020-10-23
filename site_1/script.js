$(function(){
    $('button').bind('click', function(){
        var cidade = $('#cidade').val();
        
        var now = new Date();
        var tempURL = 'htpps://query.yahooapis.\n\
com/v1/public/yql?format=json&rnd =' + now.getFullYear() + now.getMonth() + now.getDay() + now.getHours() + '\
&diagnostics=true&callback=?&q=select * from weather.\n\
forecast where woeid in (select woeid from geo.places(1) where text="'+cidade+'") and u="c"';
 $.ajax({
     url:encodeURI(tempURL),
     datatype:'json',
     type:'GET',
     beforeSend:function(){
         $('#res').html('Carregando...');
     },
     sucess:function(data){
         if(data !== null && data.query !== null && data.query.results !== null && data.query.results.channel.description !== 'yahoo! Weather Error'){
              var temp = data.query.results.channel.item.condition.temp;
         $('#res').html(temp+'° C');
         }
     },
     error:function(){
         $('#res').html('erro');
     }
 });
    
    
    
    
    
    });
});