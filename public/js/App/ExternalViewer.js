/* 
 * Rolavsp(Http:www.rolavsp.com)
 * script para informacion finanaciera
 * Bogota Colombia  2016
 */

var page={
    init:function()
    {
        $("#contPrin").on("click","a",
        function(){
           var idFile= $(this).closest("li").find("#IdDoc").val();
            page.CargarArchivo(idFile);
            
        });
        $("#fileviewer").attr("width",$( window ).width()*0.7);
         $("#fileviewer").attr("height",$( window ).height()*0.9);
        $('.tree-toggle').click(function () {
	$(this).parent().children('ul.tree').toggle(200);
});
    }
    , CargarArchivo:function(id)
    {
        $("#dvpdf").fadeIn();
        $("#fileviewer").attr("src","DownloadFile.php?idArchivo="+id+"&token=rzqz lzqhz kdzk sd zln");
        $("#downloadFile").attr("href","DownloadFile.php?idArchivo="+id+"&token=rzqz lzqhz kdzk sd zln");
        
    }
    
}


