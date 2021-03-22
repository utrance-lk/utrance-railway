
 <section class="newsfeed">
     
 
    
    
</section> 



    


<script type="text/javascript" src="../../../utrance-railway/public/js/pages/admin/news.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
 $(document).ready(function(){
    $.ajax({
        url: "getNewNews",
        method: "get",
        success: function (data) {
            console.log(data);
            news=JSON.parse(data);
            renderNewsCard(news);
            
        }
       

    });

   
    
          
 });




 
</script>