(function($){ 
    $(document).ready(function(){ 
        /**
         * Handles deleting items in a CRUD list table.
         */
        $('table a.delete').click(function(e){ 
            e.preventDefault();
            var answer = confirm("Are you sure you want to delete this item?");

            if(! answer)
            {
                return false;
            }
            
            var href = $(this).attr('href');
            $.ajax({
              url: "href",
              context: $(this).parents('').get(),
            }).done(function(data) { 
                if( data.status && data.status == "success" ) 
                {
                  $(this).pare;
                }
            });
        });
    });
})(jQuery);